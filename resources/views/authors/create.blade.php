@extends('\layouts\main', ['title' => 'create', 'page' => 'create'])

@section('content')
  
  <h3>Add an author:</h3>
    <form action="/authors" method="post">
      @include('\authors\form', ['author' => $author])
    </form>
@endsection
