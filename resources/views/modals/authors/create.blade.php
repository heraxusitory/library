<form class="form form-update" method="POST" action="{{ route('author.update', $authorId) }}">
    @csrf
    <div class="form-group">
        <label for="author-name">Название автора</label>
        <input type="text" name="name" class="form-control" id="author-name" value="">
    </div>
</form>
