@extends('\layouts\main', ['title' => 'about us', 'page' =>'about-us'])

@section('content')

    <h1>We smell</h1>
        @foreach($authors as $key)
        @if($key['name'] === 'Tom')
        @continue
        @endif
    <div class="about-us__person">
      <h3 class="about-us__person-name">{{$key['name']}}</h3>
      <ul>
        <li class="about-us__person-position">position: {{$key['position']}}</li>
        <li class="about-us__person-age">age: {{$key['age']}}</li>
      </ul>
    </div>
        @endforeach
  
  <footer>
    {{$author}}<br />
    {{$year}}
  </footer>
@endsection