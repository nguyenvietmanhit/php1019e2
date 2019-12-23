<?php
session_start();
?>
<!--Tạo form đăng nhập cho người dùng,-->
<!--gồm 2 trường username và password,-->
<!--và ô checkbox ghi nhớ đăng nhập-->
<!--Nếu user/password là admin/123456-->
<!--thì báo đăng nhập thành công,-->
<!--ngược lại là đăng nhập thất bại-->
<!--Khi đăng nhập thành công, -->
<!--lưu session cho username, tạo 1 file -->
<!--.php khác và hiển thị tên username vừa đăng nhập-->
<!--Nếu user checkbox vào ô ghi nhớ đăng nhập, -->
<!--thì sẽ tự động đăng nhập-->
<?php
if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    echo 'Đăng nhập thành công';
    header("Location: session.php");
    return;
}
$success = '';
$error = '';
$username = '';
$password = '';
if (isset($_POST['submit'])) {
//    echo '<pre>';
//    print_r($_POST);
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == 'admin' && $password == 123456) {
        $_SESSION['username'] = $username;
        //lưu cookie khi user check vào nút ghi nhớ đăng nhập
        if (isset($_POST['remember'])) {
            setcookie('username', $username, time() + 3600);
            setcookie('password', $password, time() + 3600);
        }
        $success = 'Đăng nhập thành công';

    } else {
        $error = 'Sai username hoặc password';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Bài tập slide</title>
</head>
<body>
<form method="post" action="">
    Username <input type="text" name="username" value="<?php echo $username ?>"/> <br/>
    Password <input type="password" name="password" value="<?php echo $password ?>" <br/>
    <input type="checkbox" name="remember" value="1"> Ghi nhớ đăng nhập <br />
    <input type="submit" value="Login" name="submit"/>
</form>
<p style="color: red"><?php echo $error ?></p>
<p style="color: blue"><?php echo $success ?></p>
</body>
</html>