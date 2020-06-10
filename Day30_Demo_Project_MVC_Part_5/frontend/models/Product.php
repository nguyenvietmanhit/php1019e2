<?php
//models/Product.php
//nhúng class cha vào để sử dụng đc biến $connection
require_once 'models/Model.php';
class Product extends Model {

  //Lấy thông tin tất cả sản phẩm đang có trong bảng product
  //với điều kiện sản phẩm đó đang ở chế độ active
  //do đang cần lấy cả tên danh mục tương ứng với sản phẩm,
  //nên cần phải join vào bảng categories
  public function getProductHomePage() {
    //tạo câu truy vấn
    //nếu có join bảng thì cần chú ý khi thao tác với trường
    //phải có tên bảng đi trước
    $sql_select = "SELECT products.*, 
    categories.name AS category_name
    FROM products
    INNER JOIN categories ON products.category_id = categories.id
    ";
    //tạo đối tượng select
    $obj_select = $this->connection
        ->prepare($sql_select);
    //thực thi truy vấn, do câu truy vấn ko có dạng placeholder
    // nên ko cần bước gán dữ liệu thật
    $obj_select->execute();
    $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }

  //lấy thông tin sản phẩm theo id
  public function getById($id) {
    //tạo câu truy vấn
    //với các giá trị mà biết chắn chắn là số, thì ko cần sử
    //dụng kiểu placeholder
    $sql_select_one = "SELECT * FROM products WHERE id = $id";
    //tạo đối tượng select
    $obj_select_one = $this->connection
        ->prepare($sql_select_one);
    $obj_select_one->execute();
    $product = $obj_select_one->fetch(PDO::FETCH_ASSOC);
    return $product;
  }
}