@extends('\layouts\main', ['title' => 'edit', 'page' => 'edit'])

@section('content')
  
  <h3>Edit an author:</h3>
    <form action="/authors/{{ $author->id }}" method="post">
      <input type="hidden" name="_method" value="PUT">
      @include('\authors\form', ['author' => $author])
    </form>

@endsection
