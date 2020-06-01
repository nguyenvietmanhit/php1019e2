<!--views/categories/index.php-->
<a href="index.php?controller=category&action=create" class="btn btn-primary">
    <i class="fa fa-plus"></i> Thêm mới
</a>

<!--Hiển thị ra dữ liệu của bảng category thông qua biến $categories-->
<!--truyền từ controller-->
<table class="table table-bordered">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Avatar</th>
        <th>Description</th>
        <th></th>
    </tr>
<!--    views/categories/index.php-->
    <?php if (!empty($categories)): ?>
        <?php foreach($categories AS $category):?>
        <tr>
            <td><?php echo $category['id']; ?></td>
            <td><?php echo $category['name']; ?></td>
            <td>
                <img src="assets/uploads/<?php echo $category['avatar']?>" />
            </td>
            <td>

            </td>
            <td>
                <?php
                $link_update = 'index.php?controller
                =category&action=update&id=' . $category['id'];
                $link_delete = 'index.php?controller
                =category&action=delete&id=' . $category['id'];
                ?>
                <a href="<?php echo $link_update?>">
                    <i class="fa fa-pencil-alt"></i>
                </a>
                <a href="<?php echo $link_delete?>">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    <?php endif; ?>
</table>
<?php echo $pagination; ?>