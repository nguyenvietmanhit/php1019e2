<?php
//chứa các thông tin kết nối tới CSDL
const DB_HOST = "localhost";
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'db_19';
const DB_PORT = 3306;

//gọi hàm kết nối
$connection = mysqli_connect(DB_HOST,
    DB_USERNAME, DB_PASSWORD,
    DB_NAME, DB_PORT);

if (!$connection) {
    die("Lỗi kết nối: " . mysqli_connect_error());
}
//set utf8 khi lưu ký tự có dấu
mysqli_query($connection, "SET NAMES 'utf8'");
echo "<h2>Kết nối thành công</h2>";