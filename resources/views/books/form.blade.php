    @csrf
  
    <label for="title">title:</label>
    <input type="text" name="title" value="{{ old('title', $book->title) }}"/>
    <br />
    <label for="description">description:</label>
    <textarea type="text" name="description">{{ old('description', $book->description) }}</textarea><br/>
    <label for="category">category:</label>
    <select name="category">
          <option value="">-- select a category --</option>
      @foreach($categories as $category)
        @if(old('category') == $category->id || $book->category_id == $category->id)
          <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
        @else
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endif
      @endforeach      
    </select>

    @include('\books\author-update')
    <button>save</button>