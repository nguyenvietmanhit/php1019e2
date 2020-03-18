<?php
require_once "views/layouts/header.php";
?>
<div class="container" style="width: 20%; height: auto">
    <form action="" method="post">
        <h3>Create Record</h3>
        <hr/>
        <div class="form-group">
            <label for="name">Name<span style="color: red">*</span> </label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" class="form-control" name="description" id="description"></textarea>
        </div>
        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="text" class="form-control" name="salary" id="salary">
        </div>
        <div class="form-group">
            <label for="gender">Gender</label> <br/>
            <input type="radio" name="gender" id="gender" value="1">Male
            <input type="radio" name="gender" id="gender" value="0">Female
        </div>
        <div class="form-group">
            <label for="birthday">Birthday</label>
            <input type="date" class="form-control" name="birthday" id="birthday">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Save</button>
        <button type="reset" class="btn btn-light" name="cancel">Cancel</button>
    </form>
</div>
<?php
require_once "views/layouts/footer.php";
?>

