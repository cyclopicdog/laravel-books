@extends('\layouts\main', ['title' => 'categories show', 'page' => 'categories/show'])

@section('content')
@if (Session::has('success_message'))
 
    <div class="alert alert-success">
        {{ Session::get('success_message') }}
    </div>
 
@endif


      <div class="category-list">
      <h4>{{ $category->name }}</h4>  
      
      <p>All books:</p>
      <ul>
      @foreach($category->books as $book)
        <li>{{ $book->title }}</li>
      @endforeach
      </ul>
      </div>
      


@endsection