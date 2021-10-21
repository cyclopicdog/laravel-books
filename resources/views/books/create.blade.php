@extends('\layouts\main', ['title' => 'create book', 'page' => 'create-book'])

@section('content')
  
  <h3>Register new book:</h3>
  
  <form action="/books" method="post">
@include('\books\form')
  </form>
@endsection
