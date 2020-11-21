@extends('index')

@section('content')
    <h3 class="content_title">Авторы</h3>
    <div class="d-flex flex-wrap justify-content-start">
    <div class="card mt-4" style="width: 21rem;">
        <div class="img_block"></div>
        <div class="card-body">
            <h5 class="card-title">Имя книги</h5>
            <p class="card-text">
            <div>Имя жанра</div>
            </p>
            <a href="{{route('author.show', 2)}}" class="btn btn-primary target">Show</a>
        </div>
    </div>
@endsection
