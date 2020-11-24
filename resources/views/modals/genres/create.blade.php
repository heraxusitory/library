<form class="form form-create" method="POST" action="{{ route('genre.create') }}">
    @csrf
    <div class="form-group">
        <label for="genre-name">Название жанра</label>
        <input type="text" name="name" class="form-control" id="genre-name" value="">
    </div>
</form>
