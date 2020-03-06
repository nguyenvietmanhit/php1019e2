<?php
//models/Book.php
class Book {
    const DB_DSN = 'mysql:host=localhost;dbname=book_mvc';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';
    public $name;
    public $avatar;
    public $amount;
    public function getConnection() {
        try {
            $connection = new PDO(self::DB_DSN,
                self::DB_USERNAME, self::DB_PASSWORD);
        } catch (PDOException $e) {
            die("Kết nối thất bại: " . $e->getMessage());
        }
        return $connection;
    }
    public function insert() {
        //chuẩn bị câu truy vấn
        $connection = $this->getConnection();
        $obj_insert = $connection
            ->prepare("INSERT INTO
  books(`name`, `avatar`, `amount`) VALUES (:name, :avatar, :amount)");
        //gán giá trị cho các tham số trong câu truy vấn
        $arr_insert = [
            ':name' => $this->name,
            ':avatar' => $this->avatar,
            ':amount' => $this->amount
        ];
        //thực thi câu truy vấn
        $is_insert = $obj_insert->execute($arr_insert);
        return $is_insert;
    }
}