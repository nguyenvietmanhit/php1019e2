<?php
//Thực hiện xóa bản ghi dựa theo id bắt được
require_once 'database.php';
$id = 1;

$obj_delete = $connection
    ->prepare("DELETE FROM books WHERE id=$id");
$is_delete = $obj_delete->execute();
var_dump($is_delete);
