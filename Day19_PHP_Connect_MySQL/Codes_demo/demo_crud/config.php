<?php
//chứa các thông số kết nối tới csdl
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'demo_db';
const DB_PORT = 3306;
$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD,
    DB_NAME, DB_PORT);
if(!$connection) {
    die("Kết nối thất bại, " . mysqli_connect_error());
}
echo "<h1>Kết nối CSDL " . DB_NAME . " thành công </h1>";
//cần set charset để cho phép lưu và hiển thị
// ký tự có dấu 1 cách chính xác
//mysqli_set_charset($connection, 'utf8');
mysqli_query($connection, "set names 'utf8'");