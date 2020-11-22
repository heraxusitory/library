@extends('index')

@section('content')
    <h3 class="content_title">Авторы</h3>
    <div class="d-flex flex-wrap justify-content-start">
        @foreach($authors as $author)
            <div class="card mt-4" style="width: 21rem;">
                <div class="img_block"></div>
                <div class="card-body">
                    <h5 class="card-title">{{ $author->author_name }}</h5>
                    <a href="{{route('author.show', $author->author_id)}}" class="btn btn-primary target">Show: <span>{{ $author->books_count }}</span></a>
                </div>
            </div>
    @endforeach
    </div>
@endsection
