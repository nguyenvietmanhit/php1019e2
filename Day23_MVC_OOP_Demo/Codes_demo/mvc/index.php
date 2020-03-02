<?php
//CREATE DATABASE book_mvc;
//USE book_mvc;
//CREATE TABLE books(
//    id INT(11) PRIMARY KEY AUTO_INCREMENT,
//    name VARCHAR(255),
//    avatar VARCHAR(255),
//    amount INT(11),
//    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
//);
//Mọi url trong mô hình mvc đều xuất phát từ file
//index.php gốc của ứng dụng
//Mọi url trong mô hình MVC sẽ đều có dạng do bạn tự quy định
//, phải có 1 tham số tên là controler và 1 tham số tên là action
///index.php?controller=book&action=create
/// mục đích của file index.php gốc sẽ phân tích url
/// lấy ra giá trị của controller và action
/// nhúng file controller, khởi tạo đối tượng từ controller đó
/// và gọi phương thức mà lấy được từ tham số action
//echo "File index gốc của ứng dụng";

//index.php?controller=book&action=create
//lấy ra tham số controller từ trình duyệt
$controller =
    isset($_GET['controller']) ? $_GET['controller'] : 'book';
print_r($controller);
//lấy ra tham số action của trình duyệt
$action = isset($_GET['action']) ? $_GET['action'] : 'create';
print_r($action);

//Controller mục tiêu đang có tên là BookController.php
//nên cần chuyển đổi giá trị controller lấy được từ trình duyệt
//thành đúng định dạng file này
$controller = ucfirst($controller); //Book

$controller .= "Controller"; //BookController

//tạo biến chứa đường dẫn tới file controller
//
$path_controller = "controllers/" . $controller . ".php" ;
//controllers/BookController.php

//kiểm tra nếu file controller ko tồn tại, nghĩa là người dùng
//đã gọi sai tên controller
if (!file_exists($path_controller)) {
    die("Trang bạn tìm không tồn tại");
}
//qua được bước die ở trên thì chắc chắc file đã tồn tại
//nhúng file đó vào
require_once "$path_controller"; //controllers/BookController.php

//sau khi nhúng thành công file,
// thì khởi tạo đối tượng từ class tương ứng
$object = new $controller();  //new BookController()

//kiểm tra xem phương thức có tồn tại hay không
if (!method_exists($object, $action)) {
   die("Không tồn tại phương thức $action trong controller $controller");
}

//dùng đối tượng truy cập phương thức đã bắt được từ tham số action
$object->$action();


//index.php?controller=book&action=create