<?php
session_start();
echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
print_r($_SESSION);
echo "</pre>";
//die;
//nếu đã check vào Ghi nhwos đăng nhập, thì tạo session admin và chuyển hướng về màn hình logic_success.php
if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
  $_SESSION['admin'] = $_COOKIE['username'];
  header("Location: login_success.php");
  exit();
}

$error = '';
$result = '';
if (isset($_POST['submit'])) {
  echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
  print_r($_POST);
  echo "</pre>";
//  die;
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (empty($username) || empty($password)) {
    $error = "Username hoặc password không được để trống";
  } else if ($username != 'nvmanh' && $password != 123456) {
    $error = "Sai username hoặc password";
  } else {
    $_SESSION['admin'] = $username;

    //chỉ xử lý lưu cookie khi user nhập đúng
    if (isset($_POST['remember_me'])) {
      $remember_me = $_POST['remember_me'];
      setcookie('username', $username, time() + 600);
      setcookie('password', $password, time() + 600);
    }

    header("Location: login_success.php");
    exit();
  }
}
?>
<h3 style="color: red">
  <?php echo $error ?>
</h3>
<h3 style="color: green">
  <?php echo $result ?>
</h3>
<form method="post" action="">
    Username:
    <input type="text" name="username" value=""/>
    <br/>
    Password:
    <input type="text" name="password" value=""/>
    <br/>
    <input type="checkbox" name="remember_me"/> Ghi nhớ đăng nhập
    <br/>
    <input type="submit" value="Đăng nhập" name="submit"/>
</form>

