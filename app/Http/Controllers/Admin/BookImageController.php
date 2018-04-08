<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookImageRequest;
use App\Models\Book;
use App\Models\Image;
use App\Models\ImageType;
use App\Models\ManyToMany\BookImage;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class BookImageController extends Controller
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
            $book_images = $book->images;
            $total = sizeof($book_images);
            $book_title = $this->limit($book->title, 50);
            return view('admin.books.images.list', compact('book_id','book_images','total','book_title'));
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
            $image_types = ImageType::where([
                ['type','=','banner'],
            ])->get();
            return view('admin.books.images.create', compact('book_id','book_title','image_types'));
        }else{
            return redirect()->route('books.index');
        }
        /*$book_id = \Request::get('book_id');
        if($book_id){

        }else{
            return redirect()->route('books.index');
        }*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function store(BookImageRequest $request)
    {
        $book_id = $request->get('book_id');
        if($book_id){
            //image handling
            $image_name = Uuid::generate(4).'.'.$request->banner_image->getClientOriginalExtension();
            $request->banner_image->move(public_path('images/banners'), $image_name);
            //image
            $image = new Image([
                'image_type_id' => $request->get('image_type'),
                'name' => $image_name,
                'big_text' => $request->get('big_text'),
                'small_text' => $request->get('small_text'),
            ]);
            $image->save();
            $book_image = new BookImage([
                'book_id' => $book_id,
                'image_id' => $image->id,
            ]);
            $book_image->save();
            return redirect()->route('book-image.index', array('book_id'=>$book_id));
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
            $image = Image::find($id);
            $book = Book::find($book_id);
            $book_title = $this->limit($book->title, 50);
            $image_types = ImageType::where([
                ['type','=','banner'],
            ])->get();
            return view('admin.books.images.edit', compact('book_id','book_title','image_types','image'));
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
    public function update(BookImageRequest $request, $id)
    {
        $book_id = $request->get('book_id');
        if($book_id){
            //image handling
            if($request->banner_image != null){
                $image_name = Uuid::generate(4).'.'.$request->banner_image->getClientOriginalExtension();
                $request->banner_image->move(public_path('images/banners'), $image_name);
            }
            //book
            $image = Image::find($id);
            $image->image_type_id = $request->get('image_type');
            $image->big_text = $request->get('big_text');
            $image->small_text = $request->get('small_text');
            if($request->banner_image != null){
                $image->name = $image_name;
            }
            $image->save();
            return redirect()->route('book-image.index', array('book_id'=>$request->get('book_id')));
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
        if($book_id) {
            $image = Image::find($id);
            $image->delete();
            return redirect()->route('book-image.index', array('book_id' => $book_id));
        }else{
            return redirect()->route('books.index');
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
