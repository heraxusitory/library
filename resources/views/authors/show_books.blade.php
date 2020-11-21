@extends('index')

@section('content')
    <h3 class="content_title">Имя автора</h3>
<div class="card mt-4" style="width: 21rem;">
    <div class="img_block"></div>
    <div class="card-body">
        <h5 class="card-title">Название книги</h5>
        <p class="card-text">
        <div>Название жанра </div>
        </p>
        <a href="{{ route('book.show', 2) }}" class="btn btn-primary target">Show</a>
    </div>
</div>
@endsection
