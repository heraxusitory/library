<form class="form form-update" method="POST" action="{{route('book.update', $book->book_id)}}">
    @csrf
    <div class="form-group">
        <label for="author-name">Название книги</label>
        <input type="text" name="name" class="form-control" id="book-name" value="{{ $book->book_name }}">
    </div>
    <div class="form-group">
        <label for="author-name">Автор</label>
        <select class="form-control" id="author-name" name="author_id">
            @foreach($authors as $author)
                <option value="{{ $author->id }}" @if($book->author_id == $author->id) selected @endif>{{ $author->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="genre-name">Жанр</label>
        <select class="form-control" id="genre-name" name="genre_id">
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}"
                        @if($book->genre_id == $genre->id) selected @endif>{{ $genre->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="description">Описание</label>
        <textarea class="form-control" id="description" rows="5" name="desc">{{ $book->book_desc }}</textarea>
    </div>
</form>

