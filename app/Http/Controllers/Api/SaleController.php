<?php

namespace App\Http\Controllers\Api;

use App\Models\Sale;
use App\Transformers\SaleTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

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

    function __construct(Manager $fractal, SaleTransformer $transformer)
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
        dump($request);
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
        //
    }
}
