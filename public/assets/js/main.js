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

    $('.raitng-form').on('submit', '#sendRating', sendRaiting);

    // $('#show').on('click', showAllComments($('.comment-list')));
    $('.search').on('submit', searchBook);

    prepareComments($('.comment-list'));

    $('#comments-block').on('click', '#show', showAllComments);

    function sendRaiting() {
        form = $(this);

        $.ajax({
            method: "POST",
            url: form.attr('action'),
            data: form.serialize(),
            dataType: 'json',
            success: (data) => {
                console.log(data);
            },
            error: (error) => {
                console.log(error);
            }
        });
        return false;
    }

    $('#searchField').on('input', clearSearchField);
    function clearSearchField(e) {
        let searchField = $(e.currentTarget).val();
        console.log(searchField);
        if (!searchField) {
            let booksCard = $('.card.book');
            booksCard.each(function(index, item) {
                $(item).show();
            });

        }

    }

    $('.set-rating').on('click', function() {
        let currentStar = $(this);
        let maxStars = 5;
        let parentBlock = currentStar.closest('div');

        if (currentStar.attr('data-star') <= maxStars) {
            let formGroup = currentStar.parents('.form-group');
            let allStars = parentBlock.find('.set-rating');
            let inputRating = formGroup.find('input[name="rating"]');
            inputRating.val(currentStar.attr('data-star'));
            allStars.each(function (index, item) {
                if ($(item).attr('data-star') <= currentStar.attr('data-star')) {
                    $(item).removeClass('btn-info');
                    $(item).addClass('btn-warning');
                } else {
                    $(item).removeClass('btn-warning');
                    $(item).addClass('btn-info');
                }
            });
            // console.log(inputRating.val());
        }
    });

    //
    function showAllComments() {
        let commentsBlock = $('#comments-block');

        if (!(commentsBlock.hasClass('show'))) {
            commentsBlock.addClass('show');
        } else {
            commentsBlock.removeClass('show');
        }

        let comments = $('.comment-list');
        comments.each(function (index, item) {
            $(item).show();
            // console.log($('#show').attr('style'));
        });
        $('#show').hide();

    }

    function searchBook(event) {
        event.preventDefault();
        let form = $(this);
        $.ajax({
            method: "POST",
            data: form.serialize(),
            url: form.attr('action'),
            dataType: 'json',
            success: (data) => {
                console.log(data);
                let booksCard = $('.card.book');
                booksCard.each(function(index, item) {
                    let booksId = data.books_id;
                    if (booksId) {
                        $(item).hide()
                        let idBookCard = $(item).attr('data-id');
                        booksId.forEach(function(idBook) {
                            if (idBook == idBookCard) {
                                $(item).show();
                            }
                        })
                    }
                });
                let textSeacrh = $('.form-control').val();
                // console.log(textSeacrh)
                $('.search').find('#search_find').addClass('searched');
                $('.search_cancel').prop('disabled', false);
            },
            error: (error) => {
                console.log(error);

            }
        });
        return false;
    }

    function prepareComments(comments, isShow = false) {
        let isHiddenComments = false;
        let countComments = comments.length;

        if (countComments > 4) {
            if (!isShow) {
                comments.each(function (index, item) {
                    if (index > 3) {
                        isHiddenComments = true;
                        $(item).hide();
                    }

                });
            }
        }
        if (isHiddenComments) {
            let container = $('.comments-container');
            if ($(container.find('.comments-show')[0]).length === 0) {
                $(container[0]).append('<button type="button" id="show" class="comments-show">Show all comments</button>');
            }
        }

    }


    function addCommentForm(event) {
        event.preventDefault();
        let form = $(this);
        let commentsContent = $('.comments-container');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: 'POST',
            data: form.serialize(),
            url: form.attr('action'),
            dataType: 'json',
            success: (data) => {
                $('.comment_form').find("textarea").val('');
                let isShow = false;
                let commentsBlock = $('#comments-block');
                if (commentsBlock.hasClass('show')) {
                    isShow = true;
                }
                console.log($('#show'));
                commentsBlock.html(data.html);
                prepareComments($('.comment-list'), isShow);
                if (data.status === 'error') {
                    $('.comment_form').find("textarea").addClass('is-invalid');
                } else {
                    $('.comment_form').find("textarea").removeClass('is-invalid');
                    $('.comment-delete').on('click', drop);
                }
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
        let commentsContent = $('.comments-container');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: 'DELETE',
            url: button.attr('data-url'),
            data: {
                page_id: button.attr('data-page-id'),
                comment_id: button.attr('data-comment-id'),
                id: button.attr('data-id'),
                _token: $('#token').val()
            },
            dataType: 'json',
            success: function (data) {
                if (data.result) {
                    if (button.hasClass('drop-book') || button.hasClass('drop-author') || button.hasClass('drop-genre')) {
                        button.parents('.card').remove();
                    }
                }
                if (data.result_comment) {
                    let commentsBlock = $('#comments-block');
                    let isShow = false;
                    if (commentsBlock.hasClass('show')) {
                        isShow = true;
                    }
                    commentsBlock.html(data.html);
                    prepareComments($('.comment-list'), isShow);
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
