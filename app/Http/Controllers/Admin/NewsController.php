<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Models\Notification;
use DateInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
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
        $news = News::where([
            ['message','like','%'.$search.'%'],
            //['assigned_code', '<>', '']
        ])
            ->orderBy('created_at', 'desc')
            ->paginate($items_per_page);
        $total = $news->total();
        $current_page = $news->currentPage();
        $items_per_page = $news->perPage();
        return view('admin.news.list', compact('news', 'total', 'current_page', 'items_per_page', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $id = Auth::user()->id;
        $news = new News([
            'user_id' => $id,
            'title' => $request->get('title'),
            'message' => $request->get('message'),
        ]);
        $news->save();
        //use firebase API
        (new Notification())->notify($request->get('title'), $request->get('message'), "news");
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect()->route('news.index');
    }
}
