<?php
/**
 * Created by PhpStorm.
 * User: nvmanh
 * Date: 2/28/2020
 * Time: 6:41 PM
 */
//CREATE DATABASE student_oop;
//USE student_oop;
//CREATE TABLE students(
//    id INT(11) PRIMARY KEY AUTO_INCREMENT,
//    name VARCHAR(255),
//    age INT(11),
//    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
//);
//Kết nối CSDL sử dụng cơ chế PDO - PHP Data Object
//Bước 1: Khởi tạo kết nối $connection

//DAta source name: khai báo chuỗi kết nối theo cú pháp của PDO
    ``

echo "Kết nối thành công";

//1 - Truy vấn insert
//Chuẩn bị câu truy vấn
$obj_insert = $connection
    ->prepare("INSERT INTO students(`name`, `age`) VALUES (:name, :age)");
//truyền dữ liệu thật cho các param vừa gắn - bind ở câu truy vấn trên
//có bao nhiêu param thì khởi tạo bấy nhiêu giá trị tương ứng
$arr_student = [
    ':name' => 'Mạnh',
    ':age' => 30
];

//Thực thi truy vấn
$is_insert = $obj_insert->execute($arr_student);

if ($is_insert) {
    echo "Insert thành công";
} else {
    echo "Insert thất bại";
}


//2 - Truy vấn update
//Chuẩn bị kết nối
$obj_update = $connection
    ->prepare("UPDATE students SET `name` = :name WHERE id = :id");

//gán dữ liệu cho các param ở câu truy vấn trên
$arr_update = [
    ':name' => 'New name',
    ':id' => 1
];
//thực thi truy vấn
$is_update = $obj_update->execute($arr_update);
if ($is_update) {
    echo "Update bản ghi 1 thành công";
} else {
    echo "Update bản ghi 1 thất bại";
}

//3 - Truy vấn xóa
//chuẩn bị câu truy vấn
$obj_delete = $connection
    ->prepare("DELETE FROM students WHERE id = :id");
//gán giá trị cho param
$arr_delete = [
    ':id' => 1
];
//thực thi truy vấn
$is_delete = $obj_delete->execute($arr_delete);
if ($is_delete) {
    echo "Xóa bản ghi 1 thành công";
} else {
    echo "Xóa bản ghi 1 thất bại";
}

//4 - Truy vấn Select
//Chuẩn bị truy vấn
$obj_select = $connection
    ->prepare("SELECT * FROM students WHERE id > :id");
//gán giá trị cho các định danh trong câu truy vấn
$arr_select = [
    ':id' => 2
];
//thực thi truy vấn
//với truy vấn select thì phương thức execute sẽ trả về 1 đối tượng
//chứ ko phải là kiểu dữ liệu boolean như insert, update, delete
$obj_select->execute($arr_select);
$students = $obj_select->fetchAll(PDO::FETCH_ASSOC);

echo '<pre>';
print_r($students);
echo '</pre>';