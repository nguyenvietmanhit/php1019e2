$(document).ready(function () {
    $('#show-ajax').click(function () {
        $.ajax({
            url: 'get_book.php',
            method: 'post',
            data: {
                var1: 123
            },
            success: function (result) {
                $('#result-ajax').html(result);
            }
        });
    });
});