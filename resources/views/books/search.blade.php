@extends("layouts\main", ['title' => 'search', 'page' => 'search'])

@section('content')
<h3>Search me, I got books...</h3>

<form action="/books/search" method="post">
@csrf

  <label for="title">title:</label>
  <input type="text" name="title" id=""><br />

  <!-- <label for="date">year:</label>
  <input type="text" name="date" id=""><br /> -->

  <label for="description">description:</label>
  <input type="text" name="description" id=""><br />

  <button>search</button>

</form>

  @foreach ($books as $book)
      <div class="book-list">
      <h4>{{ $book->title }}</h4>  
      <div class="book-list__blurb">{{ $book->description }}</div>
      <img src="{{ $book->image }}" alt="book cover" class="book-list__cover">
      </div>
  @endforeach
      
  @endsection
