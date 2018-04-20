<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Transformers\BookTransformer;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class ProductController extends Controller
{
    /**
     * @var Manager
     */
    private $fractal;

    /**
     * @var BookTransformer
     */
    private $transformer;

    function __construct(Manager $fractal, BookTransformer $transformer)
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
        $books = Book::orderBy('created_at', 'desc')
            ->get();
        $this->fractal->parseIncludes($request->query('include'));
        $books = new Collection($books, $this->transformer); // Create a resource collection transformer
        $books = $this->fractal->createData($books); // Transform data
        return $books->toArray();
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
}
