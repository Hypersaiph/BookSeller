<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookType;
use App\Models\Customer;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $months = ["enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre"];
        $now = date("Y-m-d");
        $days_ago = date("Y-m-d", strtotime("-10 days", strtotime($now)));
        $months_ago = date("Y-m-d", strtotime("-6 months", strtotime($now)));

        //customers
        $customers = Customer::all();
        $customer_count = sizeof($customers);
        $new_customers = Customer::whereDate('created_at','>=',$days_ago)->get();
        $new_customers_count = sizeof($new_customers);

        //sales
        $sales = Sale::all();
        $sale_count = sizeof($sales);
        $new_sales = Sale::whereDate('created_at','>=',$days_ago)->get();
        $new_sales_growth = round(sizeof($new_sales) / $sale_count, 2);

        //profit
        $todays_sales = Sale::whereDate('created_at','>=',$now)->get();
        $profit = 0;
        foreach ($todays_sales as $todays_sale){
            foreach ($todays_sale->accounts as $account){
                $profit = $profit + ($account->amount+$account->penalty);
            }
        }
        //earnings 10 days ago
        $days_ago_sales = Sale::whereBetween('created_at', [$days_ago." 00:00:00", $now." 23:59:59"])->orderBy('created_at', 'asc')->get();
        $earnings = 0;
        $days_ago_sales_amounts = array();
        foreach ($days_ago_sales as $days_ago_sale){
            foreach ($days_ago_sale->accounts as $account){
                array_push($days_ago_sales_amounts,$account->amount+$account->penalty);
                $earnings = $earnings + ($account->amount+$account->penalty);
            }
        }
        $yearly_revenue = Sale::join('accounts', 'sales.id', '=', 'accounts.sale_id')->selectRaw("SUM(accounts.amount+accounts.penalty) as revenue, MONTH(sales.created_at) as month")->groupBy('month')->get();
        $year_months = array();
        foreach ($yearly_revenue as $revenue){
            array_push($year_months,$months[$revenue->month-1]);
        }
        //3 products with the least inventory
        $products = BookType::leftJoin('inflows', 'book_types.id', '=', 'inflows.book_type_id')
            ->select('book_types.*', DB::raw("SUM(inflows.quantity) - ifnull((select sum(o.quantity) from outflows o where o.book_type_id=book_types.id and o.deleted_at is null),0) as stock"))
            ->groupBy('book_types.id')
            ->orderBy('stock', 'asc')
            ->limit(3)->get();
        //cuotas atrasadas
        $accounts = DB::table('accounts')->where([['limit_payment_date','<',date('Y-m-d')],['is_active',1]])->get();
        $size_accounts = sizeof($accounts);
        $total_accounts = 0;
        foreach ($accounts as $account){
            $total_accounts = $total_accounts + ($account->amount + $account->penalty);
        }
        return view('admin.dashboard.dashboard', compact('now','days_ago','months_ago','customer_count','new_customers_count','sale_count','new_sales_growth','profit',
            'earnings', 'days_ago_sales_amounts','yearly_revenue','year_months','products','size_accounts','total_accounts'));
    }
}
