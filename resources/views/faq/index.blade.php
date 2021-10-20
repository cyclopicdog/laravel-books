@extends ('\layouts\main', ['title' => 'FAQ', 'page' => 'faq'])

@section('content')
<h1>FAQ</h1>

<div class="faqs">

@foreach ($faqs as $faq)

    <div class="faqs__faq">

        <div class="faqs__question">Q: {{ $faq['Q'] }}</a>
 
        <div class="faqs__answer">A: {{ $faq['A'] }}</a>
 
    </div>
 
@endforeach
 
</div>

@endsection