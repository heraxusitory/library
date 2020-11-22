$(document).ready(function () {

    $('.book-list').on('click', '.favourite-add', addFavourite);
    $('.book-list').on('click', '.favourite-delete', deleteFavourite);


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
