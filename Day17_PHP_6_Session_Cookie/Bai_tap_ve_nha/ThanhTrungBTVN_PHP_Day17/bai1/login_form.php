<?php
session_start();
$error = "";

if(isset($_SESSION['username'])){
    $_SESSION['success'] = "Bạn đã đăng nhập rồi, không thể vào form login";
    header("Location: login_success.php");
    exit();
}

if(isset($_POST['submit'])){
    $name = $_POST['username'];
    $password = $_POST['password'];

    if(empty($name)){
        $error = "Username là bắt buộc";
    } else if(empty($password)){
        $error = "Password là bắt buộc";
    } else if($name != "nvmanh" || $password != "123456") {
        $error = "Sai username hoặc password";
    } else {
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
    <input type="submit" name="submit" value="Submit"/>
</form>
