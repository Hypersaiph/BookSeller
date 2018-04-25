<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Syslog;
use App\Transformers\CustomerTransformer;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class CustomerController extends Controller
{
    /**
     * @var Manager
     */
    private $fractal;

    /**
     * @var CustomerTransformer
     */
    private $transformer;

    function __construct(Manager $fractal, CustomerTransformer $transformer)
    {
        $this->fractal = $fractal;
        $this->transformer = $transformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index(Request $request)
    {
        $user_id = $request->user()->id;

        $nit = $request->query('nit');
        if($nit){
            $customers = Customer::where('nit','like','%'.$nit.'%')
                ->orderBy('created_at', 'desc')
                ->get();
        }else{
            $customers = Customer::where([
                ['created_by','=', $user_id],
            ])
                ->orderBy('created_at', 'desc')
                ->get();
        }
        //dump($customers);
        $customers = new Collection($customers, $this->transformer); // Create a resource collection transformer
        $customers = $this->fractal->createData($customers); // Transform data
        return $customers->toArray();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function store(Request $request)
    {
        $user_id = $request->user()->id;

        $name = $request->get('name');
        $surname = $request->get('surname');
        $nit = $request->get('nit');
        $email = $request->get('email');
        $address = $request->get('address');
        $phone = $request->get('phone');
        $latitude = $request->get('latitude');
        $longitude = $request->get('longitude');
        $note = $request->get('note');

        $customer = new Customer([
            'surname' => $surname,
            'nit' => $nit,
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);
        $customer->save();
        $customer->created_by = $user_id;
        $customer->name = $name;
        $customer->email = $email;
        $customer->address = $address;
        $customer->phone = $phone;
        $customer->note = $note;
        $customer->save();
        (new Syslog())->log($user_id,$customer->id,'create','customers',1);
        $data = array([
            'message' => 'Registrado Correctamente'
        ]);
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return array
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array
     */
    public function update(Request $request, $id)
    {
        $user_id = $request->user()->id;

        $name = $request->get('name');
        $surname = $request->get('surname');
        $nit = $request->get('nit');
        $email = $request->get('email');
        $address = $request->get('address');
        $phone = $request->get('phone');
        $latitude = $request->get('latitude');
        $longitude = $request->get('longitude');
        $note = $request->get('note');

        $customer = Customer::find($id);
        $customer->name = $name;
        $customer->surname = $surname;
        $customer->nit = $nit;
        $customer->email = $email;
        $customer->address = $address;
        $customer->phone = $phone;
        $customer->note = $note;
        $customer->save();
        (new Syslog())->log($user_id,$customer->id,'update','customers',1);

        $data = array([
            'message' => 'Actualizado Correctamente'
        ]);
        return response()->json($data);
    }
}
