<h2>Thêm mới danh mục</h2>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label>Tên danh mục</label>
        <input type="text" name="name" value="" class="form-control"/>
    </div>

    <div class="form-group">
        <label>Ảnh đại diện</label>
        <input type="file" name="avatar" class="form-control" />
    </div>

    <div class="form-group">
        <label>Mô tả</label>
        <textarea class="form-control" name="description"></textarea>
    </div>

    <div class="form-group">
        <label>Trạng thái</label>
        <select name="status" class="form-control">
            <option value="0">Actice</option>
            <option value="1">Disabled</option>
        </select>
    </div>

    <input type="submit" class="btn btn-primary" name="submit" value="Save" />
</form>