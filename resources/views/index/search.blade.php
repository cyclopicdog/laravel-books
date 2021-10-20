@extends('\layouts\main', ['title' => 'search results', 'page' =>'home'])

@section('content')
    <h2>Search results</h2>

@if($books)
    @foreach ($books as $book)
      <div class="book-list">
      <h4>{{ $book->title }}</h4>  
      <div class="book-list__blurb">{{ $book->description }}</div>
      <img src="{{ $book->image }}" alt="book cover" class="book-list__cover">
      </div>
    @endforeach
@endif

@if($authors)
    @foreach ($authors as $name)
      <div class="author-list">
      <h4>{{ $name->name }}</h4>  
      <div class="author-list__blurb">{{ $name->bio }}</div>
      </div>
    @endforeach
@endif

@endsection
 