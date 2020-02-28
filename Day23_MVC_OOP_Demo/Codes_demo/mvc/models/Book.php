<?php

class Book
{
    const DB_DSN = 'mysql:host=localhost;dbname=book_mvc;charset=utf8';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';

    public $name;
    public $amount;

    public function connectDatabase() {
        try {
            $connection = new PDO(self::DB_DSN,
                self::DB_USERNAME, self::DB_PASSWORD);
        } catch (PDOException $e) {
            die("Có lỗi: " . $e->getMessage());
        }

        return $connection;
    }
    public function insert() {
        $connection = $this->connectDatabase();
        //cbi truy vấn
        $obj_insert = $connection
        ->prepare("INSERT INTO books(`name`, `amount`)
        VALUES(:name, :amount)");

        //gán giá trị
        $arr_select = [
            ':name' => $this->name,
            ':amount' => $this->amount,
        ];
        //thực thi truy vấn
        return $obj_insert->execute($arr_select);
    }
}