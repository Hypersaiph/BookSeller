<?php

namespace App\Http\Controllers\Api;

use App\Models\BookType;
use App\Transformers\BookTypeTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class ProductTypeController extends Controller
{
    /**
     * @var Manager
     */
    private $fractal;

    /**
     * @var BookTypeTransformer
     */
    private $transformer;

    function __construct(Manager $fractal, BookTypeTransformer $transformer)
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
        //parsing requierements
        $where = array();
        $title = $request->query('title');
        $serial = $request->query('serial');
        $book_type = $request->query('book_type');
        if($title){
            array_push($where, ['books.title','like','%'.$title.'%']);
        }
        if($book_type){
            array_push($where, ['type_id','=',$book_type] );
        }
        if($serial){
            $product = BookType::orWhere('isbn10','like','%'.$serial.'%')
                ->orWhere('isbn13','like','%'.$serial.'%')
                ->orWhere('serial_cd','like','%'.$serial.'%')
                ->join('books', 'book_types.book_id', '=', 'books.id')
                ->select('book_types.*')
                ->get();
        }else{
            $product = BookType::where($where)
                ->join('books', 'book_types.book_id', '=', 'books.id')
                ->select('book_types.*')
                ->get();
        }
        $this->fractal->parseIncludes($request->query('include'));
        $product = new Collection($product, $this->transformer); // Create a resource collection transformer
        $product = $this->fractal->createData($product); // Transform data
        return $product->toArray();
    }
}
