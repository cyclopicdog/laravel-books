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
      <div class="book-list__blurb">{{ $book->description }}</div>
      <img src="{{ $book->image }}" alt="book cover" class="book-list__cover">
      </div>
      
@endforeach

@endsection