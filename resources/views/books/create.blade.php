@extends('\layouts\main', ['title' => 'create', 'page' => 'create'])

@section('content')
  
  <h3>Register new book:</h3>
  
  <form action="/books" method="post">
    @csrf
  
    <label for="title">title:</label>
    <input type="text" name="title" required/>
    <br />
    <label for="description">description:</label>
    <textarea type="text" name="description"></textarea>
    <button>save</button>
  </form>
@endsection
