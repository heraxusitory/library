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
        <h5>Имя книги</h5>
        <div>Имя автора</div>
        <div>Имя жанра</div>
    </div>
</div>
<p>
    Описание книги
</p>
@endsection
