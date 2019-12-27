<?php
//khi muốn sử dụng biến $_SESSION, bắt buộc phải đăng ký sử dụng
//hàm sau
session_start();
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
//khi muốn thao tác với SESSION tại nơi ko trực tiếp khai báo nó
//thì cần sử dụng hàm isset để chắc chắn Session đso đã tồn tại rồi
if (isset($_SESSION['age'])) {
    echo "Age = : " . $_SESSION['age'];
}
