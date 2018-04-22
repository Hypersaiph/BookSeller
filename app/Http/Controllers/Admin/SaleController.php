<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Outflow;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items_per_page = 10;
        $search = \Request::get('search');
        $sales = Sale::where([
            ['code','like','%'.$search.'%'],
            //['assigned_code', '<>', '']
        ])
            ->orWhere('id','like','%'.$search.'%')
            ->orderBy('created_at', 'desc')
            ->paginate($items_per_page);
        $total = $sales->total();
        $current_page = $sales->currentPage();
        $items_per_page = $sales->perPage();
        return view('admin.sales.list', compact('sales', 'total', 'current_page', 'items_per_page', 'search'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete accounts
        $accounts = Account::where('sale_id',$id);
        $accounts->delete();
        //delete aoutflows
        $outflows = Outflow::where('sale_id',$id);
        $outflows->delete();
        //delete sale
        $sale = Sale::find($id);
        $sale->delete();
        return redirect()->route('sales.index');
    }
}
