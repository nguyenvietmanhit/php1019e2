<?php
/**
 * Created by PhpStorm.
 * User: Hoc vien
 * Date: 2/24/2020
 * Time: 8:46 PM
 */
class Book {
    const DB_HOST = 'localhost';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';
    const DB_NAME = 'book_oop';
    const DB_PORT = 3306;
    public $id;
    public $name;
    public $amount;
    public $created_at;
    public function connectDB(){
        $connection = mysqli_connect(self::DB_HOST,self::DB_USERNAME,self::DB_PASSWORD,self::DB_NAME,self::DB_PORT);
        if(!$connection){
            die("Connect Fail".mysqli_connect_error());
        }
        return $connection;
    }
    public function disconnectDB($connection){
        mysqli_close($connection);
    }

    /**
     * Liet ke danh sach book dang co trong db
     */
    public function listBook(){
        $connection = $this->connectDB();
        $query_select = "SELECT * FROM book";
        $result = mysqli_query($connection,$query_select);
        if (mysqli_num_rows($result)>0){
            $booklist =  mysqli_fetch_all($result,MYSQLI_ASSOC);
            echo '<pre>';
            print_r($booklist);
            echo '</pre>';

        }
        return $result;
        $this->disconnectDB($connection);
    }
    public function insertBook(){
        $connection = $this->connectDB();
        $query_insert= "INSERT INTO book (`name`,`amount`) VALUES ('{$this->name}',{$this->amount} )";
        $is_insert = mysqli_query($connection,$query_insert);
        $this->disconnectDB($connection);
        return $is_insert;
    }
    public function editBook($id){
        $connection = $this->connectDB();
        $query_update = "UPDATE book SET `name` = '{$this->name}', `amount` = {$this->amount} WHERE id = $id ";
        $is_update = mysqli_query($connection,$query_update);
        $this->disconnectDB($connection);
        return $is_update;
    }
    public function deleteBook($id){
        $connection = $this->connectDB();
        $query_delete = "DELETE FROM book WHERE id = $id";
        $is_delete = mysqli_query($connection,$query_delete);
        $this->disconnectDB($connection);
        return $is_delete;
    }
}
$book = New Book;
?>

