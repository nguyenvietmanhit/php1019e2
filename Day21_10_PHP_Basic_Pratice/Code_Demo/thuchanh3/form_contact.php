<?php
session_start();
//xử lý submit form
$error = '';
if (isset($_POST['submit'])) {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    $fullname = $_POST['fullname'];
    $country = $_POST['country'];
    //sẽ báo lỗi khi ko chọn radio nào mà submit form
//    $gender = $_POST['gender'];
    //biểu thức quy tắc sẽ dựa vào các mẫu (pattern) mà do bạn quy
//    định trước, sau đó so sánh biến cần kiểm tra với mẫu này
//    ab de -> hợp lệ abcde ef
//    $pattern = "/\s{0,}^[a-zA-Z]{2,}|[a-zA-Z]{2,}+\s{1,}[a-zA-Z]{2,}$/";
  $pattern = "/^[a-zA-Z]{2,}( [a-zA-Z]{2,})*$/";
    //xử lý validate
    //trường hợp để trống tất cả các trường
//    if (empty($fullname)
//        || $country == -1
//        || !isset($_POST['gender'])
//        || !isset($_POST['jobs'])
//    ) {
//        $error = 'Không được để trống tất cả các trường';
//    }
    //yêu cầu 1 từ phải có ít nhất 2 ký tự
//    Na Manh -> hợp lệ
//        N Manh -> ko hợp lệ
     if(!preg_match($pattern, $fullname)) {
        $error = 'Các từ trong họ tên phải chứa ít nhất 2 ký tự';
    }
    else {
        $_SESSION['fullname'] = $fullname;
        //chuyển hướng sang màn hình khác,
        // được xử lý bởi file index.php
        header("Location: index.php");
        exit();
    }
}
?>
<h3 style="color: red">
    <?php echo $error; ?>
</h3>
<form action="" method="post">
    <h3>Form đăng ký thông tin</h3>
    Họ tên:
    <input type="text" name="fullname" value=""/>
    <br/>
    <br/>
    Giới tính
    <input type="radio" name="gender" value="0"/> Nữ
    <input type="radio" name="gender" value="1"/> Nam
    <br/>
    <br/>
    Nghề nghiệp:
    <input type="checkbox" name="jobs[]" value="0"/> Developer
    <input type="checkbox" name="jobs[]" value="1"/> Tester
    <input type="checkbox" name="jobs[]" value="2"/> BA - Bussiness Analysis
    <br/>
    <br/>
    Quốc gia:
    <select name="country">
        <option value="-1">--Chọn quốc gia--</option>
        <option value="1">Việt Nam</option>
        <option value="2">USA</option>
    </select>
    <br/>
    <br/>
    <input type="submit" name="submit" value="Đăng ký"/>
    <input type="reset" name="reset" value="Nhập lại"/>
</form>