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

    <form class="comment_form" action="{{ route('comment.post.create', [$book->book_id, Auth::user()->id])}}"
    method="POST">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <h5>Добавить комментарий:</h5>
        <textarea name="text_comment" cols="100" rows="4"></textarea>
        <div>
            <button>Отправить</button>
        </div>
    </form>

    <div class="comments">
        <h5 class="title-comments">Комментарии (6)</h5>
        <ul class="media-list">
            @for($i=0;$i<10;$i++)
            <li class="media mb-4">
                <div class="media">
                    <div class="media-body">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="author">Пётр</div>
                                <div class="metadata">
                                    <span class="date">19 ноября 2015, 10:28</span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="media-text text-justify">Dolor sit, amet, consectetur, adipisci velit.
                                    Aperiam
                                    eaque ipsa, quae. Amet, consectetur, adipisci velit, sed quia consequuntur magni
                                    dolores. Ab illo inventore veritatis et quasi architecto. Quisquam est, omnis
                                    voluptas
                                    nulla. Obcaecati cupiditate non numquam eius modi tempora. Corporis suscipit
                                    laboriosam,
                                    nisi ut labore et aut reiciendis.
                                </div>
                                <div class="pull-right"><a class="btn btn-danger" href="#">Delete comment</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endfor
        </ul>
    </div>
@endsection
