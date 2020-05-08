<?php
session_start();
require_once 'database.php';
//Liệt kê danh sách book
//hiển thị các sesison thành công hoặc lỗi nếu có
if (isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}

if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
//thực hiện truy vấn lấy thông tin tất cả dữ liệu book
$obj_select = $connection->prepare("SELECT * FROM books");
$obj_select->execute();
$books = $obj_select->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($books);
echo "</pre>";
//bước hiển thị, dùng vòng lặp foreach để hiển thị các phần tử của
//mảng $books đã tìm đc
