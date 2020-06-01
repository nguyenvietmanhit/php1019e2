<?php
require_once 'configs/database.php';
//models/Model.php
//đóng vai trò là model cha
class Model {
    //thuộc tính kết nối CSDL
//    public $connection;
//    //hàm khởi tạo là hàm chạy đầu tiên khi khởi tạo đối tượng
//    public function __construct() {
//        $this->connection = $this->getConnection();
//    }

    public function getConnection() {
        try {
            $connection = new PDO(DB_DSN,
                DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            die("Kết nối thất bại, lỗi: " . $e->getMessage());
        }
        return $connection;
    }
}