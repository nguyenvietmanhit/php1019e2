<!--DEMO THỰC HÀNH 1-->
<!--Xử lý form login-->
<meta name="viewport" content="width=" />
<?php
session_start();

//trường hợp user đã đăng nhập rồi mà cố tình truy cập lại
//form login này, thì phải chuyển hướng họ tới trang đăng nhập
if (isset($_SESSION['username'])) {
    $_SESSION['success'] = "Bạn đã đăng nhập rồi,
     không thể truy cập lại form login";
    header("Location: login_success.php");
    exit();
}

$error = '';
$result = '';
//nếu người dùng có hành động submit form
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        //validate với trường hợp username hoặc password ko đc
//        để trống
        if (empty($username) || empty($password)) {
            $error = "Username hoặc password không được để trống";
        } else if ($username != 'nvmanh' && $password != 123456) {
            $error = "Sai username hoặc password";
        } else {
            //trường hợp này là trường hợp đăng nhập thành công
            //chuyển hướng người dùng sang trang login_success.php
            //kèm theo thông báo Đăng nhập thành công tại màn hình đó
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Đăng nhập thành công";
            //dùng hàm header để chuyển hướng, lưu ý luôn đi kèm với hàm
//            exit để tránh trường hợp ko chuyển hướng được trong 1
//            vài trường hợp
            header("Location: login_success.php");
            exit();
        }
    }
?>
<h3 style="color: red">
    <?php echo $error; ?>

    <?php
    //trường hợp tồn tại session error thì hiển thị ra,
//    và chỉ hiển thị 1 lần duy nhất
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    ?>
</h3>
<h3 style="color: green">
    <?php
    //nếu tồn tại session success thì hiển thị,
    //và chỉ hiển thị 1 lần duy nhất
    if (isset($_SESSION['success'])) {
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
    ?>
</h3>
<form action="" method="post">
    Username:
    <input type="text" name="username" value="" />
    <br />
    Password:
    <input type="password" name="password" value="" />
    <br />
    <input type="submit" value="Login" name="submit" />
</form>