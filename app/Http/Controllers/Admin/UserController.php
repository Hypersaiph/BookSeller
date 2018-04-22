<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\ManyToMany\UserRole;
use App\Models\News;
use App\Models\Role;
use App\Models\UserSettings;
use App\User;
use Illuminate\Http\Request;
use Unisharp\Setting\Setting;

class UserController extends Controller
{
    protected $settings;
    public function __construct(Setting $settings)
    {
        $this->settings = $settings;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items_per_page = 10;
        $search = \Request::get('search');
        $users = User::where([
            ['name','like','%'.$search.'%'],
            //['assigned_code', '<>', '']
        ])
            ->orderBy('created_at', 'desc')
            ->paginate($items_per_page);
        $total = $users->total();
        $current_page = $users->currentPage();
        $items_per_page = $users->perPage();
        return view('admin.users.list', compact('users', 'total', 'current_page', 'items_per_page', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $roles = $request->get('roles');
        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'password' => bcrypt('geovas123'),
        ]);
        $user->blocked = false;
        $user->profile_image = 'avatar.png';
        $user->save();

        foreach ($roles as $id){
            $user_role = new UserRole([
                'role_id' => $id,
                'user_id' => $user->id,
            ]);
            $user_role->save();
        }

        return redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $user_roles = [];
        foreach ($user->roles as $role_id){
            array_push($user_roles, $role_id->id);
        }
        return view('admin.users.edit', compact('user','roles','user_roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);

        $selected_roles = $request->get('roles');
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->address = $request->get('address');
        $user->save();

        if(sizeof($selected_roles) <= sizeof($user->roles)){
            //delete
            foreach ($user->roles as $role){
                if(in_array($role->id, $selected_roles)){
                }else{
                    $user_role = UserRole::where([
                        ['role_id', '=', $role->id],
                        ['user_id', '=', $user->id],
                    ])->first();
                    $user_role->delete();
                }
            }
            $user_roles = [];
            foreach ($user->roles as $role_id){
                array_push($user_roles, $role_id->id);
            }
            //inverse
            foreach ($selected_roles as $selected_role){
                if(in_array($selected_role, $user_roles)){
                }else{
                    $new_user_role = new UserRole([
                        'role_id' => $selected_role,
                        'user_id' => $user->id,
                    ]);
                    $new_user_role->save();
                }
            }
        }else{//add
            $user_roles = [];
            foreach ($user->roles as $role_id){
                array_push($user_roles, $role_id->id);
            }
            foreach ($selected_roles as $srole){
                if(in_array($srole, $user_roles)){
                }else{
                    $new_user_role = new UserRole([
                        'role_id' => $srole,
                        'user_id' => $user->id,
                    ]);
                    $new_user_role->save();
                }
            }
        }

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete user_roles
        $user_roles = UserRole::where('user_id',$id);
        $user_roles->delete();
        //delete user_settings
        $user_settings = UserSettings::where('user_id',$id);
        $user_settings->delete();
        //delete user
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index');
    }
    public function block(Request $request, $id){
        $user = User::find($id);
        $user->blocked = $request->get('blocked') == 'true'? 1 : 0;
        $user->save();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function changeSystemSettings(Request $request){
        $key = $request->get('key');
        $value = $request->get('val');
        $code = 404;
        $msg = $key.' no existe.';
        if($this->settings->has($key)){
            $this->settings->set($key, $value);
            $code = 200;
            $msg = 'Ajuste registrado.';
        }
        return response()->json(['response' => $code, 'comments' => $msg]);
    }
}
