<?php

class Books
{
    const DB_HOST = 'localhost';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';
    const DB_NAME = 'btvn';
    const DB_PORT = 3306;

    public $name;
    public $author;
    public $type;
    public $amount;

    public function connectDataBase()
    {
        $connection = mysqli_connect(self::DB_HOST, self::DB_USERNAME, self::DB_PASSWORD, self::DB_NAME, self::DB_PORT);

        if (!$connection) {
            die("Kết nối thất bại, lỗi" . mysqli_connect_error());
        }

        return $connection;
    }

    public function disconnectDataBase($connection)
    {
        mysqli_close($connection);
    }

    public function insertBook()
    {
        echo "Phương thức insertbook";
        echo "<br>";
        $connection = $this->connectDataBase();
        $query_insert = "INSERT INTO Books (`name`,`type`,`author`,`amount`) VALUES('{$this->name}','{$this->type}','{$this->author}','{$this->amount}');";
        $is_insert = mysqli_query($connection, $query_insert);
        $this->disconnectDataBase($connection);

        return $is_insert;
    }
}

if (isset($_POST['submit'])) {
    $error = '';
    $result = '';
    $name = $_POST['book_name'];
    $book_type = '';
    switch ($_POST['book_type']) {
        case 0:
            $book_type = 'Xin hãy nhập tên';
        case 1:
            $book_type = 'Education';
        case 2:
            $book_type = 'science';
        case 3:
            $book_type = 'literary';
        case 4:
            $book_type = 'sci_fi';
    }
    if ($book_type == 'Xin hãy nhập tên') {
        $error = "Xin hãy nhập tên";
    }
    $author = $_POST['author'];
    $amount = $_POST['amount'];
    if ($name == '') {
        $error = 'Xin hãy nhập vào trường name';
    } elseif ($author == '') {

    } elseif (!is_numeric($amount)) {
        $error = "xin hãy nhập vào số";
    } elseif ($amount == '') {
        $error = "xin hãy nhập vào trường amount";
    } elseif ($author == '') {
        $error = 'Xin hãy nhập vào trường author';
    } else {
        $book = new Books();
        $book->name = $name;
        $book->type = $book_type;
        $book->author = $author;
        $book->amount = $amount;
        $is_insert = $book->insertBook();
        if ($is_insert) {
            echo "thêm sách thành công";
        } else {
            echo "thêm sách thất bại";
        }
        header("location: index3.php");
        die();
    }
}
?>
<div class="error"><?php if (isset($error)){
    echo $error;
    }  ?></div>
<form method="post" action="">
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <td>
                <span style="color: red">Tên sách</span>
            </td>
            <td>
                <input type="text" name="book_name" value="<?php echo isset($_POST['book_name']) ? $_POST['book_name'] : ''?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <span style="color: red">Loại sách</span>
            </td>
            <td>
                <select name="book_type">
                    <option value="0">--Select Type--</option>
                    <option value="1">Education</option>
                    <option value="2">science</option>
                    <option value="3">literary</option>
                    <option value="4">sci_fi</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <span style="color: red">author</span>
            </td>
            <td>
                <input type="text" name="author" value="<?php echo isset($_POST['author']) ? $_POST['author'] : ''?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <span style="color: red">amount</span>
            </td>
            <td>
                <input type="text" name="amount" value="<?php echo isset($_POST['amount']) ? $_POST['amount'] : ''?>?"/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input class="submit" type="submit" name="submit" value="submit"/>
            </td>
        </tr>
    </table>
</form>
<style rel="stylesheet" type="text/css">
    table {
        margin: auto;
    }
    .show{
        background-color: red;
        border: none;
        padding: 5px;
    }
    .submit {
        border: none;
        padding: 5px;
        background-color: blue;
    }
    .error {
        color: red;
    }
</style>