<?php
$error = '';
$result = 'Thông tin vừa nhập: <br />';

if (isset($_GET['submit'])) {
    $name = $_GET['name'];
    $gender = isset($_GET['gender']) ? $_GET['gender'] : null;
    $color = $_GET['color'];
    $jobsArr = isset($_GET['jobs']) ? $_GET['jobs'] : [];
    $information = $_GET['information'];
    $result .= "Name: $name <br />";
    switch ($gender) {
        case 1:
            $result .= "Gender: Nam";
            break;
        case 2:
            $result .= "Gender: Nữ";
            break;
        case 3:
            $result .= "Gender: Khác";
            break;
    }
    $result .= "<br />";
    switch ($color) {
        case 1:
            $result .= "Color: Đỏ";
            break;
        case 2:
            $result .= "Color: Trắng";
            break;
        case 3:
            $result .= "Color: Xanh";
            break;
    }
    $result .= "<br />";

    if (in_array(1, $jobsArr)) {
        $result .= "Jobs: Technical Leader";
        $result .= "<br />";
    }
    if (in_array(2, $jobsArr)) {
        $result .= "Jobs: Developer";
        $result .= "<br />";
    }
    if (in_array(3, $jobsArr)) {
        $result .= "Jobs: Freelancer";
        $result .= "<br />";
    }
    if (in_array(4, $jobsArr)) {
        $result .= "Jobs: Tester";
        $result .= "<br />";
    }
    $result .= "Information: $information<br />";


}
?>
<form action="" method="get">
    <table border="1" cellspacing="0" cellpadding="6">
        <tr>
            <th colspan="2">Thông tin cơ bản</th>
        </tr>
        <tr>
            <td>Name</td>
            <td>
                <input type="text" name="name" value="<?php echo isset($name) ? $name : null; ?>">
            </td>
        </tr>
        <tr>
            <td>Giới tính</td>
            <?php
            $checkedMale = 'checked';
            $checkedFemale = '';
            $checkedAnother = '';
            if (isset($gender)) {
                switch ($gender) {
                    case 1:
                        $checkedMale = 'checked';
                        break;
                    case 2:
                        $checkedFemale = 'checked';
                        break;
                    case 3:
                        $checkedAnother = 'checked';
                        break;
                }
            }
            ?>
            <td>
                <input type="radio" name="gender" value="1" <?php echo $checkedMale ?>> Nam <br/>
                <input type="radio" name="gender" value="2" <?php echo $checkedFemale ?>> Nữ <br/>
                <input type="radio" name="gender" value="3" <?php echo $checkedAnother ?>> Khác <br/>
            </td>
        </tr>
        <tr>
            <td>Màu sắc yêu thích</td>
            <?php
            $selectedWhite = '';
            $selectedblue = '';
            if (isset($color)) {
                switch ($color) {
                    case 2:
                        $selectedWhite = 'selected';
                        break;
                    case 3:
                        $selectedblue = 'selected';
                        break;
                }
            }
            ?>
            <td>
                <select name="color">
                    <option value="1">Đỏ</option>
                    <option value="2" <?php echo $selectedWhite ?>>Trắng</option>
                    <option value="3" <?php echo $selectedblue ?>>Xanh</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nghề nghiệp</td>
            <?php
            $checkedJob1 = '';
            $checkedJob2 = '';
            $checkedJob3 = '';
            $checkedJob4 = '';
            if (isset($jobsArr)) {
                if (in_array(1, $jobsArr)) {
                    $checkedJob1 = 'checked';
                }
                if (in_array(2, $jobsArr)) {
                    $checkedJob2 = 'checked';
                }
                if (in_array(3, $jobsArr)) {
                    $checkedJob3 = 'checked';
                }
                if (in_array(4, $jobsArr)) {
                    $checkedJob4 = 'checked';
                }
            }
            ?>
            <td>
                <input type="checkbox" name="jobs[]" value="1" <?php echo $checkedJob1 ?> /> Technical Leader <br/>
                <input type="checkbox" name="jobs[]" value="2" <?php echo $checkedJob2 ?> /> Developer <br/>
                <input type="checkbox" name="jobs[]" value="3" <?php echo $checkedJob3 ?> /> Freelancer <br/>
                <input type="checkbox" name="jobs[]" value="4" <?php echo $checkedJob4 ?> /> Tester
            </td>
        </tr>
        <tr>
            <td colspan="2">
                Thông tin thêm <br/>
                <textarea name="information" cols="30"
                          rows="3"><?php echo isset($information) ? $information : '' ?></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="submit"
                       value="Hiển thị thông tin"/>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="color: green">
                <?php echo $result; ?>
            </td>
        </tr>
    </table>
</form>

