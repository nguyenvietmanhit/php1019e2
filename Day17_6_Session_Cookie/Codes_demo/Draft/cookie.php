<?php
session_start();
//khởi tạo cookie
//1-1-1970
//danh sách múi giờ
//https://www.php.net/manual/en/timezones.asia.php
date_default_timezone_set('Asia/Ho_Chi_Minh');
echo '<pre>';
print_r(time());
echo '<br />';
//$date = date('d-m-Y H:i:s', time());
$date = date('Y-m-d H:i:s', time());
print_r($date);
//tạo 1 cookie mới có tên là name, giá trị là Mỹ, thời gian
//tồn tại tính từ lúc tạo là 30s
setcookie('name', hash('md5', 'my name'), time() + 3600);
if (isset($_COOKIE['name'])) {
    echo 'Tên của bạn là: ' . $_COOKIE['name'];
}

//xóa cookie
//không thể xóa cookie bằng unset
//unset($_COOKIE['name']);
//để xóa cookie cần set lại thời gian sống của nó, cụ thể là
//quá khứ
//setcookie('name', '', time() - 1);
print_r($_COOKIE);

if (isset($_SESSION['username'])) {
    echo 'User đang login trên hệ thống là' . $_SESSION['username'];
}