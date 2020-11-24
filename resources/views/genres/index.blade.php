@extends('index')

@section('content')
    <h3 class="content_title">Жанры</h3>
    <div class="d-flex flex-wrap justify-content-start genre-list">
        @auth
            @if (Auth::user()->is_admin)
            <div class="card mt-4" style="width: 21rem;">
                <div class="img_block"></div>
                <div class="card-body">
                    <h5 class="card-title">Add Genre</h5>
                    <button class="btn btn-primary update-genre" data-target="#modalWindow"
                            data-toggle="modal"
                            data-url="{{ route('genre.get.create') }}">
                        <img src="{{ asset('/assets/img/addNew.svg') }}">
                    </button>
                </div>
            </div>
            @endif
        @endauth
        @foreach($genres as $genre)
        <div class="card mt-4" style="width: 21rem;">
            <div class="img_block"></div>
            <div class="card-body">
                <h5 class="card-title">{{$genre->name}}</h5>
                <a href="{{ route('genre.show', $genre->id)}}" class="btn btn-primary target">Show books</a>
            </div>
        </div>
    @endforeach
@endsection
