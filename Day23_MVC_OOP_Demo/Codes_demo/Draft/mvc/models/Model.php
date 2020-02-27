<?php
require_once 'configs/database.php';
class Model {
  public function openConnect() {
    $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
    if (!$connection) {
      die("Có lỗi xảy ra, không thể kết nối tới CSDL. Lỗi: " . mysqli_connect_error());
    }

    return $connection;
  }

  public function closeConnect($connection) {
    mysqli_close($connection);
  }
}