<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('posts/create');
    }
}
