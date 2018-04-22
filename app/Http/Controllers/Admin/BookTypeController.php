<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookTypeRequest;
use App\Models\Book;
use App\Models\BookType;
use App\Models\ManyToMany\BookPublisher;
use App\Models\Publisher;
use App\Models\Type;
use Illuminate\Http\Request;

class BookTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book_id = \Request::get('book_id');
        if($book_id){
            $book = Book::find($book_id);
            $book_types = $book->book_types;
            $total = sizeof($book_types);
            $book_title = $this->limit($book->title, 50);
            $types = Type::all();
            if($total<sizeof($types)){
                $create = true;
            }else{
                $create = false;
            }
            return view('admin.books.types.list', compact('book_id','book_types','total','book_title','create'));
        }else{
            return redirect()->route('books.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book_id = \Request::get('book_id');
        if($book_id){
            $book = Book::find($book_id);
            $book_title = $this->limit($book->title, 50);
            $book_types = array();
            foreach ($book->book_types as $book_type){
                array_push($book_types, $book_type->type->id);
            }
            $types = Type::all();
            $publishers = Publisher::all();
            return view('admin.books.types.create', compact('book_id','book_types','book_title','types','publishers'));
        }else{
            return redirect()->route('books.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookTypeRequest $request)
    {
        $book_id = $request->get('book_id');
        if($book_id){
            //book_type
            $type_id = $request->get('type_id');
            if($type_id == 3){
                $book_type = new BookType([
                    'book_id' => $request->get('book_id'),
                    'type_id' => $request->get('type_id'),
                    'price' => $request->get('price'),
                    'pages' => null,
                    'isbn10' => null,
                    'isbn13' => null,
                    'serial_cd' => $request->get('serial_cd'),
                    'duration' => $request->get('duration'),
                    'weight' => null,
                    'width' => null,
                    'height' => null,
                    'depth' => null
                ]);
            }else{
                $book_type = new BookType([
                    'book_id' => $request->get('book_id'),
                    'type_id' => $request->get('type_id'),
                    'price' => $request->get('price'),
                    'pages' => $request->get('pages'),
                    'isbn10' => $request->get('isbn10'),
                    'isbn13' => $request->get('isbn13'),
                    'serial_cd' => null,
                    'duration' => null,
                    'weight' => $request->get('weight'),
                    'width' => $request->get('width'),
                    'height' => $request->get('height'),
                    'depth' => $request->get('depth')
                ]);
            }
            $book_type->save();
            //book_publishers
            $input_publishers = $request->get('publishers')[0];
            $input_publishers_array = explode(',', $input_publishers);
            foreach ($input_publishers_array as $input_publisher) {
                $trimmed_publisher_name = trim($input_publisher);
                if ($trimmed_publisher_name != "") {
                    $this->createBookPublisherOrPublisher($trimmed_publisher_name, $book_type->id);
                }
            }
            return redirect()->route('book-type.index', array('book_id'=>$book_id));
        }else{
            return redirect()->route('books.index');
        }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book_id = \Request::get('book_id');
        if($book_id){
            $book = Book::find($book_id);
            $book_title = $this->limit($book->title, 50);
            $book_types = array();
            foreach ($book->book_types as $book_type){
                array_push($book_types, $book_type->type->id);
            }
            $types = Type::all();
            $publishers = Publisher::all();
            $book_type = BookType::find($id);

            $book_type_publishers = "";
            foreach ($book_type->publishers as $publisher){
                $book_type_publishers = $book_type_publishers.','.$publisher->name;
            }
            $book_type_publishers = substr($book_type_publishers, 1);
            return view('admin.books.types.edit', compact('book_id','book_types','book_title','types','publishers','book_type','book_type_publishers'));
        }else{
            return redirect()->route('books.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookTypeRequest $request, $id)
    {
        $book_id = $request->get('book_id');
        if($book_id){
            $type_id = $request->get('type_id');
            $book_type = BookType::find($id);
            $book_type->price = $request->get('price');
            if($type_id == 3){
                $book_type->duration = $request->get('duration');
                $book_type->serial_cd = $request->get('serial_cd');
            }else{
                $book_type->pages = $request->get('pages');
                $book_type->isbn10 = $request->get('isbn10');
                $book_type->isbn13 = $request->get('isbn13');
                $book_type->weight = $request->get('weight');
                $book_type->width = $request->get('width');
                $book_type->height = $request->get('height');
                $book_type->depth = $request->get('depth');
            }
            $book_type->save();
            //book_publishers
            $input_publishers = $request->get('publishers')[0];
            $array_input_publishers = explode(',', $input_publishers);
            $trimmed_publishers = array();
            foreach ($array_input_publishers as $array_input_publisher) {
                $trimmed_publisher_name = trim($array_input_publisher);
                if ($trimmed_publisher_name != "") {
                    array_push($trimmed_publishers, $trimmed_publisher_name);
                }
            }
            $book_publishers = [];
            foreach ($book_type->publishers as $publisher){
                array_push($book_publishers, $publisher->name);
            }
            if(sizeof($trimmed_publishers) <= sizeof($book_type->publishers)){
                //delete
                foreach ($book_type->publishers as $publisher){
                    if(in_array($publisher->name, $trimmed_publishers)){
                    }else{
                        $book_publisher = BookPublisher::where([
                            ['book_type_id', '=', $book_type->id],
                            ['publisher_id', '=', $publisher->id],
                        ])->first();
                        $book_publisher->delete();
                    }
                }
                foreach ($trimmed_publishers as $trimmed_publisher){
                    if(in_array($trimmed_publisher, $book_publishers)){
                    }else{
                        $this->createBookPublisherOrPublisher($trimmed_publisher, $book_type->id);
                    }
                }
            }else{//add
                foreach ($trimmed_publishers as $trimmed_publisher){
                    if(in_array($trimmed_publisher, $book_publishers)){
                    }else{
                        $this->createBookPublisherOrPublisher($trimmed_publisher, $book_type->id);
                    }
                }
                //inverse delete
                foreach ($book_publishers as $book_publisher){
                    if(in_array($book_publisher, $trimmed_publishers)){
                    }else{
                        $found_publisher = Publisher::whereName($book_publisher)->first();
                        $book_publisher = BookPublisher::where([
                            ['book_type_id', '=', $book_type->id],
                            ['publisher_id', '=', $found_publisher->id],
                        ])->first();
                        $book_publisher->delete();
                    }
                }
            }
            return redirect()->route('book-type.index', array('book_id'=>$book_id));
        }else{
            return redirect()->route('books.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book_id = \Request::get('book_id');
        if($book_id){
            //delete publishers
            $publishers = BookPublisher::where('book_type_id',$id);
            $publishers->delete();
            //delete book_type
            $book_type = BookType::find($id);
            $book_type->delete();
            return redirect()->route('book-type.index', array('book_id' => $book_id));
        }else{
            return redirect()->route('books.index');
        }
    }
    //add new Publisher
    public function createBookPublisherOrPublisher($trimmed_publisher_name, $book_type_id){
        //verify existance in db
        $publisher = Publisher::whereName($trimmed_publisher_name)->first();
        if($publisher == null){
            $new_publisher = new Publisher([
                'name' => $trimmed_publisher_name,
            ]);
            $new_publisher->save();
            $book_publisher = new BookPublisher([
                'book_type_id' => $book_type_id,
                'publisher_id' => $new_publisher->id,
            ]);
            $book_publisher->save();
        }else{
            $book_publisher = new BookPublisher([
                'book_type_id' => $book_type_id,
                'publisher_id' => $publisher->id,
            ]);
            $book_publisher->save();
        }
    }
    //limit string
    public static function limit($string, $length = 150){
        $limit = abs((int)$length);
        if(strlen($string) > $limit) {
            $string = preg_replace("/^(.{1,$limit})(\s.*|$)/s", '\1...', $string);
        }
        return $string;
    }
}
