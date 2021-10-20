@extends('\layouts\main', ['title' => 'authors', 'page' => 'authors'])

@section('content')
@if (Session::has('success_message'))
 
    <div class="alert alert-success">
        {{ Session::get('success_message') }}
    </div>
 
@endif

@foreach ($authors as $name)
      <div class="author-list">
      <h4>{{ $name->name }}</h4>  
      <div class="author-list__blurb">{{ $name->bio }}</div>
      </div>
  @endforeach
@endsection