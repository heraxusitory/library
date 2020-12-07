<div class="container estimate-raiting-form">
    <form method="POST" action="{{ route('send.raiting', [($book->book_id) ?? $bookId, Auth::user()->id??false]) }}" id="sendRating">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <div>
                        <h5>Общий рейтинг книги: {{ $middleSum }}</h5>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-warning set-rating" data-star="1" type="button"
                                style="box-shadow: none">
                            <img src="{{ asset('/assets/img/favourite.svg') }}">
                        </button>
                        <button class="btn btn-info set-rating" data-star="2" type="button"
                                style="box-shadow: none">
                            <img src="{{ asset('/assets/img/favourite.svg') }}">
                        </button>
                        <button class="btn btn-info set-rating" data-star="3" type="button"
                                style="box-shadow: none">
                            <img src="{{ asset('/assets/img/favourite.svg') }}">
                        </button>
                        <button class="btn btn-info set-rating" data-star="4" type="button"
                                style="box-shadow: none">
                            <img src="{{ asset('/assets/img/favourite.svg') }}">
                        </button>
                        <button class="btn btn-info set-rating" data-star="5" type="button"
                                style="box-shadow: none">
                            <img src="{{ asset('/assets/img/favourite.svg') }}">
                        </button>
                    </div>
                    <input type="hidden" name="rating" value="1">
                    <button class="btn btn-success">Оценить</button>
                </div>
            </div>
        </div>
    </form>
</div>
