<?php
/**
 * Created by PhpStorm.
 * User: nvmanh
 * Date: 3/11/2020
 * Time: 12:30 PM
 */

require_once 'configs/database.php';
class Model {
  public $connection;

  public function __construct() {
    $this->connection = $this->getConnection();
  }

  public function getConnection() {
    try {
      $connection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    } catch (PDOException $e) {
      die("Kết nối CSDL theo PDO thất bại: " . $e->getMessage());
    }

    return $connection;
  }

  public function closeConnection() {
    $this->connection = null;
  }
}