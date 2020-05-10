<?php
//File update.php dùng để update thông tin của 1 bản
//ghi book trong csdl dựa theo id
require_once 'database.php';
//giả lập id
//trong thực tế sẽ dùng $_GET để bắt từ url trình duyệt
$id = 1;
$title_new = 'Mạnh';
//update bản ghi có id = 1, set trường title = manh
$obj_update = $connection
    ->prepare("UPDATE books SET `title` = :title WHERE id = $id");
//gán giá trị cho placeholder
$arr_update = [
    ':title' => $title_new
];
//thực thi truy vấn
$is_update = $obj_update->execute($arr_update);
var_dump($is_update);