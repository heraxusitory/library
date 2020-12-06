@extends('index')

@section('content')
    <div>
        <a href="{{ route('books') }}">Back to main page</a>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="img_block"></div>
        </div>
        <div class="col-sm-9">
            <h5>{{ $book->book_name }}</h5>
            <div>{{ $book->author_name }}</div>
            <div>{{ $book->genre_name }}</div>
        </div>
    </div>
    <div class="desc">
        <h5>Описание</h5>
        {{ $book->book_desc }}
    </div>
    @auth
        <div class="container raitng-form">
            <form method="POST" action="{{ route('send.raiting', [$book->book_id, Auth::user()->id??false]) }}" id="sendRating">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="btn-group">
                                <button class="btn btn-warning set-rating" data-star="1" type="button"
                                        style="box-shadow: none">
                                    <img src="{{ asset('/assets/img/favourite.svg') }}">
                                </button>
                                <button class="btn btn-info set-rating" data-star="2" type="button"
                                        style="box-shadow: none">
                                    <img src="{{ asset('/assets/img/favourite.svg') }}">
                                </button>
                                <button class="btn btn-info set-rating" data-star="3" type="button"
                                        style="box-shadow: none">
                                    <img src="{{ asset('/assets/img/favourite.svg') }}">
                                </button>
                                <button class="btn btn-info set-rating" data-star="4" type="button"
                                        style="box-shadow: none">
                                    <img src="{{ asset('/assets/img/favourite.svg') }}">
                                </button>
                                <button class="btn btn-info set-rating" data-star="5" type="button"
                                        style="box-shadow: none">
                                    <img src="{{ asset('/assets/img/favourite.svg') }}">
                                </button>
                            </div>
                            <input type="hidden" name="rating" value="1">
                            <button class="btn btn-success">Оценить</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endauth
@endsection

@section('comments')
<div class="mb-4">
    @auth
    <form class="comment_form" action="{{ route('comment.post.create', [$book->book_id, Auth::user()->id??false])}}"
          method="POST">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <h5>Добавить комментарий:</h5>
        <textarea class="form-control col-md-6 mb-2" name="text_comment" cols="100" rows="4"></textarea>
        <div>
            <button class="btn btn-primary">Отправить</button>
        </div>
        @else
            <div>
                <button type="button" class="btn btn-info" onclick="location.replace('/login')">
                    Register or login to post comments</button>
            </div>
       @endauth
    </form>
</div>
<div id="comments-block">
    @include("layouts.comments")
</div>
@endsection
