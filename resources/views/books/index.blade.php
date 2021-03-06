@extends('index')

@section('content')
    <div class=""><h3 class="content_title books">Books</h3></div>
    <div class="row">
        <div class="container">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="margin: 0 auto;">
                <div class="d-flex flex-wrap justify-content-center">
                    <div class="w-100">
                        <form class="search" action="{{ route('search.book') }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="search" id="searchField" name="search_field" class="form-control"
                                       placeholder="Найти">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" id="search_find">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="w-100">
                        <div class="filter-block">
                            <div class="input-group">
                                {{--                    <div class="input-group-prepend">--}}
                                <select name="authors" class="form-control form-control-sm authors">
                                    <option hidden class="authors">Авторы</option>
                                    @foreach($authors as $author)
                                        <option value="{{ $author->name }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                                <select name="genres" class="form-control form-control-sm genres">
                                    <option hidden class="genres">Жанры</option>
                                    @foreach($genres as $genre)
                                        <option value="{{ $genre->name }}">{{ $genre->name }}</option>
                                    @endforeach
                                </select>
                                {{--                    </div>--}}
                                <div class="input-group-append">
                                    <button class="btn btn-secondary btn-sm button-cancel-filter"><img
                                            src="{{ asset('/assets/img/cancel.svg') }}"></button>
                                    <button class="btn btn-info btn-sm button-filter">Filter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-wrap justify-content-start book-list">
        @auth
            @if (Auth::user()->is_admin)
                <div class="card mt-4" style="width: 21rem;">
                    <div class="img_block"></div>
                    <div class="card-body">
                        <h5 class="card-title">Add new book</h5>
                        <div class="btn-rows">
                            <div class="d-flex justify-content-center mb-3">
                                <button class="btn btn-primary update-book" data-target="#modalWindow"
                                        data-toggle="modal"
                                        data-url="{{ route('book.get.create') }}">
                                    <img src="{{ asset('/assets/img/addNewBook.svg') }}">
                                </button>
                            </div>
                        </div>
                        <div class='fatal-error-favourite'></div>
                    </div>
                </div>
            @endif
        @endauth

        @foreach ($books as $book)
            <div class="card book mt-4" data-id="{{ $book->book_id }}" style="width: 21rem;">
                <div class="img_block"></div>
                <div class="card-body">
                    <h5 class="card-title">{{$book->book_name}}</h5>
                    <div class="card-text author-card-text">
                        {{$book->author_name}}
                    </div>
                    <div class="card-text genre-card-text">
                        {{$book->genre_name}}
                    </div>

                    <div class="btn-rows">
                        <div class="d-flex justify-content-between mb-3">
                            <a href="{{route('book.show', $book->book_id)}}" class="btn btn-primary target">Show</a>
                            @auth
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                @infavourite ($book->book_id, Auth::user()->id)
                                <button class="btn btn-primary favourite-delete" data-id="{{$book->book_id}}"
                                        data-url="{{ route('favourites.delete', $book->book_id) }}">
                                    <img src="{{ asset('/assets/img/favourite-fill.svg') }}">
                                </button>
                            @else
                                <button class="btn btn-primary favourite-add" data-id="{{$book->book_id}}"
                                        data-url="{{ route('favourites.add', $book->book_id) }}">
                                    <img src="{{ asset('/assets/img/favourite.svg') }}">
                                </button>
                                @endinfavourite
                            @endauth
                        </div>
                        @auth
                            @if (Auth::user()->is_admin)
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary btn-danger drop-book" data-id="{{$book->book_id}}"
                                            data-url="{{ route('book.drop', $book->book_id) }}">Drop
                                    </button>
                                    <button class="btn btn-primary update-book" data-target="#modalWindow"
                                            data-toggle="modal" data-id="{{$book->book_id}}"
                                            data-url="{{ route('book.get.edit', $book->book_id) }}">Edit
                                    </button>
                                </div>
                            @endif
                        @endauth
                    </div>
                    <div class='fatal-error-favourite'></div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
