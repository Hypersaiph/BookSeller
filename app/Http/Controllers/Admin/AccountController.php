<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Sale;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sale_id = \Request::get('sale_id');
        if($sale_id){
            $sale = Sale::find($sale_id);
            $accounts = Account::where('sale_id',$sale_id)
                ->orderBy('code', 'asc')
                ->get();
            $total = sizeof($accounts);
            return view('admin.sales.accounts.list', compact('accounts','sale','total'));
        }else{
            return redirect()->route('sales.index');
        }
    }
}
