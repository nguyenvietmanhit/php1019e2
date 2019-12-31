<?php
$error = '';
$result = '';
if (isset($_POST['submit'])){
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    if (empty($_POST['name'])){
        $error = "User name không để trống";
    }
    elseif (empty($_POST['email'])){
        $error = "Email không được để trống";
    }
    elseif (empty($_POST['password'])){
        $error = "Password không để trống";
    }
    elseif (empty($_POST['confirm_password'])){
        $error = "Confirm password không để trống";
    }
    if($password != $confirm_password)
    {
        $error = "Password va confirm-password khong chinh xac<br />";
    }
    else if ($_FILES['avatar']['error']==0){
        //validate file upload có đinh dạng ảnh
        $extension = pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);
        $arr_image_extension = ['jpg','jpeg','png','gif'];
        if (!in_array($extension,$arr_image_extension)){
            $error = "Cần upload đúng định dạng ảnh";
        }
        // xử lý upload file . tạo thư mục upload
        else{
            $dir_uploads = __DIR__.'/uploads';
            if (!file_exists($dir_uploads)){
                mkdir($dir_uploads);
            }
            //set lại file để đảm bảo file không bị trùng tên dù local có giống nhau
            $file_name = time().'-'.$_FILES['avatar']['name'];
            //chuyển file thừ thư mục tạm sang thư mục đã tạo
            $is_uploads = move_uploaded_file($_FILES['avatar']['tmp_name'],$dir_uploads.'/'.$file_name);
            if ($is_uploads){
                $result .= "User Name: $name<br>";
                $result .= "Email : $email<br>";
                $result .= "Avatar: ";
                $result .= "<img src='uploads/$file_name', height='80px'>";
                $result .= "<br>";
            }
            else{
                $error = "Không để upload file";
            }
        }
    }
    else{
        $error = "Có thể lỗi gì đó không thể upload file";
    }
}
?>

<h4 style="color: red;">
    <?php echo $error ?>
</h4>
<h4 style="color: green">
    <?php echo $result ?>
</h4>
<!DOCTYPE HTML>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <style type="text/css">
        form{
            border: 1px solid black;
            margin: 30px;
            padding: 60px 200px;
            background: #084B8A;
            color: #fff;
        }
        .form-control{
            background: #0B173B;
            color: #fff;
        }
    </style>

</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <h1>Create an account</h1>
    <div class="form-group">
        <input type="text" name="name" value="" placeholder="User name" class="form-control">
    </div>
    <div class="form-group">
        <input type="email" name="email" value="" placeholder="Email" class="form-control">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" value="">
    </div>
    <div class="form-group">
        <input type="password" name="confirm_password" value="" placeholder="Confirm password" class="form-control">
    </div>

        <b>Select your avatar:</b>
        <input type="file" name="avatar" value="" >
        <br>
    <div class="form-group">
        <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-lg btn-block">
    </div>
</form>
</body>
</html>
