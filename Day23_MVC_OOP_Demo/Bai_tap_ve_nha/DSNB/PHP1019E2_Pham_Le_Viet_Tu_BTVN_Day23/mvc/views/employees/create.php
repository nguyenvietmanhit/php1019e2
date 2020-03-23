<?php
require_once "views/layouts/header.php";
?>
<form action="" method="post" enctype="multipart/form-data">
    <h2>Create Record</h2>
    <hr>
    <div class="form-group">
        <label>Name<sup>*</sup></label>
        <input type="text" class="form-control" name="name" value="">
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" rows="2" name="description"></textarea>
    </div>

    <div class="form-group">
        <label>Salary</label>
        <input type="number" class="form-control" name="salary">
    </div>

    <div class="form-group">
        <label>Gender</label>
        <div>
            <input type="radio" name="gender" value="1"> Male
            <input type="radio" name="gender" value="2"> Female
        </div>
    </div>

    <div class="form-group">
        <label>Birthday</label>
        <input type="date" class="form-control" name="birthday">
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary" name="submit">Save</button>
            <button class="btn btn-light"><a href="index.php?controller=employee&action=select">Back</a></button>
        </div>
    </div>
</form>
<?php
require_once "views/layouts/footer.php";
?>