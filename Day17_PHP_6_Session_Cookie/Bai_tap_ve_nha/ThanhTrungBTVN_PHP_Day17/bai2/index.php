<?php
session_start();
$error = "";

if(isset($_COOKIE['remember'])){
  $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['success'] = "Bạn đã đăng nhập rồi, không thể vào form login";
    header("Location: login_success.php");
    exit();
}

if(isset($_POST['submit'])){
    $name = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? $_POST['remember'] : null;

    if(empty($name)){
        $error = "Username là bắt buộc";
    } else if(empty($password)){
        $error = "Password là bắt buộc";
    } else if($name != "admin" || $password != "123456") {
        $error = "Sai username hoặc password";
    } else {
        setcookie('remember', $remember, time() + 999999); //muốn set t.gian tồn tại vĩnh viễn thì làm ntn ạ?
        setcookie('username', $name, time() + 999999);
        setcookie('password', md5($password), time() + 999999);
        $remember = $_COOKIE['remember'];
        $_SESSION['username'] = $name;
        $_SESSION['success'] = "Đăng nhập thành công";
        header("Location: login_success.php");
        exit();
    }
}
?>

<meta charset="utf-8"/>
<h2 style="color: red">
    <?php
    echo $error;

    if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    ?>
</h2>
<h2 style="color: green">
    <?php
    if(isset($_SESSION['success'])){
    echo $_SESSION['success'];
    unset($_SESSION['success']);
    }
    ?>
</h2>
<form method="post" action="">
    Username: <input type="text" name="username" value=""/>
    <br/>
    Password: <input type="password" name="password" value=""/>
    <br/>
    <input type="checkbox" name="remember" value="1"/> Nhớ mật khẩu
    <br/>
    <input type="submit" name="submit" value="Submit"/>
</form>
