<?php
require_once 'database.php';
$error = '';
$result = '';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $hobby = $_POST['hobby'];
    $hobby = $_POST['hobby'];
    //check unique email and username
    $obj_select = $connection->prepare("SELECT * FROM user WHERE username=:username OR email=:email");
    $arr_select = [
        ':username' => $username,
        ':email' => $email,
    ];
    $obj_select->execute($arr_select);
    $user = $obj_select->fetch(PDO::FETCH_ASSOC);
    if (!empty($user)) {
        $error = 'Username hoặc Email đã tồn tại';
    }

    if (empty($error)) {
        $obj_insert = $connection->prepare("INSERT INTO user(`username`, `PASSWORD`, `Email`, `hobby`) 
VALUES(:username, :PASSWORD, :Email, :hobby)");
        $arr_insert = [
              ':username' => $username,
              ':PASSWORD' => md5($password),
              ':Email' => $email,
              ':hobby' => $hobby,
        ];
        $is_insert = $obj_insert->execute($arr_insert);
        if ($is_insert) {
            $result = 'Đăng ký thành công';
        } else {
            $error = 'Đăng ký thất bại';
        }
    }
}
?>
<h3 style="color: red">
    <?php echo $error; ?>
</h3>
<h3 style="color: green">
    <?php echo $result; ?>
</h3>
<form action="" method="post" enctype="multipart/form-data">

    <a>home</a>
    <a>Requeriment</a>
    <a>About Us</a>
    <table>
        <tr>
            <th colspan="2">Member Register</th>
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
            <td>Email</td>
            <td><input type="Email" name="email"></td>
        </tr>
        <tr>
            <td>Hobby</td>
            <td><input type="password" name="hobby"></td>
        </tr>
        <tr>
            <th colspan="2"><input type="submit" name="submit" value="Register"></th>
        </tr>
    </table>
</form>