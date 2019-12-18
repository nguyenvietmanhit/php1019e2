<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Form</title>
</head>
<body>
<form action="" method="get" enctype="multipart/form-data">
    <table border="1" cellspacing="0" cellpadding="6">
        <tr>
            <th colspan="2">Thông tin cơ bản</th>
        </tr>
        <tr>
            <td>Name</td>
            <td>
                <input type="text" name="name" value="">
            </td>
        </tr>
        <tr>
            <td>Giới tính</td>
            <td>
                <input type="radio" name="gender" value="1" checked> Name <br />
                <input type="radio" name="gender" value="2"> Nữ <br />
                <input type="radio" name="gender" value="3"> Khác <br />
            </td>
        </tr>
        <tr>
            <td>Màu sắc yêu thích</td>
            <td>
                <select name="color" >
                    <option value="1">Đỏ</option>
                    <option value="2">Trắng</option>
                    <option value="3">Xanh</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nghề nghiệp</td>
            <td>
                <input type="checkbox" name="jobs[]" value="1" /> Technical Leader <br />
                <input type="checkbox" name="jobs[]" value="2"/> Developer <br />
                <input type="checkbox" name="jobs[]" value="3"/> Freelancer <br />
                <input type="checkbox" name="jobs[]" value="4"/> Tester
            </td>
        </tr>
        <tr>
            <td colspan="2">
                Thông tin thêm <br />
                <textarea name="infomation" cols="30" rows="3">

                </textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="submit-form"
                       value="Hiển thị thông tin" />
            </td>
        </tr>
    </table>
</form>
</body>
</html>
<?php
echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
print_r($_GET);
echo "</pre>";
//die;

function toUpper($arr) {
    foreach ($arr as $key => $value) {
        $arr[$key] = strtoupper($value);
    }

    return $arr;
}


$keys = array(
    "field1"=>"first",
    "field2"=>"second",
    "field3"=>"third"
);
$values = array(
    "field1value"=>"dinosaur",
    "field2value"=>"pig",
    "field3value"=>"platypus"
);

$arrKeys = array_values($keys);
//
//echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
//print_r(array_combine($keys, $values));
//echo "</pre>";
//die;
//$arrValues = array_keys($values);
//echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
//print_r($arrKeys);
//echo "</pre>";
////die;
//echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
//print_r($arrValues);
//echo "</pre>";
//die;
//$arr = ['a', 'b', 'c'];
//echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
//print_r(toUpper($arr));
//echo "</pre>";
//die;


