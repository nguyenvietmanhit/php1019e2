<?php
//File index.php gốc của ứng dụng
session_start();
//set múi giờ việt nam
date_default_timezone_set("Asia/Ho_Chi_Minh");
//index.php?controller=category&action=index
//lấy giá trị của tham số controller và action từ url trình duyệt
$controller = isset($_GET['controller']) ?
    $_GET['controller'] : 'category';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
//chuyển ký tự đầu tiên của controller -> ký tự hoa
$controller = ucfirst($controller); //Category
//ghép chuỗi thành dạng CategoryController
$controller .= "Controller"; //CategoryController
//tạo biến chứa đường dẫn controller sẽ nhúng vào
$path_controller = "controllers/$controller.php";
//controllers/CategoryController.php
if (!file_exists($path_controller)) {
    die("Trang bạn tìm không tồn tại");
}
require_once "$path_controller";
//sau khi nhúng file thì đã có thể sử dụng class Controller tương ứng
$object = new $controller();

if (!method_exists($object, $action)) {
    die("Phương thức $action không tồn tại trong class $controller");
}
$object->$action();