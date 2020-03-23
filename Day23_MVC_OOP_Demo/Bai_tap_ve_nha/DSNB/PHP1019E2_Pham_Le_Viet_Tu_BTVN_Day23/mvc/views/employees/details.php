<?php
require_once 'views/layouts/header.php';
?>

<h2>View Record</h2>
<hr>
ID
<br>
<?php echo $employee['id'] ?>
<br>
<br>
Name
<br>
<?php echo $employee['name'] ?>
<br>
<br>
Description
<br>
<?php echo $employee['description'] ?>
<br>
<br>
Salary
<br>
<?php echo $employee['salary'] ?>
<br>
<br>
Gender
<br>
<?php echo ($employee['gender'] == 1) ? "Male" : (($employee['gender'] == 2) ? "Female" : '') ?>
<br>
<br>
Birthday
<br>
<?php
$birthday = date('d-m-Y', strtotime($employee['birthday']));
echo $birthday;
?>
<br>
<br>
Created_at
<br>
<?php
$created_at = date('d-m-Y H:i:s', strtotime($employee['created_at']));
echo $created_at;
?>
<br>
<br>
<button class="btn btn-light"><a href="index.php?controller=employee&action=select">Back</a></button>
<?php
require_once 'views/layouts/footer.php';
?>
