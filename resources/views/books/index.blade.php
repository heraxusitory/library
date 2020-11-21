@extends('index')

@section('content')
    <h3 class="content_title">Books</h3>
    <div class="d-flex flex-wrap justify-content-start">
        <div class="card mt-4" style="width: 21rem;">
            <div class="img_block"></div>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">
                <div></div>
                </p>
                <div class="btn_clc d-flex flex-wrap">
                    <a href="{{route('book.show', 2)}}" class="btn btn-primary target">Show</a>
                    <form method="POST" action="app/handlers/handler.php" class="">
                        <input type="hidden" name="book_id" value="">
                        <input type="hidden" name="action" value="">
                        <button class="btn btn-primary">Add/Del to/from favourites</button>
                    </form>

                    <form method="POST" action="app/handlers/removeHandler.php">
                        <input type="hidden" name="book_id" value="">
                        <button class="btn btn-primary">Drop</button>
                    </form>

                    <form method="POST" action="app/handlers/editHandler.php">
                        <input type="hidden" name="book_id" value="">
                        <button class="btn btn-primary">Edit</button>
                    </form>

                </div>
                <div class='fatal-error-favourite'></div>
            </div>
        </div>
    </div>
@endsection
