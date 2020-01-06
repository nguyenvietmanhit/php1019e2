//gọi sự kiện onclick trên thẻ a sử dụng jquery
// onload trong javascript tương đương với document.ready trong jquery
$(document).ready(function() {
    $('#show-ajax').click(function() {
       //gọi ajax đến server để yêu cầu lấy danh sách student
        //khai báo 1 object chứa thông tin về ajax
        var obj_ajax = {
          url: 'get_list.php', //url xử lý ajax gọi lên
          method: 'POST', //GET
          data: {
              name: 'Manh' //demo 1 tham số gửi lên
          },
          success: function(result) {
              //xử lý hiển thị biến result tại vì mong muốn
              // console.log(result);
              // biến result là biến lưu dữ liệu trả về từ server
              $('#result-ajax').html(result);
          }
        };

        //gọi ajax
        $.ajax(obj_ajax);
    });
});