<?php
session_start();
require_once "config.php";
$result = '';
$error = '';
if(isset($_POST['submit'])){
    $name = $_POST['username'];
    $text = $_POST['text'];
    $number = $_POST['number'];
    $gender = $_POST['gender'];
    $time = $_POST['time'];
    if (empty($name) || empty($text) || empty($number) || empty($gender)|| empty($time)){
        $error = ' cần nhập đầy đủ trường';
    }else if (strlen($name )< 3 ) {
        $error = 'Tên danh mục phải lớn hơn 2 ký tự ';
    }else {
        $sqlInsert = "INSERT INTO employees(`name`,`description`,`gender`,`salary`,`birthday`)
    VALUES  ('$name','$text',$gender,$number,$time)";
    
    $isInsert = mysqli_query($connection,$sqlInsert);
        if($isInsert){
            $_SESSION['success'] = 'Thêm mới thành công';
            header ('Location:index.php');
            exit();
        }else{
            $error='Insert không thành công';
        }
    }
}

?>



<head>
    <meta charset="utf-8">
    <title>BAITAP19</title>
</head>
<style type="text/css">
    input{
        width: 100%;
    }
    textarea{
        width: 100%;
    }

</style>
<body>
<h3 style="color:red">
    <?php echo $error ?>
</h3>
<form method="post" action="" style="width: 50%">
    <h1>Create Rocord</h1>
    <hr>
    Name <span style="color:red">*</span>
    <br>
    <input type="text" name="username"
           value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>"/>

    <br>
    Descrition
    <br>
    <textarea name="text"></textarea><br>
    Salary <br>
    <input type="number" name="number">
    <br>
    Gender <br>
    <input type="radio" name="gender" value="1" style="width: auto">Male
    <input type="radio" name="gender" value="2" style="width: auto">Female
    <br>
    Birthday
    <br>
    <input type="date" name="time" value="" placeholder="mm/dd/yy">
    <br>
    <button type="submit" name="submit" style="background-color: blue;color:white">Save</button>
    <input type="reset" value="Cancel" style="width:10%">
</form>
</body>