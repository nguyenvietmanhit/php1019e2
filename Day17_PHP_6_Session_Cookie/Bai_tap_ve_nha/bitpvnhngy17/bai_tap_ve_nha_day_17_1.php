<?php
session_start();
if (isset($_SESSION['name'])) {
    $_SESSION['success'] = "Bạn đã đăng nhập rồi";
    header("location: login_success.php");
    exit();
}
$error = '';
$result = '';
if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $password = $_POST['password'];
    if (empty($username) || empty($password)) {
        $error = 'xin hãy nhập trường name và trường password';
    } elseif ($username != "nvmanh" || $password != 123456) {
        $error = 'Xin hãy nhập đúng password';
    } else {
        $_SESSION['username'] = $_POST['name'];
        $_SESSION['success'] = "Đăng nhập thành công";
        header("location: login_success.php");
        exit();
    }
}
?>
<h3 style="color: red">
    <?php echo $error ?>
</h3>
<h3>
    <?php
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    ?>
</h3>
<h3>
    <?php
    if (isset($_SESSION['success'])) {
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
    ?>
</h3>
<form action="" method="post">
    <table>
        <tr>
            <td>UserName:</td>
            <td><input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>"></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password"
                       value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Login"></td>
        </tr>
    </table>
</form>