<?php
require_once "views/layouts/header.php";
?>
    <div class="container" style="width: 20%; height: auto">
        <form action="" method="post">
            <h3>Update Record</h3>
            <hr/>
            <div class="form-group">
                <label for="name">Name<span style="color: red">*</span> </label>
                <input type="text" class="form-control" name="name" id="name"
                       value="<?php echo $employee['name']; ?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" class="form-control" name="description" id="description"><?php echo $employee['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="salary">Salary</label>
                <input type="text" class="form-control" name="salary" id="salary"
                       value="<?php echo $employee['salary']; ?>">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label> <br/>
                <input type="radio" name="gender" id="gender" value="1"
                       <?php if($employee['gender'] == 1) {echo 'checked="checked"';}; ?>>Male
                <input type="radio" name="gender" id="gender" value="0"
                    <?php if($employee['gender'] == 0) {echo 'checked="checked"';}; ?>>Female
            </div>
            <div class="form-group">
                <label for="birthday">Birthday</label>
                <input type="date" class="form-control" name="birthday" id="birthday"
                       <?php $birthday = date('Y-m-d', strtotime($employee['birthday'])); ?>
                       value="<?php echo $birthday; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Save</button>
            <button type="button" class="btn btn-light" name="cancel" style="text-decoration: none">
                <a href="<?php echo "index.php?controller=nhanvien&action=list"?>">Cancel</a>
            </button>
        </form>
    </div>
<?php
require_once "views/layouts/footer.php";
?>