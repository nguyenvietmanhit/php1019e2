<?php
/**
 * Created by PhpStorm.
 * User: tu901
 * Date: 2/29/2020
 * Time: 3:36 PM
 */
require_once "view/layouts/header.php"
?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
<link rel="stylesheet" href="css/all.min.css">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3>Employees List</h3>
        </div>
        <div class="col-md-6">
            <button class="btn btn-success" ><a style="color: white" href="index.php?action=create" >+ New Employee</a></button>
        </div>
    </div>
    <table border ="1" cellspacing = "0" cellpadding = "10">
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
        <?php if(empty($employees)):?>
            <tr>
                <td colspan="6">NO DATA</td>
            </tr>
        <?php else :?>
            <?php foreach ($employees as $employee):?>
                <tr>
                    <td><?php echo $employee['id']?></td>
                    <td><?php echo $employee['name']?></td>
                    <td><?php echo $employee['description']?></td>
                    <td><?php echo $employee['salary']?></td>
                    <td><?php if ($employee['gender'] == 1){
                            echo "Male";
                        }
                        else {
                            echo "Female";
                        }?></td>
                    <td><?php echo date("d/m/Y", strtotime($employee['birthday']))?></td>
                    <td><?php echo date("d-m-Y H:i:s",strtotime($employee['created_at'])) ?></td>
                    <td><a href="index.php?id=<?php echo $employee['id'];?>&action=detail"><i class="fas fa-eye"></i></a>
                        <a href="index.php?id=<?php echo $employee['id'];?>&action=update"><i class="fas fa-pencil-alt"></i></a>
                        <a href="index.php?id=<?php echo $employee['id'];?>&action=delete"
                           onclick="return confirm('DO YOU WANNA DELETE')" ><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>

            <?php endforeach;?>
        <?php endif;?>
    </table>
</div>
<?php
require_once "view/layouts/footer.php"
?>