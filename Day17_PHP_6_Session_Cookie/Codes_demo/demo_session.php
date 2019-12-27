<?php
session_start(); //hàm này phải khai báo ở đầu file
//bắt buộc phải khởi tạo session thì mới có thể sử dung
//được biến $_SESSION
//SESSION
//PHP tạo ra biến toàn cục có tên là $_SESSION;
//$age = 15;
//echo $age;


//thêm dữ liệu cho session, chính là thao tác
//thêm dữ liệu với mảng
$_SESSION['age'] = 15;
$_SESSION['name'] = 'Manh';
$_SESSION['arr'] = [1, 2, 3];

//Lấy dữ liệu của $_SESSION
$name = $_SESSION['name']; //Manh
$age = $_SESSION['age']; //15
$arr = $_SESSION['arr'] ; //[1, 2, 3]

//Xóa dữ liệu của session
unset($_SESSION['name']); //xóa phần tử có key là name của mảng $_SESSION
//xóa hết toàn bộ session đang có trên hệ thống
//session_destroy();

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

