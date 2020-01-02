<?php
//các bước để kết nối tới CSDL Mysql từ php thông qua extension mysqli
//1 - Khởi tạo kết nối
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'demo_db';
const DB_PORT = 3306;
$connection = mysqli_connect(DB_HOST, DB_USERNAME,
    DB_PASSWORD, DB_NAME, DB_PORT);
if (!$connection) {
    die("Kết nối thất bại, lỗi như sau: " . mysqli_connect_error());
}
echo "Kết nối CSDL có tên là " . DB_NAME . " thành công";
//tạo bảng categories gồm có 2 trường id (khóa chính) và name
//CREATE TABLE categories(
//    id INT(11) NOT NULL AUTO_INCREMENT,
//    name VARCHAR(255) DEFAULT NULL,
//    PRIMARY KEY (id)
//
//)
//thêm 1 vài dữ liệu mẫu
//INSERT INTO categories (name) VALUES ('The thao'),
//('Suc khoe'), ('Tin nhanh')

//CRUD  Create - Read (select) - Update - Delete
//1 - Chức năng Create (Insert)

$sqlInsert = "INSERT INTO categories(name) VALUES ('The gioi')";
//với các truy vấn làm thay đổi dữ liệu như insert, update, delete
//thì hàm mysqli_query sẽ trả về true/false
//còn với trúy vấn mà ko làm thay đổi dữ liệu như select thì hàm
//mysqli_query sẽ trả 1 object
$isInsert = mysqli_query($connection, $sqlInsert);
if ($isInsert) {
    echo 'Insert dữ liệu thành công';
}
else {
    echo 'Insert dữ liệu thất bại';
}
//2 - Select
$querySelect = "SELECT * FROM categories";
$results = mysqli_query($connection, $querySelect);
//check xem có bản ghi nào trả về hay ko
if (mysqli_num_rows($results) > 0) {
    //chuyển đổi biến results thành mảng chứa kết quả cuối cùng
//    với tham số MYSQLI_ASSOC
    $categories = mysqli_fetch_all($results, MYSQLI_ASSOC);
    foreach($categories AS $category) {
        echo "ID: {$category['id']}, ";
        echo "ID: {$category['name']}";
        echo "<br />";
    }
}
else {
    echo "Không có bản ghi nào trong bảng categories";
}

//3 - UPDATE
$sqlUpdate = "UPDATE categories SET name = 'The gioi id 9' WHERE id = 9";
$isUpdate = mysqli_query($connection, $sqlUpdate);
if ($isUpdate) {
    echo 'Update name cho bản ghi có id = 9  thành công';
}
else {
    echo 'Update thất bại';
}

// 4 - Delete
$sqlDelete = "DELETE FROM categories WHERE id = 1";
$isDelete = mysqli_query($connection, $sqlDelete);
if ($isDelete) {
    echo 'Xóa bản ghi với id = 1 thành công';
}
else {
    echo 'Xóa thất bại';
}
//

//sau khi thao tacs thành công cần đóng kết nối lại
mysqli_close($connection);
?>

