<div class="container show-raiting">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <div>
                    <h5>Общий рейтинг книги: {{ $middleSum }}</h5>
                </div>
                <button class="btn btn-warning set-rating" data-star="5" type="button"
                        style="box-shadow: none">
                    <img src="{{ asset('/assets/img/favourite.svg') }}">
                </button>
                <button class="btn btn-success change-raiting" data-url="{{ route('change.raiting', [$bookId, $middleSum, Auth::user()->id]) }}">Изменить</button>
            </div>
        </div>
    </div>
</div>
