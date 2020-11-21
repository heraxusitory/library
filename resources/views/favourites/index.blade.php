@extends('index')
@section('content')
<div class="d-flex flex-wrap justify-content-start">
    <div class="card mt-4 favourite-drop-idbook" style="width: 21rem;">
        <div class="img_block"></div>
        <div class="card-body">
            <h5 class="card-title">Название книги</h5>
            <p class="card-text">
            <div>Имя автора</div>
            </p>
            <div class='btn_clc'>
                <a href="{{route('book.show', 1)}}" class="btn btn-primary">Show</a>
                <form method="POST" action="app/handlers/handler.php" class="form_favourite_remove">
                    <input type="hidden" name="book_id" value="idBook">
                    <input type="hidden" name="action" value="remove">
                    <input type="hidden" name="dropFavourite" value='true'>
                    <button class="btn btn-primary remove-favourite">Delete from favourites</button>
                </form>
            </div>

        </div>
    </div>
@endsection
