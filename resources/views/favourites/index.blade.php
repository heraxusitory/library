@extends('index')
@section('content')
    <h3 class="content_title">Favourites</h3>
    @if(count($books))
        <div class="d-flex flex-wrap justify-content-start book-list">
            @foreach($books as $book)
                <div class="card mt-4 favourite-drop-idbook" style="width: 21rem;">
                    <div class="img_block"></div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->book_name }}</h5>
                        <div class="card-text">{{ $book->author_name }}</div>
                        <div class='btn_clc'>
                            <a href="{{route('book.show', $book->book_id)}}" class="btn btn-primary">Show</a>
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                <button class="btn btn-primary favourite-delete in-favourite" data-id="{{$book->book_id}}" data-url="{{ route('favourites.delete', $book->book_id) }}">
                                    <img src="{{ asset('/assets/img/trash.svg') }}" >
                                </button>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-secondary">There is nothing</div>
    @endif
@endsection
