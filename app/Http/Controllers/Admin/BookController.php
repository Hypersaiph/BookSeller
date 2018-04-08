<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Language;
use App\Models\ManyToMany\BookAuthor;
use App\Models\ManyToMany\BookGenre;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class BookController extends Controller
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
        $books = Book::where([
            ['title','like','%'.$search.'%'],
            //['assigned_code', '<>', '']
        ])
            ->orderBy('created_at', 'desc')
            ->paginate($items_per_page);
        $total = $books->total();
        $current_page = $books->currentPage();
        $items_per_page = $books->perPage();
        return view('admin.books.list', compact('books', 'total', 'current_page', 'items_per_page', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::all();
        $authors = Author::all();
        $genres = Genre::all();
        return view('admin.books.create', compact('languages','authors','genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function store(BookRequest $request)
    {
        //image handling
        $image_name = Uuid::generate(4).'.'.$request->cover_image->getClientOriginalExtension();
        $request->cover_image->move(public_path('images/books'), $image_name);
        //book
        $book = new Book([
            'language_id' => $request->get('language'),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'edition' => $request->get('edition'),
            'publication_date' => new \DateTime($request->get('publication_date')),
            'cover_image' => $image_name,
        ]);
        $book->save();
        //authors and book_authors
        $authors = $request->get('authors')[0];
        $authors_array = explode(',', $authors);
        foreach ($authors_array as $author_name) {
            $trimmed_author_name = trim($author_name);
            if ($trimmed_author_name != "") {
                $author = Author::whereName($trimmed_author_name)->first();
                if($author == null){
                    $author = new Author([
                        'name' => $trimmed_author_name,
                    ]);
                    $author->save();
                    $book_author = new BookAuthor([
                        'book_id' => $book->id,
                        'author_id' => $author->id,
                    ]);
                    $book_author->save();
                }else{
                    $book_author = new BookAuthor([
                        'book_id' => $book->id,
                        'author_id' => $author->id,
                    ]);
                    $book_author->save();
                }
            }
        }
        //book_genres
        $genres = $request->get('genres');
        foreach ($genres as $genre){
            $book_genre = new BookGenre([
                'book_id' => $book->id,
                'genre_id' => $genre,
            ]);
            $book_genre->save();
        }
        return redirect()->route('books.index');
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
        $languages = Language::all();
        $authors = Author::all();
        $genres = Genre::all();
        $book = Book::find($id);
        $book_genres = [];
        $book_authors = "";
        foreach ($book->genres as $genre){
            array_push($book_genres, $genre->id);
        }
        foreach ($book->authors as $author){
            $book_authors = $book_authors.','.$author->name;
        }
        $book_authors = substr($book_authors, 1);
        return view('admin.books.edit', compact('languages','authors','genres','book_genres','book_authors','book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function update(BookRequest $request, $id)
    {
        //image handling
        if($request->cover_image != null){
            $image_name = Uuid::generate(4).'.'.$request->cover_image->getClientOriginalExtension();
            $request->cover_image->move(public_path('images/books'), $image_name);
        }
        //book
        $book = Book::find($id);
        $book->language_id = $request->get('language');
        $book->title = $request->get('title');
        $book->description = $request->get('description');
        $book->edition = $request->get('edition');
        $book->publication_date = new \DateTime($request->get('publication_date'));
        if($request->cover_image != null){
            $book->cover_image = $image_name;
        }
        $book->save();
        //authors and book_authors
        $authors = $request->get('authors')[0];
        $input_authors_array = explode(',', $authors);
        $new_input_authors_array = array();
        foreach ($input_authors_array as $author_name) {
            $trimmed_author_name = trim($author_name);
            if ($trimmed_author_name != "") {
                array_push($new_input_authors_array, $trimmed_author_name);
            }
        }

        if(sizeof($new_input_authors_array) <= sizeof($book->authors)){
            //delete
            foreach ($book->authors as $author){
                if(in_array($author->name, $new_input_authors_array)){
                }else{
                    $book_author = BookAuthor::where([
                        ['book_id', '=', $book->id],
                        ['author_id', '=', $author->id],
                    ])->first();
                    $book_author->delete();
                }
            }
            //inverse add
            $book_authors = [];
            foreach ($book->authors as $author){
                array_push($book_authors, $author->name);
            }
            foreach ($new_input_authors_array as $new_input_author){
                if(in_array($new_input_author, $book_authors)){
                }else{
                    $this->createBookAuthorOrAuthor($new_input_author, $book->id);
                }
            }
        }else{//add
            $book_authors = [];
            foreach ($book->authors as $author){
                array_push($book_authors, $author->name);
            }
            foreach ($new_input_authors_array as $author_name){
                if(in_array($author_name, $book_authors)){
                }else{
                    $this->createBookAuthorOrAuthor($author_name, $book->id);
                }
            }
            //inverse delete
            foreach ($book_authors as $book_author){
                if(in_array($book_author, $new_input_authors_array)){
                }else{
                    $found_author = Author::whereName($book_author)->first();
                    $book_author = BookAuthor::where([
                        ['book_id', '=', $book->id],
                        ['author_id', '=', $found_author->id],
                    ])->first();
                    $book_author->delete();
                }
            }
        }
        //book_genres
        $input_genres = $request->get('genres');
        if(sizeof($input_genres) <= sizeof($book->genres)){
            //delete
            foreach ($book->genres as $genre){
                if(in_array($genre->id, $input_genres)){
                }else{
                    $book_genre = BookGenre::where([
                        ['book_id', '=', $book->id],
                        ['genre_id', '=', $genre->id],
                    ])->first();
                    $book_genre->delete();
                }
            }
            //inverse add
            $book_genres = [];
            foreach ($book->genres as $genre){
                array_push($book_genres, $genre->id);
            }
            foreach ($input_genres as $input_genre){
                if(in_array($input_genre, $book_genres)){
                }else{
                    $new_book_genre = new BookGenre([
                        'book_id' => $book->id,
                        'genre_id' => $input_genre,
                    ]);
                    $new_book_genre->save();
                }
            }
        }else{//add
            $book_genres = [];
            foreach ($book->genres as $genre){
                array_push($book_genres, $genre->id);
            }
            foreach ($input_genres as $input_genre){
                if(in_array($input_genre, $book_genres)){
                }else{
                    $new_book_genre = new BookGenre([
                        'book_id' => $book->id,
                        'genre_id' => $input_genre,
                    ]);
                    $new_book_genre->save();
                }
            }
            //inverse delete
            foreach ($book_genres as $book_genre){
                if(in_array($book_genre, $input_genres)){
                }else{
                    $book_genre = BookGenre::where([
                        ['book_id', '=', $book->id],
                        ['genre_id', '=', $book_genre],
                    ])->first();
                    $book_genre->delete();
                }
            }
        }
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('books.index');
    }
    //add new Author
    public function createBookAuthorOrAuthor($author_name, $book_id){
        //verify existance in db
        $found_author = Author::whereName($author_name)->first();
        if($found_author == null){
            $new_author = new Author([
                'name' => $author_name,
            ]);
            $new_author->save();
            $book_author = new BookAuthor([
                'book_id' => $book_id,
                'author_id' => $new_author->id,
            ]);
            $book_author->save();
        }else{
            $book_author = new BookAuthor([
                'book_id' => $book_id,
                'author_id' => $found_author->id,
            ]);
            $book_author->save();
        }
    }
}
