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
    </div>
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
            <button>Отправить</button>
        </div>
        @else
            <div>
                <button class="btn-info" onclick="location.replace('/login')">
                    Register or log in to post comments</button>
            </div>
       @endauth
    </form>
</div>
    @include("layouts.comments")
@endsection
