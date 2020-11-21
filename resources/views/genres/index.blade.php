@extends('index')

@section('content')
    <h3 class="content_title">Жанры</h3>
    <div class="d-flex flex-wrap justify-content-between">
        <div class="card mt-4" style="width: 21rem;">
            <div class="img_block"></div>
            <div class="card-body">
                <h5 class="card-title">Имя жанра</h5>
                <a href="{{ route('genre.show', 5)}}" class="btn btn-primary target">Show books</a>
            </div>
        </div>
@endsection
