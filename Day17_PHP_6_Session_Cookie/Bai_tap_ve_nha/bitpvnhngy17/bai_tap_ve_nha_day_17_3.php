<?php
session_start();
$error = '';
//if (isset($_SESSION['cookie'])){
//    setcookie('name','admin', time() + -1);
//}

if (isset($_COOKIE['name'])){
    $_SESSION['username4'] = $_COOKIE['name'];
    header("location: login_success_3.php");
    exit();
}
if (isset($_SESSION['username4'])){
    $_SESSION['success'] = 'bạn đã đăng nhập rồi';
    header("location: login_success_3.php");
    exit();
}
if (isset($_POST['submit'])){
    $username = $_POST['name3'];
    $password = $_POST['password'];
    if (empty($username) || empty($password)){
        $error = 'Không được để trống username hoặc password';
    } elseif ($username != 'admin' || $password != 123456){
        $error = 'Nhập sai username và password';
    } else {
        if (isset($_POST['check'])) {
            setcookie('name','admin',time() + 3600);
        }
        $_SESSION['username4'] = $username;
        $_SESSION['success'] = 'đăng nhập thành công';
        header("location: login_success_3.php");
        exit();
    }

}
?>

<h4 style="color: red"><?php echo $error?></h4>
<form action="" method="post">
    <table>
        <tr>
            <td>Username:</td>
        </tr>
        <tr>
            <td><input type="text" name="name3" value="<?php echo isset($_POST['name3']) ? $_POST['name3'] : '';?>"></td>
        </tr>
        <tr>
            <td>Password:</td>
        </tr>
        <tr>
            <td><input type="text" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''?>"></td>
        </tr>
        <tr>
            <?php
            $check = '';
            if (isset($_POST['check'])){
                switch ($_POST['check']){
                    case 0 : $check = 'checked=true';break;
                }
            }
            ?>
            <td><input <?php echo $check?> type="checkbox" name="check" value="0">Remember me</td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" class="submit" value="LOGIN"></td>
        </tr>
    </table>
</form>
<style type="text/css" rel="stylesheet">
    tr td{
        padding: 10px;
        padding-right: 25px;
        padding-left: 25px;
    }
    table{
        margin: auto;
        background: #B6E0FF;
    }
    .submit{
        border: #65C370 solid 1px;
        color: white;
        padding-top: 5px;
        padding-bottom: 5px;
        padding-right: 15px;
        padding-left: 15px;
        background: #65C370;
    }
</style>