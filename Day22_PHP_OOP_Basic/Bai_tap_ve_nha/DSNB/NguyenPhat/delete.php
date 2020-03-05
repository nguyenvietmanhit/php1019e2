<?php

class Books
{
    const DB_HOST = 'localhost';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';
    const DB_NAME = 'btvn';
    const DB_PORT = 3306;

    public function connectDataBase()
    {
        $connection = mysqli_connect(self::DB_HOST, self::DB_USERNAME, self::DB_PASSWORD, self::DB_NAME, self::DB_PORT);
        if (!$connection) {
            die("không thể kêt nối đc");
        }
        return $connection;
    }

    public function deleteBooks()
    {
        $id = $_GET['id'];
        $connection = $this->connectDataBase();
        $query_delete = "DELETE FROM Books WHERE id = $id";
        $is_delete = mysqli_query($connection, $query_delete);
        if ($is_delete){
            $_SESSION['success'] = "Xóa bản ghi $id thành công";
        } else {
            $_SESSION['error'] = "Xóa bản ghi $id thất bại";
        }
        header("location: index3.php");
//        exit();
    }
}
$delete = new Books();
$delete->deleteBooks();