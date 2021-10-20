
<header>
  <nav>
    @if($page === 'home')
    <a href="/" class="selected">home</a>
    @else
    <a href="/" >home</a>
    @endif
    
    
    
    @if($page === 'books')
    <a href="/books" class="selected">books</a>
    @else
    <a href="/books" >books</a>
    @endif
    
    <!-- @if($page === 'search')
    <a href="/books/search" class="selected">search</a>
    @else
    <a href="/books/search">search</a>
    @endif -->
  
    @if($page === 'authors')
    <a href="/authors" class="selected">authors</a>
    @else
    <a href="/authors" >authors</a>
    @endif
  
    @if($page === 'about-us')
    <a href="/about-us" class="selected">about us</a>
    @else
    <a href="/about-us" >about us</a>
    @endif
    
    @if($page === 'faq')
  <a href="/faq" class="selected">faq</a>
  @else
   <a href="/faq" >faq</a>
  @endif
</nav>
  
<div class="search">
    <form action="/" method="post">
    @csrf
    <label for="search">search database:</label>
    <input type="text" name="search" class="search__input" id="">
    <button>search</button>
</form>
</header>