@extends('index')

@section('content')
    <h3 class="content_title">Books</h3>
    <div class="d-flex flex-wrap justify-content-start">
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

                    <div class="btn_clc d-flex flex-wrap">
                        <div>
                            <a href="{{route('book.show', $book->book_id)}}" class="btn btn-primary target">Show</a>
                            <button class="btn btn-primary" data-url="{{ route('favourites.add', $book->book_id) }}">Add to favourites</button>
                        </div>
                        <div>
                            <button class="btn btn-primary">Drop</button>
                            <button class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                    <div class='fatal-error-favourite'></div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
