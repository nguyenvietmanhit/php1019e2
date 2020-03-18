<?php
session_start();

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'nhanvien';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

$controller = ucfirst($controller);
$controller .= "Controller";

$path_controller = "controllers/$controller.php";

if (file_exists($path_controller) == false) {
    die("Trang ban tim khong ton tai");
}

require_once "$path_controller";

$obj = new $controller;

if (method_exists($obj, $action) == false) {
    die("Khong ton tai phuong thuc $action cua $controller");
}

$obj->$action();


?>