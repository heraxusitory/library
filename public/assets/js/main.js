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

    $('.comment_form').on('submit', addCommentForm);
    $('.comment-delete').on('click', drop);
    function addCommentForm(event) {
        event.preventDefault();
        let form = $(this);
        let commentsContent = $('.comments');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: 'POST',
            data: form.serialize(),
            url: form.attr('action'),
                dataType:'json',
                success: (data) => {
                    console.log(data);
                    $('.comment_form').find("textarea").val('');
                    commentsContent.html(data.html);
                    if (data.status === 'error') {
                        $('.comment_form').find("textarea").addClass('is-invalid');
                    } else {
                        $('.comment_form').find("textarea").removeClass('is-invalid');
                        $('.comments').find(".date").val('привет');
                        $('.comment-delete').on('click', drop);
                    }
                    let date = new Date();
                    let optionsDate = {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric',
                        timezone: 'UTC',
                        // hour: 'numeric',
                        // minute: 'numeric',
                    };
                    console.log( date.toLocaleDateString("ru", optionsDate) );
                    console.log(date.toLocaleTimeString("ru"));
                    // alert( date.toLocaleString("en-US", options) );
                },
                error: (error) => {
                    console.log(error);
                }
        });
        return false;
    }

    // function updateBook() {
    // }
    function submitForm(event) {
        $('#modalContent').find('.form').submit();
    }

    function drop() {
        if (!confirm('Are you sure?')) {
            return;
        }
        let button = $(this);
        let commentsContent = $('.comments');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: 'DELETE',
            url: button.attr('data-url'),
            data: {
                page_id:button.attr('data-page-id'),
                comment_id: button.attr('data-comment-id'),
                id: button.attr('data-id'),
                _token: $('#token').val()
            },
            dataType: 'json',
            success: function (data) {
                if (data.result) {
                    if (button.hasClass('drop-book') || button.hasClass('drop-author') || button.hasClass('drop-genre')) {
                        if (confirm('Are you sure?')){
                            button.parents('.card').remove();
                        }
                    }
                }
                if (data.result_comment) {
                    commentsContent.html(data.html);
                        $('.comment-delete').on('click', drop);
                }
                console.log(data);
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
