<!--views/categories/index.php-->
<table>
    <tr>
        <td>ID</td>
        <td>Tên danh mục</td>
    </tr>
    <tr>
        <td>1</td>
        <td>Thể thao</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Thế giới</td>
    </tr>
</table>
<?php
foreach($categories as $category) {
    echo $category['name'];
}
?>
