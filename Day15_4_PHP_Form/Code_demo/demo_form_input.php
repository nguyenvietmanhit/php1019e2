<?php
//nếu có hành động submit form thì mới xử lý (biến $_GET/$_POST khi
//submit form mới có giá trị)
if (isset($_GET['submit'])) {
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";
    //khi xử lý với input radio hoặc checkbox
//    thì nên kiểm tra thêm điều kiện là đã tích vào radio/checkbox
    if (isset($_GET['gender'])) {
        //xử lý lấy giá trị cho input radio
    }
    if (isset($_GET['jobs'])) {
        //xử lý lấy giá trị cho input radio
        //với checkbox thì phải xử lý dưới dạng mảng
    }
}
?>
<form action="" method="get">
    Name:
    <input type="text" name="name" value=""/>
    <br/>
    Gender:
    <input type="radio" name="gender" value="1"/> Nam
    <input type="radio" name="gender" value="2"/> Nữ
    <input type="radio" name="gender" value="3"/> Khác
    <br/>
    Country
    <!--    <select name="country[]" multiple>-->
    <select name="country">
        <option value="1">Việt Nam</option>
        <option value="2">USA</option>
        <option value="3">Korea</option>
    </select>
    <br/>
    Jobs:
    <!--    với các input mà cho phép chọn nhiều giá trị tại 1 thời điểm-->
    <!--    thì name bắt buộc phải ở dạng mảng-->
    <input type="checkbox" name="jobs[]" value="1"/> Developer
    <input type="checkbox" name="jobs[]" value="2"/> Tester
    <input type="checkbox" name="jobs[]" value="3"/>
    BA (Business Analysis)
    <br/>
    Info:
    <textarea name="info"></textarea>
    <br/>
    <input type="submit" name="submit" value="Submit"/>
</form>
<style type="text/css">
    /*không cho phép co giãn textarea*/
    textarea {
        resize: none;
    }
</style>