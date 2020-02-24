<?php
//Tạo Chức năng CRUD - CRead - Read - Update - Delete
//Sách sử dụng OOP, có kết nối CSDL
//tạo 1 csdl book_oop bằng câu truy vấn SQL
//id: khóa chính tự tăng
//name: tên sách - text, không cho phép null
//amount: số lượng sách trong kho - số nguyên, cho phép null
//created_at: ngày tạo sách, tự động sinh khi có bản ghi được tạo

//1 - Tạo câu truy vấn
//CREATE DATABASE IF NOT EXIS book_oop

class Book {
    //define
    //khai báo các hằng kết nói tới CSDL
    const DB_HOST = 'localhost';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';
    const DB_NAME = 'book_oop';
    const DB_PORT = 3306;
    //các thuộc tính được xác định thông qua các trường của bảng books
    public $id;
    public $name;
    public $amount;
    public $created_at;

    public function connectDatabase() {
        $connection = mysqli_connect(self::DB_HOST,
            self::DB_USERNAME, self::DB_PASSWORD,
            self::DB_NAME, self::DB_PORT);
        if (!$connection) {
            die("KẾt nối thất bại, lỗi: " . mysqli_connect_error());
        }

        return $connection;
    }

    public function insertBook() {
        echo 'Phương thức insertBook';
        //1 - Kết nối tới CSDL
        $connection = $this->connectDatabase();
        //2 - Viết truy vấn và thực thi truy vấn để insert
        $query_insert = "INSERT INTO books(`name`, `amount`) 
                  VALUES('{$this->name}', {$this->amount})";
        $is_insert = mysqli_query($connection, $query_insert);
        //3 - Đóng kết nối
        $this->disconnectDatabase($connection);

        return $is_insert;
    }

    public function disconnectDatabase($connection) {
        mysqli_close($connection);
    }

    /**
     * Liệt kê danh sách book đang có trong DB
     */
    public function listBook() {
        echo 'Phương thức listBook';
    }

    public function editBook($id) {
        echo 'Phương thức editBook';
    }
    public function deleteBook($id) {
        echo 'Phương thức deleteBook';
    }
}

$book = new Book();
//dùng đối tượng book truy cập 2 thuộc tính name và amount
//set giá trị muốn thêm cho 2 thuộc này, rồi mới gọi phương thức
//insertBook
$book->name = 'Sách văn học';
$book->amount = 123;
$is_insert = $book->insertBook(); //Phương thức insertBook
if ($is_insert) {
    echo "Thêm sách thành công";
} else {
    echo 'Thêm sách thất bại';
}