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
        <h3>Update Record</h3>
        <form method="post" action="">
            <hr>
            <p>please edit the input value and submit to update the record</p>
            Name:
            <br>
            <input type="text" name="name" value="<?php echo $employee['name'] ?>">
            <br>
            Description:
            <br>
            <textarea name="description"><?php echo $employee['description']?></textarea>
            <br>
            Salary:
            <br>
            <input type="number" name="salary" value="<?php echo $employee['salary']?>">
            <br>
            Gender:
            <br>
            <input type="radio" name="gender" value="1" <?php if ($employee['gender'] == 1){ echo 'checked'; } ?> > Male
            <input type="radio" name="gender" value="0" <?php if ($employee['gender'] == 0){ echo 'checked'; } ?> > Female
            <br>
            Birthday:
            <br>
            <input type="date" name="birthday" value="<?php echo date("Y-m-d",strtotime($employee['birthday']))?>">
            <br>
            <button type="submit" name="submit" class="btn-primary" >Save</button>
            <button type="submit" name="reset" class="btn btn-light">Cancel</button>


        </form>
    </div>
<?php
require_once "view/layouts/footer.php"
?>