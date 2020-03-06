<?php
//models/Book.php
class Book {
    const DB_DSN = 'mysql:host=localhost;dbname=book_mvc';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';
    public $name;
    public $avatar;
    public $amount;

    public function getBookById($id) {
        //chuẩn bị câu truy vấn
        $connection = $this->getConnection();
        $obj_select = $connection
            ->prepare("SELECT * FROM books WHERE id = :id");
        //gán dữ liệu thật cho tham số trong câu truy vấn
        $arr_select = [
            ':id' => $id
        ];
        $obj_select->execute($arr_select);
        $books = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        //do biết chắc chắn truy vấn theo id chỉ trả về duy nhất 1
        //phần tử, nên sẽ trả về phần tử của mảng books
        return $books[0];
    }

    public function getAllBook() {
        //chuẩn bị câu truy vấn
        $connection = $this->getConnection();
        $obj_select = $connection->prepare("SELECT * FROM books");
        $obj_select->execute();
        $books = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $books;
    }

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