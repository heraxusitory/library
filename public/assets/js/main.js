$(document).ready(function () {

    // $("#modalWindow").modal('show');
    $('.book-list').on('click', '.favourite-add', addFavourite);
    $('.book-list').on('click', '.favourite-delete', deleteFavourite);
    $('.book-list').on('click', '.drop-book', drop);
    $('.author-list').on('click', '.drop-author', drop);
    $('.genre-list').on('click', '.drop-genre', drop);
    // $('.book-list').on('click', '.update-book', updateBook);
    $('.book-list').on('click', '.update-book', helpers.loadFormUpdateInModal);
    $('.author-list').on('click', '.update-author', helpers.loadFormUpdateInModal);
    $('.genre-list').on('click', '.update-genre', helpers.loadFormUpdateInModal);
    $('#modalContent').on('submit', '.form-update', helpers.sendPUT);
    $('#modalContent').on('submit', '.form-create', helpers.sendPUT);
    $('.submit-modal').on('click', submitForm);

    // function updateBook() {
    // }
    function submitForm(event) {
        $('#modalContent').find('.form').submit();
    }

    function drop() {
        let button = $(this);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: 'DELETE',
            url: button.attr('data-url'),
            data: {
                id: button.attr('data-id'),
                _token: $('#token').val()
            },
            dataType: 'json',
            success: function (data) {
                if (data.result) {
                    if (button.hasClass('drop-book') || button.hasClass('drop-author') || button.hasClass('drop-genre')) {
                        if (confirm('Вы уверены?')){
                            button.parents('.card').remove();
                        }
                    }
                    console.log(data);
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
        return false;
    }

    function addFavourite() {
        let button = $(this);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: 'POST',
            url: button.attr('data-url'),
            data: {
                id: button.attr('data-id'),
                _token: $('#token').val()
            },
            dataType: 'json',
            success: function (data) {
                if (data.result) {
                    button.removeClass('favourite-add');
                    button.addClass('favourite-delete');
                    button.children('img').attr('src', data.img_src);
                    button.attr('data-url', data.url);
                }
                console.log(data);
            },
            error: function (error) {
                console.log(error);
            }
        });
        return false;
    }

    function deleteFavourite() {
        let button = $(this);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: 'DELETE',
            url: button.attr('data-url'),
            data: {
                id: button.attr('data-id'),
                _token: $('#token').val()
            },
            dataType: 'json',
            success: function (data) {
                if (data.result) {
                    if (button.hasClass('in-favourite')) {
                        // For page Favourites
                        button.parents('.card').remove();
                    } else {
                        button.removeClass('favourite-delete');
                        button.addClass('favourite-add');
                        button.children('img').attr('src', data.img_src);
                        button.attr('data-url', data.url);
                    }
                }
                console.log(data);
            },
            error: function (error) {
                console.log(error);
            }
        });
        return false;
    }
})
