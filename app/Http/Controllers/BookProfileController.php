<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookProfileController extends Controller
{
    public function show($id)
    {
        $book = Book::find($id);
        return view('admin.books.profile', compact('book'));
    }
}
