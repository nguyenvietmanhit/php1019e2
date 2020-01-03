<?php
session_start();
//thực hiện xóa student
//lấy giá trị của id từ url
//check trường hợp ko truyền lên id
if (!isset($_GET['id'])) {
    $_SESSION['error'] = "Tham số id không hợp lệ";
    header("Location: index.php");
    exit();
}
//check thêm trường hợp có tham số id, nhưng id lại ko phải là số
$id = $_GET['id'];
//kết nối tới DB, thực hiện truy vấn xóa
require_once 'config.php';

//tạo truy vấn xóa
$sql_delete = "DELETE FROM students WHERE id = $id";

//thực thi truy vấn
$is_delete = mysqli_query($connection, $sql_delete);
if ($is_delete) {
    $_SESSION['success'] = "Xóa bản ghi $id thành công";
} else {
    $_SESSION['error'] = "Xóa bản ghi $id thất bại";
}
header("Location: index.php");
exit();