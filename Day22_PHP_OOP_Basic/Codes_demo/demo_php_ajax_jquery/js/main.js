$(document).ready(function() {
    $('a').click(function() {
        //khai bao bien chua thong tin ve ajax
        var object = {
            url: 'get_employees.php',
            method: 'post',
            data: {
                'name':  'Manh',
                'age':  123
            },
            success: function (result) {
                // result = 'ABCDEF';
                //hien thi ra
                $('#result').html(result);
            }
        }
        //goi ajax
        $.ajax(object);
    });
});