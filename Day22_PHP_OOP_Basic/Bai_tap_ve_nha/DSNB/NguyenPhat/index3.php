<?php
session_start();
class Listed
{
    const  DB_HOST = 'localhost';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';
    const DB_NAME = 'btvn';
    const DB_PORT = 3306;

//    public $Books;

    public function connectDataBase()
    {
        $connection = mysqli_connect(self::DB_HOST, self::DB_USERNAME, self::DB_PASSWORD, self::DB_NAME, self::DB_PORT);

        if (!$connection) {
            die("kết nối thất bại, lỗi" . mysqli_connect_error());
        }

        return $connection;
    }

    public function listBook()
    {
        $connection = $this->connectDataBase();
        $query_list = "SELECT * FROM Books";
        $is_listed = mysqli_query($connection, $query_list);
        $Books = [];
        if (mysqli_num_rows($is_listed) > 0) {
            $Books = mysqli_fetch_all($is_listed, MYSQLI_ASSOC);
        }

        return $Books;
    }
}

?>
<?php
$test = new Listed();
$is_Books = $test->listBook();
//?>
<div style="color: red"><?php if (isset($_SESSION['success'])){
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }  ?></div>
<div style="color: red"><?php if (isset($_SESSION['error'])){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }  ?></div>
<form method="get" action="">
    <table border="1" cellspacing="0" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>AUTHOR</th>
            <th>TYPE</th>
            <th>AMOUNT</th>
            <th>CREATED_AT</th>
        </tr>
        <?php
        if (empty($is_Books)): ?>
            <tr>
                <td colspan="6">Không có sách nào cả</td>
            </tr>
        <?php else: ?>
            <?php foreach ($is_Books AS $is_Book): ?>
                <tr>
                    <td>
                        <?php echo $is_Book['id']; ?>
                    </td>
                    <td>
                        <?php echo $is_Book['name']; ?>
                    </td>
                    <td>
                        <?php echo $is_Book['author']; ?>
                    </td>
                    <td>
                        <?php echo $is_Book['type']; ?>
                    </td>
                    <td>
                        <?php echo $is_Book['amount']; ?>
                    </td>
                    <td>
                        <?php echo $is_Book['created_at']; ?>
                    </td>
                    <td>
                        <a href="bai_ve_nha_ngay_22.php">add</a>
                        <a href="edit.php?id=<?php echo $is_Book['id'] ?>">edits</a>
                        <a href="delete.php?id=<?php echo $is_Book['id'] ?>">delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
</form>