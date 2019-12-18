<form action="" method="post">
    Username: <input type="email" name="username"
                     value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" /> <br />
    Password: <input type="password" name="password"
                     value="" /> <br />
    <input type="radio" name="gender" value="1" /> Male
    <input type="radio" name="gender" value="2" /> Female

    <input type="checkbox" name="checkbox[]" value="1" /> Check1
    <input type="checkbox" name="checkbox[]" value="2" /> Check2
    <input type="checkbox" name="checkbox[]" value="3" /> Check3
    <br />
    <select name="select">
        <option value="1">Option 1</option>
        <option value="2">Option 2</option>
        <option value="3">Option 3</option>
    </select>
    <input type="submit" name="ok" value="Login">
    <input type="submit" name="ok1" value="Login1">
    <input type="submit" name="ok2" value="Login2">
    <input type="submit" name="ok3" value="Login3">
    <input type="reset" name="reset" value="Reset form">
</form>

<?php
//$checkboxArr = $_POST['checkbox'];
//foreach ($checkboxArr as $checkbox) {
//    if ($checkbox == 1) {
//        echo 'Check1';
//    }
//    else if ($checkbox == 2) {
//        echo 'Check2';
//    }
//    else {
//        echo 'Check3';
//    }
//}
//$gender = $_POST['gender'];
//if ($gender == 1) {
//    echo 'Male';
//}
//else {
//    echo 'Female';
//}
echo '<pre>';
print_r($_POST);
//nếu user click submit thì mới xử lý
if (isset($_POST['ok'])) {
    echo '<pre>';
    print_r($_POST);
    $username = $_POST['username'];
    $password = $_POST['password'];
    //kiểm tra validate dữ liệu
//    1 - Username, password không được để trống
    if (empty($username) || empty($password)) {
        echo '<p style="color: red">
        Username, password không được để trống</p>';
    }
//    2- Password cần lớn hoặc bằng hơn 6 ký tự
    else if (strlen($password) < 6) {
        echo '<p style="color: red">
        Password cần lớn hoặc bằng hơn 6 ký tự</p>';
    }
//    3 - Nếu username = ‘nguyenvietmanhit@gmail.com’ và
//    password = 123456 thì thông báo Đăng nhập thành công,
//    ngược lại là Sai username hoặc password
    else if($username == 'nguyenvietmanhit@gmail.com' &&
            $password == 123456
    ) {
        echo '<p style="color: blue">
        Đăng nhập thành công</p>';
    }
    else {
        echo '<p style="color: red">
        Sai username hoặc password</p>';
    }

}
?>