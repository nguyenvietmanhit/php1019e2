<?php
//File detail.php
require_once 'database.php';
//llấy thông tin chi tiết của bản ghi có id = 2
$id = 2;

$obj_select = $connection
    ->prepare("SELECT * FROM WHERE id=$id");
$obj_select->execute();
$book = $obj_select->fetch(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($book);
echo "</pre>";

