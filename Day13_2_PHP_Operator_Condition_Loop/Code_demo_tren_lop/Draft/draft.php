<?php
if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

    echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
    print_r($file_ext);
    echo "</pre>";
//    die;
    $expensions= array("jpeg","jpg","png");

    if(in_array($file_ext,$expensions)=== false){
        $errors[]="Chỉ hỗ trợ upload file JPEG hoặc PNG.";
    }

    if($file_size > 2097152) {
        $errors[]='Kích thước file không được lớn hơn 2MB';
    }

    if(empty($errors)==true) {
        move_uploaded_file($file_tmp,"images/".$file_name);
        echo "Success";
    }else{
        print_r($errors);
    }
}
?>
<html>
<body>

<form action = "" method = "POST" enctype = "multipart/form-data">
    <input type = "file" name = "image" />
    <input type = "submit"/>

    <ul>
        <li>Sent file: <?php echo $_FILES['image']['name'];  ?>
        <li>File size: <?php echo $_FILES['image']['size'];  ?>
        <li>File type: <?php echo $_FILES['image']['type'] ?>
    </ul>

</form>

</body>
</html>