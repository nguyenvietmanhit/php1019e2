<?php
//BT1
//xử lý form
//khai báo 2 biến chứa thông tin lỗi và thông báo thành công
$error = '';
$result = '';
if (isset($_POST['submit'])) {
    //debug biến để nhìn và thao tác cho dễ
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    //tạo các biến trung gian để lưu giá trị
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date_time = $_POST['date_time'];
    $class_detail = $_POST['class_detail'];
//    $gender = $_POST['gender'];
    //validate form theo yêu cầu đề bài
    if (empty($name)) {
        $error = "Name không được để trống";
    } else if (empty($email)) {
        $error = "Email không được để trống";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email chưa đúng định dạng ";
    } else if(empty($class_detail) && empty($date_time)) {
        $error = "Class detail và Specific Time không được để trống";
    } else if (!isset($_POST['gender'])) {
        $error = "Cần phải chọn Gender";
    }
    else {
        //validate thành công, xử lý hiển thị form theo yêu cầu đề bài
        $result .= "Your Given details are as: <br />";
        $result .= "Name: $name <br />";
        $result .= "Email: $email <br />";
        $result .= "Specific Time: $date_time <br />";
        $result .= "Class details: $class_detail <br />";
        //xử lý radio, checkbox hoặc select box thì sẽ mất nhiều
//        thao tác hơn
        $gender = $_POST['gender'];
        $gender_text = '';
        switch ($gender) {
            case 0: $gender_text = 'Female';break;
            case 1: $gender_text = 'Male';break;
        }
        $result .= "Gender: $gender_text";
    }
}
?>
<!--<style type="text/css">-->
<!--    input:focus {-->
<!--        border: 1px solid red;-->
<!--    }-->
<!--</style>-->
<h3 style="color: red" >
    <?php echo $error; ?>
</h3>
<h3 style="color: green">
    <?php echo $result; ?>
</h3>
<form action="" method="post">
<table border="0" >
    <tr>
        <td colspan="2">Tutorial</td>
    </tr>
    <tr>
        <td>Name</td>
        <td>
            <input type="text" name="name"
                   value="<?php echo isset($_POST['name']) ? $_POST['name'] : "" ?>" />
        </td>
    </tr>
    <tr>
        <td>E-mail</td>
        <td>
            <input type="text" name="email"
          value="<?php echo isset($_POST['email']) ? $_POST['email'] : ""?>" />
        </td>
    </tr>
    <tr>
        <td>Specific Time</td>
        <td>
            <input type="date" name="date_time"
         value="<?php echo isset($_POST['date_time']) ? $_POST['date_time'] : ''?>" />
        </td>
    </tr>
    <tr>
        <td>Class details</td>
        <td>
            <textarea name="class_detail"><?php echo isset($_POST['class_detail']) ? $_POST['class_detail'] : ''?></textarea>
        </td>
    </tr>
    <tr>
        <?php
        //có bao nhiêu radio thì tạo bấy nhiêu biến checked
            $checked_female = '';
            $checked_male = '';
            if (isset($_POST['gender'])) {
                $gender = $_POST['gender'];
                switch ($gender) {
                    case 0: $checked_female = "checked=true";break;
                    case 1: $checked_male = "checked=true";break;
                }
            }
        ?>
        <td>Gender</td>
        <td>
            <input <?php echo $checked_female ?>
                    type="radio" name="gender" value="0"  /> Female
            <input <?php echo $checked_male ?>
                    type="radio" name="gender" value="1" /> Male
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <input type="submit" name="submit" value="Submit" />
        </td>
    </tr>
</table>
</form>
<?php
