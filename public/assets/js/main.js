$(document).ready(function () {
    $().on('click', function () {
        //gперемеенные
        $.ajax({
            success: function () {

            },
            error: function (error) {
                console.log(error);
            }
        )
    });
});
