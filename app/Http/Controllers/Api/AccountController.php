<?php

namespace App\Http\Controllers\Api;

use App\Models\Account;
use App\Models\Syslog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Unisharp\Setting\Setting;

class AccountController extends Controller
{
    protected $settings;
    function __construct(Setting $settings)
    {
        $this->settings = $settings;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_id = $request->user()->id;
        $account = Account::find($id);
        $account->is_active = false;
        $account->save();
        (new Syslog())->log($user_id,$account->id,'update','accounts',1);
        $data = array([
            'message' => 'Actualizado Correctamente'
        ]);
        return response()->json($data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = $request->user()->id;

        $date = $request->get('date');
        $selected_account_id = intval($request->get('selected_account_id'));
        $a = Account::find($selected_account_id);
        $accounts = Account::where('sale_id',$a->sale_id)->get();
        $days_before_penalty = intval($this->settings->get('days_before_penalty',null));

        $start_date = strtotime($date);
        $month_count = 0;
        foreach ($accounts as $key=>$account){
            if($account->id >= $selected_account_id){
                /*if($account->id == $selected_account_id){
                    $payment_date = $date;
                    $limit_payment_date = date("Y-m-d", strtotime("+".$days_before_penalty." days", strtotime($date)));
                }else{
                    $payment_date = date("Y-m-d", strtotime("+".($key)." month", $start_date));
                    $limit_payment_date = date("Y-m-d", strtotime("+".$days_before_penalty." days", strtotime($payment_date)));
                }*/
                $payment_date = date("Y-m-d", strtotime("+".($month_count)." month", $start_date));
                $limit_payment_date = date("Y-m-d", strtotime("+".$days_before_penalty." days", strtotime($payment_date)));
                $account->payment_date = $payment_date;
                $account->limit_payment_date = $limit_payment_date;
                $account->save();
                (new Syslog())->log($user_id,$account->id,'update','accounts',1);
                $month_count = $month_count + 1;
            }
        }
        $data = array([
            'message' => 'Reprogramado Correctamente'
        ]);
        return response()->json($data);
    }
}
