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
