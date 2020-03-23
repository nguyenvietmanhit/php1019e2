<?php
require_once 'views/layouts/header.php';
?>
<div class="row">
    <h2 class="col-8"> Employees List</h2>
    <button class="col-4 btn btn-success"><a class="white" href="index.php?controller=employee&action=create">+Add New Employee</a></button>
</div>
<hr>
<table border="1px" cellpadding="8" cellspacing="0">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Description</th>
        <th>Salary</th>
        <th>Gender</th>
        <th>Birthday</th>
        <th>Created_at</th>
        <th>Action</th>
    </tr>
    <?php if (empty($employees)): ?>
        <tr>
            <td colspan="8">Không có bản ghi nào</td>
        </tr>
    <?php else: ?>
        <?php foreach ($employees AS $employee): ?>
            <tr>
                <td>
                    <?php echo $employee['id']; ?>
                </td>
                <td>
                    <?php echo $employee['name']; ?>
                </td>
                <td>
                    <?php echo $employee['description']; ?>
                </td>
                <td>
                    <?php echo $employee['salary']; ?>
                </td>
                <td>
                    <?php echo ($employee['gender'] == 1) ? "Male" : (($employee['gender'] == 2) ? "Female" : ''); ?>
                </td>
                <td>
                    <?php
                        $birthday = date('d-m-Y', strtotime($employee['birthday']));
                        echo $birthday;
                    ?>
                </td>
                <td>
                    <?php
                        $created_at = date('d-m-Y H:i:s', strtotime($employee['created_at']));
                        echo $created_at;
                    ?>
                </td>
                <td>
                    <?php
                    $url_details = "index.php?controller=employee&action=details&id=" . $employee['id'];
                    $url_update = "index.php?controller=employee&action=update&id=" . $employee['id'];
                    $url_delete = "index.php?controller=employee&action=delete&id=" . $employee['id'];
                    ?>
                    <a href="<?php echo $url_details; ?>"><i class="fas fa-eye"></i></a>
                    <a href="<?php echo $url_update; ?>"><i class="fas fa-pencil-alt"></i></a>
                    <a href="<?php echo $url_delete; ?>" onclick="return confirm('Bạn có muốn xóa không?')"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>

<?php
require_once 'views/layouts/footer.php';
?>
