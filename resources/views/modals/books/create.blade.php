<form class="form form-create" method="POST" action="{{ route('book.create') }}">
    @csrf
    <div class="form-group">
        <label for="author-name">Название книги</label>
        <input type="text" name="name" class="form-control" id="book-name" value="">
    </div>
    <div class="form-group">
        <label for="author-name">Автор</label>
        <select class="form-control" id="author-name" name="author_id">
            @foreach($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="genre-name">Жанр</label>
        <select class="form-control" id="genre-name" name="genre_id">
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="description">Описание</label>
        <textarea class="form-control" id="description" rows="5" name="desc"></textarea>
    </div>
</form>
