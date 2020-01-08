<?php
session_start();
require_once "config.php";

$sqlSelect = "SELECT * FROM employees";
$result = mysqli_query($connection, $sqlSelect);
$categories = [];
if(mysqli_num_rows($result) > 0){
    $categories = mysqli_fetch_all($result,MYSQLI_ASSOC);
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title >Emplyess List</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
</head>
<body>

    <div class="row">
        <div class="col-md-8"><h2>Employees</h2></div>
        <div class="col-md-4">
            <button type="button" class="btn btn-success">
                <a href="create.php" style="text-decoration: none;color:white">
                    + Add New Employee
                </a></button>
        </div>
    </div>
    <table border="1" cellpadding="10" cellspacing="1" style="width: 100%;">
        <tr style="">
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Salary</th>
            <th>Gender</th>
            <th>birthday</th>
            <th>Created_at</th>
            <th>Action</th>
        </tr>

            <?php if (empty($categories)):?>
            <tr>
                <td colspan="8">Chưa thêm bản ghi nào cả</td>
            </tr>
            <?php else :?>
                <?php foreach ($categories as $category):?>
                    <tr>
                        <td><?php echo $category['id']?></td>
                        <td><?php echo $category['name']?></td>
                        <td><?php echo $category['description']?></td>
                        <td><?php echo $category['salary']?></td>
                        <td><?php echo $category['gender']?></td>
                        <td><?php echo $category['birthday']?></td>
                        <td><?php echo $category['created_at']?></td>
                        <td>
                            <a href = "detail.php?id=<?php echo $category['id']?>">
                                <i class="far fa-eye"></i>
                            </a>
                            <a href = "update.php?id=<?php echo $category['id']?>">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"
                               href="delete.php?id=<?php echo $category['id'] ?>">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>



                <?php endforeach;?>
            <?php endif; ?>
    </table>


</body>
</html>
