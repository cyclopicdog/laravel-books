
    @csrf
  
    <label for="name">name:</label>
    <input type="text" name="name" value="{{ $author->name }}" required/>
    <br />
    <label for="bio">bio:</label>
    <textarea type="text" name="bio" >{{ $author->bio }}</textarea>
    <button>save</button>
  