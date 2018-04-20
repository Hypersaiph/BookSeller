<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InflowRequest;
use App\Models\BookType;
use App\Models\Inflow;
use Illuminate\Support\Facades\DB;

class InflowController extends Controller
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
        //select b.id, SUM(i.quantity)-COALESCE(SUM(o.quantity),0) as stock, SUM(o.quantity) as outf FROM book_types b JOIN inflows i ON i.book_type_id = b.id LEFT JOIN outflows o ON o.book_type_id = b.id GROUP BY b.id
        //select b.id, SUM(i.quantity)-COALESCE(SUM(o.quantity),0) as stock, COALESCE(SUM(i.quantity),0) as inflows, COALESCE(SUM(o.quantity),1) as outflows, i.quantity as ins, o.quantity as outs FROM book_types b JOIN inflows i ON i.book_type_id = b.id LEFT JOIN outflows o ON o.book_type_id = b.id GROUP BY b.id
        //select b.id, SUM(i.quantity) - (select sum(o.quantity) from outflows o where o.book_type_id=b.id) as stock FROM book_types b JOIN inflows i ON i.book_type_id = b.id GROUP BY b.id
        $book_types = BookType::where('isbn10','like','%'.$search.'%')
            ->orWhere('isbn13','like','%'.$search.'%')
            ->orWhere('serial_cd','like','%'.$search.'%')
            ->join('inflows', 'book_types.id', '=', 'inflows.book_type_id')
            ->select('book_types.*', DB::raw("SUM(inflows.quantity) - ifnull((select sum(o.quantity) from outflows o where o.book_type_id=book_types.id),0) as stock"))
            ->groupBy('book_types.id')
            ->orderBy('book_id', 'desc')
            ->orderBy('book_types.created_at', 'desc')
            ->paginate($items_per_page);
        $total = $book_types->total();
        $current_page = $book_types->currentPage();
        $items_per_page = $book_types->perPage();
        return view('admin.inflows.list', compact('book_types', 'total', 'current_page', 'items_per_page', 'search'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InflowRequest $request, $id)
    {
        $inflow = new Inflow([
            'book_type_id' => $id,
            'quantity' => $request->get('quantity'),
        ]);
        $inflow->save();
        return redirect()->route('inflows.index');
    }
}
