<!DOCTYPE html>
<html>
<head>
    <title>Chữa bài tập 3 ngày 14</title>
</head>
<body>
<form action="" method="post">
    <table cellspacing="0" cellpadding="5" border="1">
        <tr>
            <td>Enter email-address</td>
            <td>
                <input type="email" name="email"/>
            </td>
        </tr>
        <tr>
            <td>Enter password</td>
            <td>
                <input type="password" name="password"/>
            </td>
        </tr>
        <tr>
            <td>Select academic level</td>
            <td>
                <select name="academic">
                    <option value="1">Freshman</option>
                    <option value="2">Freshman2</option>
                    <option value="3">Freshman3</option>
                </select>
                <!--                    Select nhiều giá trị cùng lúc thì name-->
                <!--                    sẽ tương tự checkbox, có dạng mảng-->
                <!--                    <select name="academic[]" multiple>-->
                <!--                        <option value="1">Freshman</option>-->
                <!--                        <option value="2">Freshman2</option>-->
                <!--                        <option value="3">Freshman3</option>-->
                <!--                    </select>-->
            </td>
        </tr>
        <tr>
            <td>Identify course taken:</td>
            <td>
                <input type="checkbox" name="course[]" value="0"/> CSCI 1710 <br/>
                <input type="checkbox" name="course[]" value="1"/> CSCI 1711 <br/>
                <input type="checkbox" name="course[]" value="2"/> CSCI 1712 <br/>
                <input type="checkbox" name="course[]" value="3"/> CSCI 1713 <br/>
                <input type="checkbox" name="course[]" value="4"/> CSCI 1714 <br/>
            </td>
        </tr>
        <tr>
            <td>Select concentration:</td>
            <td>
                <input type="radio" name="concen" value="0"> Computer Sience 0<br/>
                <input type="radio" name="concen" value="1"> Computer Sience 1<br/>
                <input type="radio" name="concen" value="2"> Computer Sience 2<br/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
<!--                text area có 1 tính chất là không được có khoảng trống-->
<!--                trong phần nội dung của thẻ-->
                    <textarea name="message" rows="5"  cols="35" placeholder="Nhập message"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="submit" value="Submit data" />
            </td>
        </tr>
    </table>
</form>
</body>
</html>

<?php
//B1: chỉ check khi user submit form
if (isset($_POST['submit'])) {
    echo '<pre>';
    print_r($_POST);

    //B2 - Check validate theo yêu cầu bài toán
//    strlen($_POST['email']) > 0
    if (empty($_POST['email'])) {
        echo '<p style="color: red">Email không được để trống</p>';
    }
    else if (empty($_POST['password'])) {
        echo '<p style="color: red">Password không được để trống</p>';
    }
    else if(strlen($_POST['password']) < 8) {
        echo '<p style="color: red">Password phải có độ dài tối thiểu 8 ký tự</p>';
    }
    else {
        echo '<p style="blue">Đăng ký thành công!</p>';
        echo '<p style="blue">Thông tin của bạn:</p>';
        echo '<p>Email:' .$_POST['email']. '</p>';
        $academicText = '';
        switch ($_POST['academic']) {
            case 1: $academicText = 'Freshman';break;
            case 2: $academicText = 'Freshman2';break;
            case 3: $academicText = 'Freshman3';break;
        }
        echo '<p>Academic:' .$academicText. '</p>';

        //khi xử lý với checkbox và radio
//        bắt buộc phải sử dụng isset để check trường hợp
//        user không select checkbox/radio nào
        $checkboxText = '';
        if (isset($_POST['course'])) {
            $checkboxArr = $_POST['course'];
            foreach ($checkboxArr as $value) {
                switch ($value) {
                    case 0: $checkboxText .= 'CSCI 1710 <br />';break;
                    case 1: $checkboxText .= 'CSCI 1711 <br />';break;
                    case 2: $checkboxText .= 'CSCI 1712 <br />';break;
                    case 3: $checkboxText .= 'CSCI 1713 <br />';break;
                    case 4: $checkboxText .= 'CSCI 1714 <br />';break;
                }
            }
            echo '<p>Identify course taken:' .$checkboxText. '</p>';
        }
        //trong trường hợp mà user ko check case nào
//        thì sẽ rơi vào trường hợp dưới
//        else {
//            echo '<p style="color:red">Bạn cần check ít nhất 1 trường</p>';
//        }

        $radioText = '';
        if (isset($_POST['concen'])) {
            switch ($_POST['concen']) {
                case 0: $radioText = 'Computer Sience 0';break;
                case 1: $radioText = 'Computer Sience 1';break;
                case 2: $radioText = 'Computer Sience 2';break;
            }
            echo '<p>Select concentration:' .$radioText. '</p>';
        }
        echo 'Message: ' . $_POST['message'];
    }
}
?>