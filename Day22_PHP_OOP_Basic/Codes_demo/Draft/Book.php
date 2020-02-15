<?php

/**
 * Demo quản lý sách sử dụng OOP đơn giản
 * Class Book
 */
class Book {
//  khai baos các thuộc tính mà bạn tự xác định
  //hằng số kết nối SDL
  const DB_USERNAME = 'root';
  const DB_PASSWORD = '';
  const DB_HOST = 'localhost';
  const DB_NAME = 'db_books';
  const DB_PORT = 3306;

  //tên sách
  public $name;
  //số trang sách
  public $amount;
  //ngày xuất bản
  public $created_at;
  //biến kết nối cơ csdl
  public $connection;

  public function __construct()
  {
    $this->connection = $this->connectDatabase();
  }

  public function connectDatabase() {
    $connection = mysqli_connect(Book::DB_HOST, Book::DB_USERNAME, Book::DB_PASSWORD, Book::DB_NAME, Book::DB_PORT);
    if (!$connection) {
      die("Connection unsuccessfull, error: " . mysqli_connect_error());
    }

    return $connection;
  }

  public function closeConnection($connection) {
    mysqli_close($connection);
  }

  public function insert($book = []) {
    $queryInsert = "INSERT INTO books (`name`, `amount`) VALUES ('{$book['name']}', {$book['amount']})";
    $isInsert = mysqli_query($this->connection, $queryInsert);
//    close connect
    $this->closeConnection($this->connection);

    return $isInsert;
  }
}

//khởi tạo đối tượng book
$book = new Book();
//thử insert 1 vài data
$bookArr1 = [
  'name' => 'Book 1',
  'amount' => 4
];
//gọi phương thức insert
$isInsert = $book->insert($bookArr1);
if ($isInsert) {
  echo "Insert thanh cong";
}
else {
  echo "Insert that bai";
}