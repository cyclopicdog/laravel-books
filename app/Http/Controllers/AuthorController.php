<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get the fucking authors! (well, the first 20 anyway)
        $authors = Author::orderBy('name', 'asc')->limit(20)->get();
        Return view('authors/index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $author = new Author();
        return view('/authors/create', compact('author'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create a new Author and add the details from the $request
        $author = new Author();
        $author->name = $request->input('name');
        $author->bio = $request->input('bio');
        $author->save();

        session()->flash('success_message', 'The author was added, yay!');

        return redirect()->action('AuthorController@index');
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
        //
        $author = Author::find($id);
        
        return view('/authors/edit', compact('author'));
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
        $author = Author::find($id);
       // dd($author);
        $author->name = $request->input('name');
        $author->bio = $request->input('bio');
        $author->save();

        session()->flash('success_message', 'The author was updated, yay!');

        return redirect()->action('AuthorController@index');
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
}
