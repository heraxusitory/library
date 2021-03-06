@extends('index')

@section('content')
    <h3 class="content_title">{{ $genreName }}</h3>
    @if(count($books))
        <div class="d-flex flex-wrap justify-content-start">
            @foreach($books as $book)
                <div class="card mt-4" style="width: 21rem;">
                    <div class="img_block"></div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->book_name }}</h5>
                        <p class="card-text">
                            {{ $book->author_name }}
                        </p>
                        <a href="{{ route('book.show', $book->book_id) }}" class="btn btn-primary target">Show</a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-secondary">There is nothing</div>
    @endif
@endsection
