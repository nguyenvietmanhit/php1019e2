<?php
require_once "views/layouts/header.php";
?>
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Update Record</h2>
        <hr>
        <div class="form-group">
            <label>Name<sup>*</sup></label>
            <input type="text" class="form-control" name="name"
                   value="<?php echo $employee['name'] ?>">
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" rows="2" name="description"><?php echo $employee['description'] ?></textarea>
        </div>

        <div class="form-group">
            <label>Salary</label>
            <input type="number" class="form-control" name="salary"
                   value="<?php echo $employee['salary'] ?>">
        </div>

        <div class="form-group">
            <label>Gender</label>
            <div>
                <input type="radio" name="gender" value="1" <?php if ($employee['gender'] == 1){echo 'checked';} ?>> Male
                <input type="radio" name="gender" value="2" <?php if ($employee['gender'] == 2){echo 'checked';}?>> Female
            </div>
        </div>

        <div class="form-group">
            <label>Birthday</label>
            <input type="date" class="form-control" name="birthday"
            value="<?php echo $employee['birthday'] ?>" />
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