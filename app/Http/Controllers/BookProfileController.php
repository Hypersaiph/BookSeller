<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookProfileController extends Controller
{
    public function show($id)
    {
        echo $id;
    }
}
