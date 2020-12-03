@extends('index')

@section('content')
    <h3 class="content_title">Books</h3>
    <div class="row justify-content-center ">
        <form class="w-75" action="{{ route('search.book') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="text"  name="search_field" class="form-control" placeholder="Найти" aria-label="Recipient's username"
                       aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary search-btn" type="button">Search</button>
                </div>
            </div>
        </form>
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
            <div class="card mt-4" style="width: 21rem;">
                <div class="img_block"></div>
                <div class="card-body">
                    <h5 class="card-title">{{$book->book_name}}</h5>
                    <div class="card-text">
                        {{$book->author_name}}
                    </div>
                    <div class="card-text">
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
