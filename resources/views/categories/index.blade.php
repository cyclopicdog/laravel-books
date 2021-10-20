@extends('\layouts\main', ['title' => 'categories', 'page' => 'categories'])

@section('content')
@if (Session::has('success_message'))
 
    <div class="alert alert-success">
        {{ Session::get('success_message') }}
    </div>
 
@endif

@foreach ($categories as $category)
      <div class="category-list">
      <h4>{{ $category->name }}</h4>  
      <p>id: {{ $category->id }}</p>
      </div>
      
@endforeach

@endsection