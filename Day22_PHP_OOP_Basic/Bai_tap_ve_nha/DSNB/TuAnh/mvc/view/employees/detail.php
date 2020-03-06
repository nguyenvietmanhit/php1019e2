<?php
/**
 * Created by PhpStorm.
 * User: tu901
 * Date: 3/1/2020
 * Time: 11:17 PM
 */
require_once "view/layouts/header.php"
?>
    <div class="container">
        <h3>View Record</h3>
        ID <br>
        <?php echo $employee['id']?><br>
        Name <br>
        <?php echo $employee['name']?><br>
        Description <br>
        <?php echo $employee['description']?><br>
        Salary <br>
        <?php echo $employee['salary']?><br>
        Gender <br>
        <?php if ($employee['gender'] == 1){
            echo "Male";
        }
        else {
            echo "Female";
        }?><br>
        Birthday <br>
        <?php echo date("d/m/Y", strtotime($employee['birthday']))?><br>
        Created_at <br>
        <?php echo date("d/m/Y H:i:s", strtotime($employee['created_at'])) ?><br>
        <button class="btn btn-primary"><a href="index.php?controller=employee&action=listEmployee" style="color: white">Back</a></button>
    </div>
<?php
require_once "view/layouts/footer.php"
?>