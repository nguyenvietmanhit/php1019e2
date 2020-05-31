<?php
session_start();
require_once 'database.php';
$error = '';
$result = '';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $obj_select = $connection->prepare("SELECT * FROM user WHERE username=:username AND password=:password");
    $arr_select = [
        ':username' => $username,
        ':password' => $password,
    ];
    $obj_select->execute($arr_select);
    $user = $obj_select->fetch(PDO::FETCH_ASSOC);
    if (!empty($user)) {
        $_SESSION['success'] = 'Đăng nhập thành công';
        $_SESSION['accountID’'] = $user['id'];
        header('Location: profile.php');
        exit();
    }

}
?>

<h3 style="color: green">
    <?php
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
    }

    ?>
</h3>

<form action="" method="post" enctype="multipart/form-data">

    <a>home</a>
    <a>Requeriment</a>
    <a>About Us</a>
    <table>
        <tr>
            <th colspan="2">Member Login</th>
        </tr>
        <tr>
            <td>User name</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <th colspan="2"><input type="submit" name="submit" value="Login" ></th>
        </tr>
    </table>

</form>