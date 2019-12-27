<?php
//demo cookie
/**
 * Created by PhpStorm.
 * User: nvmanh
 * Date: 12/27/2019
 * Time: 8:06 PM
 */
//PHP tạo ra sẵn 1 biến mảng $_COOKIE
//khởi tạo cookie
//sau đó sử dụng công cụ inspect HTML, vào tabo Application để
//xem cookie đang đưuọc lưu trên trình duyệt
setcookie('username', 'nvmanh', time() + 3600);


//xóa cookie bằng việc set lại cookie đó, nhưng thời gian sống là số âm
setcookie('username', '', time() - 1);

//lấy giá trị của cookie\
//lưu ý vẫn phải dùng hàm isset để kiểm tra cookie đó đã tồn tại rồi
if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
    echo $username;//nvmanh
}
