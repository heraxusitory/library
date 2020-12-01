<div class="comments">
    <h5 class="title-comments">Комментарии ({{ $count->count }})</h5>
    <ul class="pl-2 pr-2">
        @foreach($comments as $comment)
            <li class="mb-4 comment-list">
                <div class="text-comment">
                    <div class="media-body">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="author"> {{$comment->name}} </div>
                                <div class="metadata">
                                    <span class="date"> {{ $comment->date_comment }} </span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <p class="text-comment"> {!! nl2br(strip_tags($comment->message)) !!} </p>
                            </div>
                        </div>
                        @auth
                            @if(Auth::user()->is_admin)
                                <div class="drop"><button type="button" class="btn btn-danger comment-delete"
                                                          data-url="{{ route('comment.delete', [$comment->page_id, $comment->id]) }}"
                                                          data-comment-id="{{ $comment->id }}"
                                                          data-page-id="{{ $comment->page_id }}">Delete
                                        comment</button></div>
                            @endif
                        @endauth
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
