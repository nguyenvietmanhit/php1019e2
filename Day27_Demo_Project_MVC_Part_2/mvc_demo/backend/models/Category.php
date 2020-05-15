<?php
require_once 'models/Model.php';
//models/Category.php
class Category extends Model {
    public function getAll() {
        $connection = $this->getConnection();
        //cbi câu truy vấn
        $obj_select = $connection
            ->prepare("SELECT * FROM categories");
        //gán các tham số nếu có
        $obj_select->execute();
        $categories = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $categories;
    }
}