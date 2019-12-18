<meta charset="UTF-8">
<!--bài 1-->
<?php
$variable1 = '1.23';
echo "variable1 = $variable1";
echo "<br/>";
var_dump(is_string($variable1));

$variable2 = 28;
echo "<br/>";
echo "<br/>";
echo "variable2 = $variable2";
echo "<br/>";
var_dump(is_int($variable2));

$variable3 = 'null';
echo "<br/>";
echo "<br/>";
echo "variable3 = $variable3";
echo "<br/>";
var_dump(is_string($variable3));

$variable4 = [123, false, null, 1.23, FALSE, [], TRUE];
echo "<br/>";
echo "<br/>";
var_dump(is_array($variable4));
echo "<br/>";
echo "<pre>";
print_r($variable4);
echo "<pre>";

$variable5 = (float)-123;
echo "<br/>";
echo "<br/>";
echo "variable5 =  $variable5";
echo "<br/>";
var_dump(is_float($variable5));

$variable6 = 'false';
echo "<br/>";
echo "<br/>";
echo "variable6 = $variable6";
echo "<br/>";
var_dump(is_string($variable6));

$variable7 = 'php39';
echo "<br/>";
echo "<br/>";
echo "variable7 = $variable7";
echo "<br/>";
var_dump(is_string($variable7));
?>
<!--end bài 1-->

<!--bài 2-->
<!DOCTYPE html>
<html>
<head>
    <title>name</title>
</head>
<body>
<b>Today I\'ll learn PHP-"Variable"</b><br/>
<b>This is a bad command : del c:\*.*</b>
<script type="text/javascript">
    document.write("<h1>javascript</h1>")
    document.write("<h1>Today I\\'ll learn PHP-variable</h1>");
    document.write("<h1>This is a bad command:del c:\\*.*</h1>");
</script>
</body>
</html>

<?php
echo "PHP";
echo "<br/>";
echo "Today I\'ll learn PHP-variable";
echo "<br/>";
echo "This is a bad command:del c:\*.*";
?>
<!--end bài 2-->

<!--bài 4-->
<!DOCTYPE html>
<html>
<head>
</head>
<body style="text-align: center;">
<?php
$variable11 = "Nguyễn Viêt Mạnh";
$variable12 = "29";
$variable13 = "05/01/1990";
$variable14 = "Nam";
$variable15 = "Sơn Đồng - Hoài Đức - Hà Nội";
?>
<table border="1" cellpadding="0" cellspacing="0">
    <tr style="text-align: center;">
        <td>Họ tên</td>
        <td>Tuổi</td>
        <td>Ngày sinh</td>
        <td>Giới tính</td>
        <td>Quê quán</td>
    </tr>
    <tr>
        <td><?php
            $variable11 = "Nguyễn Viêt Mạnh";
            echo "$variable11";
            ?></td>
        <td><?php
            $variable12 = "29";
            echo "$variable12";
            ?></td>
        <td><?php
            $variable13 = "05/01/1990";
            echo "$variable13";
            ?></td>
        <td><?php
            $variable14 = "Nam";
            echo "$variable14";
            ?></td>
        <td><?php
            $variable15 = "Nguyễn Viêt Mạnh";
            echo "$variable15";
            ?></td>
    </tr>
</table>
</body>
</html>
<!--end bài 4-->

<!--bài 5-->
<!DOCTYPE html>
<html>
    <head></head>
    <style type="text/css" rel="stylesheet">
        .tex{
    padding-right: 363px;
    padding-bottom: 50px;
    }
        .btn{
            padding: 10px;
            background: #FFC107;
            border: #FFC107 solid 1px;
        }
        #blue, .blue2, .blue3 , #blue4{
            color: blue;
        }
    </style>
    <?php
    $name = "Nguyen Tan Phat";
    $email = "nguyentanphat@gmail.com";
    $phone = "0987xxxxxx";
    $variable16 = "This is a message";
    ?>

    <body>
    <form onsubmit="return handleSubmit();">
    <table>
        <tr>
            <td>
    <input type="text" value="<?php
    echo "$name";?>" class="name" id="name">
            </td>
            <td>
    <input type="text" value="<?php
    echo "$email";?>" id="email">
            </td>
            <td>
    <input type="text" value="<?php
    echo "$phone";?>" id="phone">
            </td>
        </tr>
        </table>
        <table>
            <tr>
                <td>Messages *:</td>
            </tr>
        <tr>
            <td>
    <textarea class="tex" placeholder="<?php echo "$variable16";?>"></textarea>
            </td>
        </tr>
        <tr>
            <td>
        <button type="submit" class="btn btn-success">Send message</button>
            </td>
        </tr>
    </table>
        <div id="blue"></div>
        <div class="blue2" id="blue2"></div>
        <div class="blue3" id="blue3"></div>
        <div id="blue4"></div>
    </form>
    <script type="text/javascript">
        function handleSubmit(){
            var blue = '';
            var blue2 = '';
            var blue3 = '';
            var blue4 = '';

            var obj_name = document.getElementById('name');
            var name = obj_name.value;

            var obj_email = document.getElementById('email');
            var email = obj_email.value;

            var obj_phone = document.getElementById('phone');
            var phone = obj_phone.value;


            blue = "Name:" + name;
            document.getElementById('blue').innerHTML = blue;
            blue2 = "Email:" + email;
            document.getElementById('blue2').innerHTML = blue2;
            blue3 = "Phone:" + phone;
            document.getElementById('blue3').innerHTML = blue3;
            blue4 = "Messages *: This is a message";
            document.getElementById('blue4').innerHTML = blue4;
            return false
        }
    </script>
    </body>
</html>
<!--end bài 5-->