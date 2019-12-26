<?php
echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
print_r($_POST);
echo "</pre>";
//die;
$error = '';
$result = '';
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  //do chưa dùng cơ chế CSDL, nên tạm thời sẽ lưu password dưới dạng plain text
  if ($username == 'admin' && $password == '123456') {
    $result = "Đăng nhập thành công";
    $_SESSION['username'] = $username;
    //trong trường hợp user check vào nút Remember me thì sẽ tiến hành lưu cookie
    if (isset($_POST['remember_me'])) {
      //luu session username va password  vao cookie
      setcookie("username", $username, time() + 2600);
      setcookie("password", $password, time() + 2600);
    }
    //ngược lại sẽ remove cookie
    else {
      setcookie("username", null, time() - 1);
      setcookie("password", null, time() - 1);
    }

    //chuyển hướng người dùng về trang đăng nhập thành công
    header("Location: success.php");
  }
  else {
    $error = 'Sai tài khoản hoặc mật khẩu';
  }
}
?>

<form method="post" action="">
  <div style="color: red">
    <?php echo $error?>
  </div>
  Username <input type="text" name="username" value="" />
  <br />
  <br />
  Password <input type="password" name="password" value="" />
  <br />
  <br />
  <input type="checkbox" value="1" name="remember_me" /> Remember me
  <br />
  <br />
  <input type="submit" name="submit" value="Login" />
</form>