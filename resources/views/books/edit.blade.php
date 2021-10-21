@extends('\layouts\main', ['title' => 'edit book', 'page' => 'edit'])

@section('content')
  
  <h3>edit a book:</h3>
  
  <form action="/books/{{ $book->id }}" method="post">
  @method('put')
@include('\books\form')
  </form>
@endsection