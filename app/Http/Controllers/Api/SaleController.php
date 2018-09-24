<?php

namespace App\Http\Controllers\Api;

use App\Models\Account;
use App\Models\Outflow;
use App\Models\Sale;
use App\Models\Syslog;
use App\Transformers\SaleTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use Unisharp\Setting\Setting;

class SaleController extends Controller
{
    /**
     * @var Manager
     */
    private $fractal;

    /**
     * @var SaleTransformer
     */
    private $transformer;
    protected $settings;
    function __construct(Manager $fractal, SaleTransformer $transformer, Setting $settings)
    {
        $this->fractal = $fractal;
        $this->transformer = $transformer;
        $this->settings = $settings;
    }
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index(Request $request)
    {
        $user_id = $request->user()->id;
        $id = $request->query('id');
        if($id){
            $sales = Sale::where('id', $id)
                ->orderBy('created_at', 'desc')
                ->get();
        }else{
            $sales = Sale::where('user_id', $user_id)
                ->orderBy('created_at', 'desc')
                ->get();
        }
        $this->fractal->parseIncludes($request->query('include'));
        $sales = new Collection($sales, $this->transformer); // Create a resource collection transformer
        $sales = $this->fractal->createData($sales); // Transform data
        return $sales->toArray();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user_id = $request->user()->id;
        $customer_id = $request->get('customer_id');
        $sale_type_id = $request->get('sale_type_id');
        $months = $request->get('months');
        $anual_interest = $request->get('anual_interest');
        $initial_date = $request->get('initial_date');
        $outflows = $request->get('outflows');
        //echo print_r($outflows);
        if($anual_interest==null){
            $anual_interest = 0;
        }
        $sale = new Sale([
            'customer_id' => $customer_id,
            'user_id'=> $user_id,
            'sale_type_id' => $sale_type_id,
            'code' => $this->getSaleCode(),
            'is_billed' => false,
            'months' => $sale_type_id==2? $months : 0,
            'anual_interest' => $sale_type_id==2? round(($anual_interest/100),2) : 0
        ]);
        $sale->save();(new Syslog())->log($user_id,$sale->id,'create','sales',1);
        $principal = 0;
        //create outflows
        $json = json_decode($outflows);
        foreach ($json as $object) {
            $principal = $principal + (intval($object->quantity) * floatval($object->selling_price));
            $outflow = new Outflow([
                'book_type_id' => $object->book_type_id,
                'sale_id' => $sale->id,
                'quantity' => $object->quantity,
                'selling_price'  => $object->selling_price
            ]);
            $outflow->save();(new Syslog())->log($user_id,$outflow->id,'create','outflows',1);
        }
        //create accounts;
        if($sale_type_id == 1){
            $account = new Account([
                'sale_id' => $sale->id,
                'code' => $sale->code.'-1',
                'amount' => round($principal, 2),
                'penalty' => 0.0,
                'payment_date' => $initial_date,
                'limit_payment_date' => $initial_date,
                'is_active' => false
            ]);
            $account->save();
            (new Syslog())->log($user_id,$account->id,'create','accounts',1);
        }else{
            $days_in_year = intval($this->settings->get('days_in_year',null));
            $days_before_penalty = intval($this->settings->get('days_before_penalty',null));
            $interest = ($principal) * (floatval($anual_interest)/100) * ((intval($months)*30)/$days_in_year);
            $amount = ($principal + $interest) / intval($months);
            $start_date = strtotime($initial_date);
            
            for ($i=1 ; $i<=intval($months); $i++){
                if($i == 1){
                    $payment_date = $initial_date;
                    $limit_payment_date = date("Y-m-d", strtotime("+".$days_before_penalty." days", strtotime($initial_date)));
                }else{
                    $payment_date = date("Y-m-d", strtotime("+".($i-1)." month", $start_date));
                    $limit_payment_date = date("Y-m-d", strtotime("+".$days_before_penalty." days", strtotime($payment_date)));
                }
                $account = new Account([
                    'sale_id' => $sale->id,
                    'code' => $sale->code.'-'.$i,
                    'amount' => round($amount, 2),
                    'penalty' => 0.0,
                    'payment_date' => $payment_date,
                    'limit_payment_date' => $limit_payment_date,
                    'is_active' => true
                ]);
                $account->save();
                (new Syslog())->log($user_id,$account->id,'create','accounts',1);
            }
        }
        $data = array([
            'message' => 'everything done! :3'
        ]);
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_id = $request->user()->id;
        $customer_id = $request->get('customer_id');
        $sale_type_id = $request->get('sale_type_id');
        $months = $request->get('months');
        $anual_interest = $request->get('anual_interest');
        $initial_date = $request->get('initial_date');
        $outflows = $request->get('outflows');
        //echo print_r($outflows);
        if($anual_interest==null){
            $anual_interest = 0;
        }
        $sale = Sale::find($id);
        $sale->customer_id = $customer_id;
        $sale->months = $sale_type_id==2? $months : 0;
        $sale->anual_interest = $sale_type_id==2? round(($anual_interest/100),2) : 0;
        $sale->save();(new Syslog())->log($user_id,$sale->id,'update','sales',1);

        //delete last outflows
        $last_outflows = Outflow::where('sale_id',$sale->id);
        $last_outflows->delete();
        //delete last accounts
        $last_accounts = Account::where('sale_id',$sale->id);
        $last_accounts->delete();

        $principal = 0;
        //create new outflows
        $json = json_decode($outflows);
        foreach ($json as $object) {
            $principal = $principal + (intval($object->quantity) * floatval($object->selling_price));
            $outflow = new Outflow([
                'book_type_id' => $object->book_type_id,
                'sale_id' => $sale->id,
                'quantity' => $object->quantity,
                'selling_price'  => $object->selling_price
            ]);
            $outflow->save();(new Syslog())->log($user_id,$outflow->id,'create','outflows',1);
        }
        //create new accounts;
        if($sale_type_id == 1){
            $account = new Account([
                'sale_id' => $sale->id,
                'code' => $sale->code.'-1',
                'amount' => round($principal, 2),
                'penalty' => 0.0,
                'payment_date' => $initial_date,
                'limit_payment_date' => $initial_date,
                'is_active' => false
            ]);
            $account->save();
            (new Syslog())->log($user_id,$account->id,'create','accounts',1);
        }else{
            $days_in_year = intval($this->settings->get('days_in_year',null));
            $days_before_penalty = intval($this->settings->get('days_before_penalty',null));
            $interest = ($principal) * (floatval($anual_interest)/100) * ((intval($months)*30)/$days_in_year);
            $amount = ($principal + $interest) / intval($months);
            $start_date = strtotime($initial_date);

            for ($i=1 ; $i<=intval($months); $i++){
                if($i == 1){
                    $payment_date = $initial_date;
                    $limit_payment_date = date("Y-m-d", strtotime("+".$days_before_penalty." days", strtotime($initial_date)));
                }else{
                    $payment_date = date("Y-m-d", strtotime("+".($i-1)." month", $start_date));
                    $limit_payment_date = date("Y-m-d", strtotime("+".$days_before_penalty." days", strtotime($payment_date)));
                }
                $account = new Account([
                    'sale_id' => $sale->id,
                    'code' => $sale->code.'-'.$i,
                    'amount' => round($amount, 2),
                    'penalty' => 0.0,
                    'payment_date' => $payment_date,
                    'limit_payment_date' => $limit_payment_date,
                    'is_active' => true
                ]);
                $account->save();
                (new Syslog())->log($user_id,$account->id,'create','accounts',1);
            }
        }
        $data = array([
            'message' => 'Venta Actualizada!'
        ]);
        return response()->json($data);
    }
    public function getSaleCode(){
        $sale = Sale::all();
        return date('y').''.sprintf('%07d', sizeof($sale)+1);
    }
}
