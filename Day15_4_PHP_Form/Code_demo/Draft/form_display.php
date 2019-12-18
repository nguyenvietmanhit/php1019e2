<form action="" method="POST">
    <h2>Please type name</h2>
    <input type="text" name="username"
 value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>">
    <input type="submit" name="submit_form" value="Submit Name" />
</form>
<?php
echo '<pre>';
//ham isset va empty
//isset check biến đã được khai báo hay chưa
//empty check biến đã được khai báo rồi nhưng đang có
//giá trị là rỗng

//kiếm tra user đã click nút submit hay chưa
if (isset($_POST['submit_form'])) {

    //print_r($_GET);
    $username = $_POST['username'];
    //Xử lý validate
    //nếu user để trống thì báo lỗi
    // "KHông được để trống" và yêu cầu nhập lại
    if (empty($username)) {
        echo '<p style="color: red">Không được để trống</p>';
    }
    else {
        echo "Hello <b>" . $_POST['username'] . "</b>";
    }
}
else {
    echo 'Bạn chưa submit form';
}

?>