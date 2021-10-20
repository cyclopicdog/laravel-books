<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Book;

class IndexController extends Controller
{
    public function index()
    {
        // $book = new Book();
        // $book->title = 'book-test';
        // dd($book);
        
        $title = 'The Books Project';
        
        return view('\index\index', compact('title'));

    }
}
