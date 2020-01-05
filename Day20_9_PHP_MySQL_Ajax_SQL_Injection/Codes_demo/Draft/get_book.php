<form action="" method="GET">
    Nhập tên: <input type="text" name="name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : '' ?>"/>
    <input type="submit" name="submit" value="Tìm kiếm"/>
</form>
<?php
$connection = mysqli_connect('localhost', 'root', '');
if (!$connection) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
$isConnectDb = mysqli_select_db($connection, 'demo_database');
if (!$isConnectDb) {
    die("Không thể kết nối db");
}
$students = [];
if (isset($_GET['submit'])) {
    $name = $_GET['name'];
    $name = mysqli_real_escape_string($connection, $name);
    $sqlSearch = "SELECT * FROM students WHERE `name` = '%$name%' ";
    echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
    print_r($sqlSearch);
    echo "</pre>";
//    die;
    $results = mysqli_query($connection, $sqlSearch);
    if (mysqli_num_rows($results) > 0) {
        $students = mysqli_fetch_all($results, MYSQLI_ASSOC);
    }
}
//echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
//print_r($_GET);
//echo "</pre>";
////die;
//echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
//print_r($students);
//echo "</pre>";
////die;
?>
<table cellspacing="0" cellpadding="10" border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (!empty($students)):
      foreach ($students as $row):
            ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['name'] ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="4">Không tìm thấy dữ liệu</td>
        </tr>
    <?php endif ?>
    </tbody>
</table>