<?php
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");

//mục đích của file index.php gốc của ứng dụng
//cần phải xử lý url trên trình duyệt để nhúng được class
//controller tương ứng, sau đó khởi tạo đối tượng từ class
//vừa nhúng, và gọi action tương ứng

//theo mô hình mvc, url của bạn đang có dạng là:
//index.php?controller=book&action=list
//lấy ra tham số controller và action từ trình duyệt
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

//giả sử url đang là:
//index.php?controller=book&action=create
//$controller=book
//$action=create

//Nhúng được file BookController.php vào
$controller = ucfirst($controller); //Book
$controller .= "Controller"; //BookController
//đường dẫn của file BookController.php đang nằm tại vị trí:
//controllers/BookController.php
$path_controller = "controllers/$controller.php";
//controller/BookController.php

//kiểm tra nếu đường dẫn ko tồn tại, thì báo trang ko tồn tại
if (file_exists($path_controller) == false) {
  die('Trang bạn tìm không tồn tại');
}

require_once "$path_controller";

//khởi tạo đối tượng sau khi nhúng file
$object = new $controller(); //$object = new BookController()

if (method_exists($object, $action) == false) {
  die("Không tồn tại phương thức $action của class $controller");
}
//index.php?controller=book&action=create
$object->$action();
?>