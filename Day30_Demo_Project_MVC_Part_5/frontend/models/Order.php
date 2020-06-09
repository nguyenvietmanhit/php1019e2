<?php
//models/Order.php
require_once 'models/Model.php';
class Order extends Model {
  public $fullname;
  public $address;
  public $mobile;
  public $email;

  public function insert() {
    //tạo truy vấn
    //tạo đối tượng insert
    //thực thi truy vấn
    //hàm này phải trả về id vừa insert
    return $this->connection->lastInsertId();
  }
}