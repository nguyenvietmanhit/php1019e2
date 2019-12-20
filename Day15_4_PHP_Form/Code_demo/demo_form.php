<?php
//xử lý lấy dữ liệu từ form
//luôn phải lưu ý, là chỉ khi có hành động submit form
//thì các biến $_POST/$_GET mới có giá trị
//Sử dụng hàm isset() để check xem 1 biến đã từng tồn tại
//trước đó hay chưa
//nếu có hành động submit form thì mới xử lý form
$error = ''; //biến lưu trữ thông tin lỗi
$result = ''; //biến lưu trữ thông tin hợp lệ
if (isset($_POST['submit'])) {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    //lấy ra các thông tin từ form
    $username = $_POST['username'];
    $password = $_POST['password'];
    //xử lý validate form
    //yêu cầu validate:
    //1 - trường username và password bắt buộc phải nhập
//    2 - Password phải có độ dài tối thiếu 3 ký tự trở lên
    if (empty($username) || empty($password)) {
        $error = "Username hoặc password không được để trống";
    } else if (strlen($password) < 3) {
        $error = "Password không được < 3 ký tự";
    }
    //sau khi validate thành công thì xử lý logic theo
//    bài toán đặt ra
    else {
        //nếu username = admin và password =
        // admin thì báo Đăng nhập thành công
//        ngược lại báo Sai mật khẩu hoặc tài khoản
        if ($username == 'admin' && $password == 'admin') {
            $result = 'Đăng nhập thành công';
        } else {
            $error = 'Sai tài khoản hoặc mật khẩu';
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
<form action="" method="post">
    Username:
<!--    khi submit form, cần xử lý để đổ lại dữ liệu cho-->
<!--    các input mà user đã nhập đúng khi xảy ra lỗi validate-->
    <input type="text" name="username"
    value="<?php echo isset($_POST['username']) ?
    $_POST['username'] : '' ?>"/>
    <br/>
    Password:
    <input type="password" name="password"/>
    <br/>
    <input type="submit" value="Login" name="submit"/>
</form>