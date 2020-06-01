<?php
require_once 'models/Model.php';
//models/Category.php
class Category extends Model {
  //khai báo các thuộc tính của category
  public $id;
  public $name;
  public $avatar;
  public $description;
  public $status;
  public $created_at;
  public $updated_at;
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

  public function insert()
  {
    $connection = $this->getConnection();
    //chuẩn bị câu truy vấn
    $obj_insert = $connection->prepare("INSERT INTO categories(`name`, `avatar`, `description`, `status`) VALUES (:name, :avatar, :description, :status)");
    //gán giá trị cho các param trong câu truy vấn
    $arr_insert = [
      ':name' => $this->name,
      ':avatar' => $this->avatar,
      ':description' => $this->description,
      ':status' => $this->status,
    ];

    return $obj_insert->execute($arr_insert);
  }

  public function getAllPagination($params) {
        $limit = $params['limit'];
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        //giả sử đang ở trang 2, mỗi trang hiển thị 5 bản ghi
        //=> sẽ lấy từ bản ghi thứ máy trong bảng ?
        $start = ($page - 1) * $limit; // 5 - > 10
      $connection = $this->getConnection();
      $obj_select = $connection
          ->prepare("SELECT * FROM categories LIMIT $start,$limit");
      $obj_select->execute();
      return $obj_select->fetchAll(PDO::FETCH_ASSOC);
  }
}