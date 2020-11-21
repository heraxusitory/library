@extends('index')

@section('content')
    <h3 class="content_title">Авторы</h3>
    <div class="d-flex flex-wrap justify-content-start">
        @foreach($authors as $author)
            <div class="card mt-4" style="width: 21rem;">
                <div class="img_block"></div>
                <div class="card-body">
                    <h5 class="card-title">{{ $author->name }}</h5>
                    <a href="{{route('author.show', $author->id)}}" class="btn btn-primary target">Show</a>
                </div>
            </div>
    @endforeach
    </div>
@endsection
