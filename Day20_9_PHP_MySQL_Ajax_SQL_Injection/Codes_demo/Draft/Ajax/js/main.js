$(document).ready(function () {
   $('#show-ajax').click(function (e) {

       $.ajax({
           url: 'get_book.php', // gửi ajax đến file get_book.php
           method: 'post', // chọn phương thức gửi là post
           data: { //Danh sách các thuộc tính sẽ gửi đi
               attr: $(this).attr('id')
           },
           success: function (result) {
               // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
               // đó vào thẻ div có id = result
               $('#result').html(result);
           }
       })
       e.preventDefault();
   }) ;
});