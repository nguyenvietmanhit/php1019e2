<?php
session_start();
$error = "";

if(isset($_SESSION['username']) || isset($_COOKIE['remember'])){
    $_SESSION['success'] = "Bạn đã đăng nhập rồi, cần logout tài khoản 
    nếu muốn quay trở lại màn hình login form";
    header("Location: login_success.php");
    exit();
}else{
    //trong trường hợp else e đang xử lý kiểu
    // nếu ko tồn tại session username và ko tồn tại cookie remember thì e sẽ chuyển hướng
//    tới trang login_sucess đúng ko
    setcookie('username','', time()-1);
    setcookie('password','', time()-1);
    header("Location: login_success.php");
    exit();
}

if(isset($_POST['submit'])){
    $name = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? $_POST['remember'] : null;

    if(empty($name) || empty($password)){
        $error = "Không được để trống username hoặc password";
    } else if($name != "admin" || $password != "123456"){
        $error = "Sai username hoặc password";
    } else {
        setcookie('remember', $remember, time() + 999999); //muốn set t.gian tồn tại vĩnh viễn thì làm ntn ạ?
        setcookie('username', $name, time() + 30);
        setcookie('password', $password, time() + 999999);
        $remember = $_COOKIE['remember'];
        $_SESSION['username'] = $name;
        $_SESSION['success'] = "Đăng nhập thành công!";
        header("Location: login_success.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <title>Form Login</title>
    <style>
        html, *{
            margin: 0;
            padding: 0;
            font-size: 18px;
            box-sizing: border-box;
        }
        div.container{
            width: 80%;
            margin: auto;
        }
        div.form-content{
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 320px;
            width: 100%;
            background-color: #26ffdd3b;
            padding: 2.5rem 2.8rem;
            padding-bottom: 1rem;
            border: 1px solid #00b2ff87;
            border-radius: 8px;
        }
        .form-login .form-group{
            margin-bottom: 1rem;
        }
        .form-login .username input, .form-login .password input{
            display: block;
            padding: 6px 10px;
            border: 1px solid #00b2ff87;
            border-radius: 5px;
            font-size: 16px;
        }
        .submit-btn button{
            font-size: 12px;
            color: white;
            padding: 10px 25px;
            margin-bottom: 10px;
            background-color: #00bf00;
            text-transform: uppercase;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="form-content">
        <form method="post" action="" class="form-login">
            <div class="form-group username">
                <label>Username</label>
                <input type="text" name="username" value="" class="form-control"/>
            </div>
            <div class="form-group password">
                <label>Password</label>
                <input type="password" name="password" value="" class="form-control"/>
            </div>
            <div class="form-group">
                <input type="checkbox" name="remember" value="1"/> Remember me
            </div>
            <div class="submit-btn">
                <button type="submit" name="submit" class="btn">Login</button>
            </div>
        </form>
        <h3 style="color: red">
            <?php
            echo $error;

            if(isset($_SESSION['error'])){
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
            ?>
        </h3>
        <h3 style="color: green">
            <?php
            if(isset($_SESSION['success'])){
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            }
            ?>
        </h3>
    </div>
</div>
</body>
</html>

