<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $books = Book::where('title', 'like', '%' . $search . '%')->limit(20)->get();
         
        return view('books/index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = new Book();
        $categories = Category::all();
        $authors =Author::all();

        return view('books\create', compact('book', 'categories', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'title' => 'required',
            'category' => 'required'
        ],
        [
            'title.required' => 'Add the title dum dum!'
        ]);

        $title = $request->input('title');
        $description = $request->input('description');
        $category = $request->input('category');

        $book = new Book();
        $book->title = $title;
        $book->description = $description;
        $book->category_id = $category;
        $book->save();

        session()->flash('success_message', 'The book was saved, yay!');

        return redirect()->action('BookController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        
        return $book;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $book = Book::findOrFail($id);
        $categories = Category::all();
        $authors = Author::all();
        
        return view('\books\edit', compact('book', 'categories', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $authors_to_add = explode(' ', $request->input('add_authors'));
        
        $authors_to_remove = explode(' ', $request->input('remove_authors'));
        $this->validate($request,
        [
            'title' => 'required',
            'add_authors' => 'required',
            'category' => 'required'
        ],
        [
            'title.required' => 'Add the title dum dum!',
            
            'category.required' => 'Must assign a category'
        ]);  
        
        $book = Book::findOrFail($id);
        
        $book->authors()->sync($authors_to_add);   

        
        $book->title = $request->input('title');
        $book->description = $request->input('description');
        $book->category_id = $request->input('category');
        $book->save();
        


        session()->flash('success_message', 'The book was updated, yay!');

        return redirect()->action('BookController@index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search()
    {
        $books = [];
        return view('books\search', compact('books'));
    }

    public function handleSearch(Request $request)
    {
        $title = $request->input('title');

        $description = $request->input('description');

        $books = Book::where('title', 'like', '%' . $title . '%')->where('description', 'like', '%' . $description . '%')->limit(20)->get();
        

        return view('books/search', compact('books'));
    }
}
