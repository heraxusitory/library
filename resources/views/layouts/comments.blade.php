<div class="comments">
    <h5 class="title-comments">Комментарии (6)</h5>
    <ul class="">
        @foreach($comments as $comment)
            <li class="media mb-4">
                <div class="">
                    <div class="media-body">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="author"> {{$comment->name}} </div>
                                <div class="metadata">
                                    <span class="date">19 ноября 2015, 10:28</span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="media-text text-justify"> {{$comment->message}} </div>
                                {{--                                <div class="pull-right"><a class="btn btn-danger" href="{{ route('comment.delete') }}">Delete comment</a></div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
