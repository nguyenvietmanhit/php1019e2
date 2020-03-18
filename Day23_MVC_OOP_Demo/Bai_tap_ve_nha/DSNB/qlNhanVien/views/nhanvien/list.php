<?php
require_once "./views/layouts/header.php";
?>
<div class="container" style="width: fit-content; height: auto">
    <h3>Employees List</h3>
    <hr/>
    <a href="<?php echo "index.php?controller=nhanvien&action=create"; ?>" class="btn btn-success">+ add new employee</a>
    <p></p>
    <table cellspacing="0" cellpadding="10px" border="1px">
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Gender</th>
            <th>Salary</th>
            <th>Birthday</th>
            <th>Created_at</th>
            <th style="width: 100px; text-align: center">Action</th>
        </tr>
        <?php if (empty($employees)): ?>
            <tr>
                <td colspan="8">Khong co ban ghi nao</td>
            </tr>
        <?php else: ?>
            <?php foreach ($employees as $employee): ?>
                <tr>
                    <td><?php echo $employee['id'] ?></td>
                    <td><?php echo $employee['name'] ?></td>
                    <td><?php echo $employee['description'] ?></td>
                    <td>
                        <?php if ($employee['gender'] == 1) {
                            echo "Male";
                        } else {
                            echo "Female";
                        }
                        ?>
                    </td>
                    <td><?php echo $employee['salary'] ?></td>
                    <td><?php echo $employee['birthday'] ?></td>
                    <td>
                        <?php
                        $created_at = date('d-m-Y:H:i:s', strtotime($employee['created_at']));
                        echo $created_at;
                        ?>
                    </td>
                    <td style="text-align: center">
                        <?php
                        $url_detail = "index.php?controller=nhanvien&action=detail&id=" . $employee['id'];
                        $url_update = "index.php?controller=nhanvien&action=update&id=" . $employee['id'];
                        $url_delete = "index.php?controller=nhanvien&action=delete&id=" . $employee['id'];
                        ?>
                        <a href="<?php echo $url_detail; ?>"><i class="far fa-eye"></i></a>
                        <a href="<?php echo $url_update; ?>"><i class="fas fa-pen"></i></a>
                        <a href="<?php echo $url_delete; ?>"
                           onclick="return confirm('\n'+
                            'Do you want to delete this record?')">
                            <i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
</div>
<?php
require_once "./views/layouts/footer.php";
?>

