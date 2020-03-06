<?php
/**
 * Created by PhpStorm.
 * User: tu901
 * Date: 2/29/2020
 * Time: 3:35 PM
 */
require_once "view/layouts/header.php"
?>

<div class="container">
    <h3>Create Record</h3>
    <form method="POST" action="">
        <hr>
        Name:
        <br>
        <input type="text" name="name">
        <br>
        Description:
        <br>
        <textarea name="description"></textarea>
        <br>
        Salary:
        <br>
        <input type="number" name="salary">
        <br>
        Gender:
        <br>
        <input type="radio" name="gender" value="1"> Male <input type="radio" name="gender" value="0"> Female
        <br>
        Birthday:
        <br>
        <input type="date" name="birthday" >
        <br>
        <button type="submit" name="submit" class="btn-primary" >Save</button>
        <button type="reset" class="btn btn-light">Cancel</button>


    </form>
</div>
<?php require_once "view/layouts/footer.php"?>
