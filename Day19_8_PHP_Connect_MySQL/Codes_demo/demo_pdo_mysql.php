<?php
//data source name
const DB_DSN = 'mysql:host=localhost;dbname=bt1';
//const DB_DSN = 'mysql:dbname=bt1;host=localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
//khooi tao ket noi
try {
  $connection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
}
catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

//INSERT
//gan param, buoc nay se tranh dc sql injection, sử dụng placeholder ko xác định
$queryInsert = $connection->prepare("INSERT INTO employees (`name`, `description`, `gender`) VALUES (?, ?, ?)");
//gan param, buoc nay se tranh dc sql injection, sử dụng placeholder  xác định
//$queryInsert = $connection->prepare("INSERT INTO employees (`name`, `description`, `gender`) VALUES (:name, :description, :gender)");
$queryInsert->bindParam(1, $name);
$queryInsert->bindParam(2, $description);
$queryInsert->bindParam(3, $gender);

//sử dụng tên biến theo tham số kiểu unplaceholder
//$queryInsert->bindParam(":name", $name);
//$queryInsert->bindParam(":description", $description);
//$queryInsert->bindParam(":gender", $gender);

//gan gia tri
$name = "Manh;1";
$description = "Desc Manh;1";
$gender = 2;

//thuc thi
$isInsert = $queryInsert->execute();
var_dump($isInsert);

//UPDATE
//chuan bij ket noi
$queryUpdate = $connection->prepare("UPDATE employees SET `name` = ? WHERE id = ?");
$queryUpdate->bindParam(1, $name);
$queryUpdate->bindParam(2, $id);

//gan gia trij
$name = "new name";
$id = 1;
//thuc thi
$isUpdate = $queryUpdate->execute();
var_dump($isUpdate);


//DELETE
$queryDelete = $connection->prepare("DELETE FROM employees WHERE id = ?");
$queryDelete->bindParam(1, $id);
//gan gia tri
$id = 24;
//thuc thi
$isDelete = $queryDelete->execute();
var_dump($isDelete);

//SELECt
$querySelect = $connection->prepare("SELECT * FROM employees WHERE id > ?");
$querySelect->bindParam(1, $id);
//gan gia tri
$id = 5;
//thuc thi
//gan kieu du lieu tra ve
$querySelect->execute();
$employees = $querySelect->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
print_r($employees);
echo "</pre>";
die;

