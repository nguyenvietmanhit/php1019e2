<?php
//FILE INDEX - TIẾP NHẬN CÁC REQUEST ĐỂ GỬI TỚI CONTROLLER
//URL của các đường dẫn trên trang luôn phải có dạng ?controller=<tên-controller>&action=<tên-action>
session_start();
//lấy ra controller và action dựa vào param truyền vào theo cơ chế GET
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'Home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
//do tên controller luôn viết hoa chữ cái ở đầu, VD như BookController, nên cần viết hoa ký tự đầu tiên
$controller = ucfirst($controller);
//nối thêm chuỗi Controller vào
$controller .= "Controller";
//kiem tra nếu file controller không tồn tại trong thư mục thì báo lỗi,
//thực tế có thể chuyển hướng user tới trang not found mà ban jtuwj xây dựng
$pathController = "controllers/$controller.php";
if (!file_exists($pathController)) {
  die("Trang bạn tìm không tồn tại");
}
//import file controller
require_once "$pathController";

//khởi tạo đối tượng của controller
$object = new $controller;
if (!method_exists($object, $action)) {
  die("Không tồn tại phương thức $action của class $controller");
}
$object->$action();
