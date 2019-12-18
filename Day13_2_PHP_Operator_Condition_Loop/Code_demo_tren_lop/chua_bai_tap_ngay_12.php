<?php
//BT 1
$variable1 = '1.23';
$variable2 = 28;
$variable3 = 'null';
$variable14 = [
    123,
    false,
    null,
    1.23,
    FALSE,
    [],//  array()
    TRUE
];

$variable5 = (float)-123;
$variable6 = 'false';
$variable7 = 'php39';
?>

<!--BT2-->
<!--2.	Hiển thị chuỗi như sau ra màn hình:-->
<!--Today I \'ll learn PHP - "Variable"-->
<!--This is a bad command : del c:\*.*-->
<!--Yêu cầu hiển thị lần lượt bằng 1 trong các phương pháp sau:-->
<!--•	Sử dụng HTML-->
<!--•	Sử dụng Javascript-->
<!--•	Sử dụng PHP-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Chữa bài tập</title>
</head>

<body>
<!--        Hiển thị bằng HTML-->
Today I \'ll learn PHP - "Variable" <br />
This is a bad command : del c:\*.*

<div id="result"></div>
<!--            Hiển thị bằng Javascript-->
<script type="text/javascript">
    var text = 'Today I  \\\'ll learn PHP - "Variable"';
    text += "<br />";
    text += 'This is a bad command : del c:\\\*.*';
    document.getElementById('result').innerHTML = text;
</script>

<!--Hiển thị với PHP-->
<?php
    $text = 'Today I \\\'ll learn PHP - "Variable"';
    $text .= "<br />";
    $text .= 'This is a bad command : del c:\*.*';
echo $text;

//BT 4
//$variable1 = '123abc';
//$variable1 = 'abc123';
//$variable1 = '';
$variable1 = null;
//ép sang kiểu int
$variable1_int = (int) $variable1;
var_dump($variable1_int);
//ép sang kiểu float
$variable1_float = (float) $variable1;
var_dump($variable1_float);
//ép kiểu string
$variable1_string = (string) $variable1;
var_dump($variable1_string);
//ép kiểu boolean
$variable1_boolean = (boolean) $variable1;
var_dump($variable1_boolean);

?>
<form >
    <input type="text" />
    <input type="button"
           onclick="return check()"
           value="Submit"/>
    <input type="text" placeholder="Nhap ten" />
</form>
</body>
</html>
