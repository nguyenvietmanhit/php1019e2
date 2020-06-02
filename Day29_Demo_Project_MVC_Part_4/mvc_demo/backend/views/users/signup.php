<?php
//Tạo file view theo đường dẫn: views/users/signup.php
//Đây là form đăng ký user
?>
<h1>Form đăng ký user</h1>
<form action="" method="post">
    Username: <input type="text"
                     name="username" class="form-control" />
    <br />
    Password:
    <input type="password"
           name="password" class="form-control" />
    <br />
    Confirm password:
    <input type="password"
           name="confirm_password" class="form-control" />
    <br />
    <input type="submit" name="submit" value="Resgiter"
    class="btn btn-primary"  />
</form>
