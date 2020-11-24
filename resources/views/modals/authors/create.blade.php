<form class="form form-create" method="POST" action="{{ route('author.create') }}">
    @csrf
    <div class="form-group">
        <label for="author-name">Название автора</label>
        <input type="text" name="name" class="form-control" id="author-name" value="">
    </div>
</form>
