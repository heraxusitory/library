@extends('index')

@section('content')
    <h3 class="content_title">Books</h3>
    <div class="d-flex flex-wrap justify-content-start book-list">
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
                                    <button class="btn btn-primary">Drop</button>
                                    <button class="btn btn-primary">Edit</button>
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
