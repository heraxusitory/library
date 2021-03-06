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
@section('raitings')
    @auth
        <div id="raiting-block">
        @if(empty($appreciated))
        @include('layouts.components.raitings.estimate_raiting')
            @else
            @include('layouts.components.raitings.show_raiting')
        @endif
    </div>
    @endauth

    @guest()
        <div>
            <h5>Общий рейтинг книги: {{ $middleSum }}</h5>
        </div>
    @endguest
@endsection
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
    @include("layouts.components.comments.show_comments")
</div>
@endsection
