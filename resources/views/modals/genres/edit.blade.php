<form class="form form-update" method="POST" action="{{route('genre.update', $genreId)}}">
    @csrf
    <div class="form-group">
        <label for="genre-name"></label>
        <input type="text" name="name" class="form-control" id="genre-name" value="{{ $genre->name }}">
    </div>
</form>
