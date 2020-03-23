<?php
session_start();

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'employee';

$action = isset($_GET['action']) ? $_GET['action'] : 'create';

$controller = ucfirst($controller);

$controller .= "Controller";

$path_controller = "controllers/" . $controller . ".php";

if (!file_exists($path_controller)){
    die("Trang bạn tìm không tồn tại");
}

require_once "$path_controller";

$object = new $controller();

if (!method_exists($object, $action)){
    die("Không tồn tại phương thức $action trong controller $controller");
}

$object->$action();
?>
