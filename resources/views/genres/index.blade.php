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
                    <div class="btn-rows">
                        <div class="d-flex justify-content-between mb-3">
                        <div>
                            <a href="{{ route('genre.show', $genre->id)}}" class="btn btn-primary target">Show:
                                <span>{{ $genre->books_count }}</span></a>
                        </div>
                        @auth
                            @if (Auth::user()->is_admin)
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                <div class="btn-group">
                                    <button class="btn btn-danger drop-genre" data-id="{{ $genre->id }}"
                                            data-url="{{ route('genre.drop', $genre->id) }}">Drop
                                    </button>
                                    <button class="btn btn-primary update-genre" data-target="#modalWindow"
                                            data-toggle="modal" data-id="{{$genre->id}}"
                                            data-url="{{ route('genre.get.edit', $genre->id) }}">Edit
                                    </button>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
            </div>
        @endforeach
    </div>
@endsection
