<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;


class SearchController extends Controller
{
    //
    public function handleSearch(Request $request)
    {
        $book_search = $request->input('search');

        $books = Book::where('title', 'like', '%' . $book_search . '%')->orWhere('description', 'like', '%' . $book_search . '%')->limit(20)->get();
        
        $author_search = $request->input('search');

        $authors = Author::where('name', 'like', '%' . $author_search . '%')->orWhere('bio', 'like', '%' . $author_search . '%')->limit(20)->get();

        return view('index/search', compact('books', 'authors'));
    }
}
