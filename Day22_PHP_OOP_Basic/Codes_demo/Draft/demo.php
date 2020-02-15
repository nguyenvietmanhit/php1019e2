<?php
session_start();
require_once ('config.php');
if (isset($_GET['id'])){
  $id=$_GET['id'];
  $chitietNV=" SELECT * FROM employees where id=$id";
  $results=mysqli_query($connection,$chitietNV);
  $employs=[];
  if (mysqli_num_rows($results)>0) {
    $employsArr = mysqli_fetch_all($results, MYSQLI_ASSOC);
    $employs = $employsArr[0];
  }
}
if (isset($_POST['save'])){
  $name=$_POST['name'];
  $description=$_POST['description'];
  $salary=$_POST['salary'];
  $gender=$_POST['gender'];
  if(isset($gender) ? $gender : '');
  $birthday=$_POST['birthday'];
  $genderText='';
  switch ($gender){
    case 0:$genderText=0;break;
    case 1:$genderText=1;break;
  }
  $queryUpdate="UPDATE employess set `name`='$name',`description`='$description',`salary`='$salary',`gender`='$genderText',`birthday`='$birthday' where id={$employs['id']}";

  print_r($queryUpdate);

  $isUpdate=mysqli_query($connection,$queryUpdate);
  if ($isUpdate){
    $_SESSION['success']='Update thanh cong';
    header("Location: lietkeNV.php");
    exit();
  }
}
if (isset($_POST['cancel'])){
  header("Location: lietkeNV.php");
  exit();
}
?>
<form action="" method="post">
  <h2>Update Record</h2>
  Name<br/>
  <input type="text" name="name" value="<?php echo $employs['name']?>"><br/>
  Description<br/>
  <textarea name="description"><?php echo $employs['description']?></textarea><br/>
  Salary<br/>
  <input type="text" name="salary" value="<?php echo $employs['salary']?>"><br/>
  Gender<br/>
  <?php
  $radio1='';
  $radio2='';
  switch ($employs['gender']){
    case 0:$radio1='checked';break;
    case 1:$radio2='checked';break;
  }
  ?>
  <input type="radio" name="gender" value="0" <?php echo $radio1?>>Male
  <input type="radio" name="gender" value="1" <?php echo $radio2?>>Female<br/>
  Birthday<br/>
  <input type="text" name="birthday" value="<?php echo $employs['birthday']?>"><br/>
  <input type="submit" name="save" value="Save">
  <input type="submit" name="cancel" value="Cancel">
</form>