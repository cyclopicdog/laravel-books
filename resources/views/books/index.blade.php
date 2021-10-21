@extends('\layouts\main', ['title' => 'books', 'page' => 'books'])

@section('content')
@if (Session::has('success_message'))
 
    <div class="alert alert-success">
        {{ Session::get('success_message') }}
    </div>
 
@endif

@foreach ($books as $book)
      <div class="book-list">
      <h4>{{ $book->title }}</h4>  
      <h5>Author(s):</h5>
        <ul>
            @foreach($book->authors as $author)
            <li class="book-list__author">{{ $author->name}}</li>
            @endforeach
        </ul>
      <div class="book-list__blurb">{{ $book->description }}</div>
      <img src="{{ $book->image }}" alt="book cover" class="book-list__cover">
      </div>
      
@endforeach

@endsection