<?php
require_once "./views/layouts/header.php";
?>
<div class="container" style="width: 20%; height: auto">
    <h3>View Record</h3>
    <hr/>
    <div class="form-group">
        <label for="id">id</label>
        <p class="form-control" id="id"><?php echo $employee['id'] ?></p>
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <p class="form-control" id="name"><?php echo $employee['name'] ?></p>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <p class="form-control" id="description"><?php echo $employee['description'] ?></p>
    </div>
    <div class="form-group">
        <label for="salary">Salary</label>
        <p class="form-control" id="salary"><?php echo $employee['salary'] ?></p>
    </div>
    <div class="form-group">
        <label for="gender">Gender</label> <br/>
        <p class="form-control" id="gender">
            <?php
            if ($employee['gender'] = 1) {
                echo "Male";
            } else {
                echo "Female";
            }
            ?>
        </p>
    </div>
    <div class="form-group">
        <label for="birthday">Birthday</label>
        <p class="form-control" id="birthday"><?php echo $employee['birthday'] ?></p>
    </div>
    <button type="button" class="btn btn-primary">
        <a href="<?php echo "index.php?controller=nhanvien&action=list" ?>" style="color: white; text-decoration: none">Back</a>
    </button>
</div>
<?php
require_once "./views/layouts/footer.php";
?>
