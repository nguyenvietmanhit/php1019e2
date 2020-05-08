<?php
//File database.php, chứa thông tin kết nối CSDL
//sử dụng cơ chế PDO
//khai báo các hằng số chưa thông tin cấu hình cho CSDL
//và tạo 1 biến kết nối theo cơ chế PDO
const DB_DSN = 'mysql:host=localhost;dbname=php_demo;charset=utf8';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';

//khởi tạo biến kết nối $connection
try {
    $connection = new PDO(DB_DSN, DB_USERNAME,
        DB_PASSWORD);
} catch (PDOException $e) {
    die("Kết nối thất bại: " .$e->getMessage());
}

echo '<h3>Kết nối CSDL sử dụng PDO thành công</h3>';