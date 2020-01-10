<?php
session_start();

//setcookie('name', 'admin', time() + 3600);
if (isset($_SESSION['username1'])) {
    $_SESSION['success'] = 'Bạn không cần phải quay lại trang đăng nhập nữa bạn đã đăng nhập rồi';
    header("location: login_success_2.php");
    exit();
}
$error = '';
if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $password = $_POST['password'];
    if (empty($username) || empty($password)) {
        $error = 'xin hãy nhập các trường username và password';
    } elseif ($username != "admin" || $password != 123456) {
        $error = 'xin hãy nhập đúng username và password';
    } else {
        if (isset($_POST['check'])) {
            $_SESSION['check'] = '';
        }
        $_SESSION['username1'] = $username;
        $_SESSION['success'] = "Đăng nhập thành công";
        header("location: login_success_2.php");
        exit();
    }
}
?>
<h3><?php echo $error ?></h3>
<h3>
    <?php
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    ?>
</h3>
<form action="" method="post">
    <table>
        <tr>
            <td>Username:</td>
            <td><input type="text" name="name"
                       value="<?php echo isset($_SESSION['username2']) ? $_SESSION['username2'] : ''; ?>"></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password"
                       value="<?php echo isset($_SESSION['password1']) ? $_SESSION['password1'] : '' ?>"></td>
        </tr>
        <tr>
            <?php
            $checkbox = '';
            if (isset($_POST['check'])) {
                $check = $_POST['check'];
                switch ($check) {
                    case 0 : $checkbox = "checked=true";break;
                }
            }
            ?>
            <td><input <?php echo $checkbox ?> type="checkbox" name="check" value="">Remember me</td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="login"></td>
        </tr>
    </table>
</form>