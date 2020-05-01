<?php
require_once 'models/Model.php';

class Category extends Model
{
  //khai báo các thuộc tính của category
  public $id;
  public $name;
  public $avatar;
  public $description;
  public $status;
  public $created_at;
  public $updated_at;

  public function insert()
  {
    //chuẩn bị câu truy vấn
    $obj_insert = $this->connection->prepare("INSERT INTO categories(`name`, `avatar`, `description`, `status`) VALUES (:name, :avatar, :description, :status)");
    //gán giá trị cho các param trong câu truy vấn
    $arr_insert = [
      ':name' => $this->name,
      ':avatar' => $this->avatar,
      ':description' => $this->description,
      ':status' => $this->status,
    ];

    return $obj_insert->execute($arr_insert);
  }

  /**
   * Lấy toàn bộ các bản ghi dựa theo mảng param truyền vào - không có phân trang
   * @param array $params
   * @return array
   */
  public function getAll($params = [])
  {
    $str_like = '';
    $arr_select = [];
    //nếu có tham số name, hay search theo name, thì tạo câu truy vấn like theo cú pháp PDO
    //và set key cho mảng arr_select tương ứng
    if (isset($params['name'])) {
      $str_like .= ' WHERE `name` LIKE :name';
    }
    //gán thêm chuỗi truy vấn like nếu có vào câu truy vấn
    $obj_select = $this->connection->prepare("SELECT * FROM categories $str_like");

    $obj_select->execute($arr_select);
    $categories = $obj_select->fetchAll(PDO::FETCH_ASSOC);

    return $categories;
  }

  /**
   * Lấy toàn bộ các bản ghi dựa theo mảng param truyền vào - có phân trang
   * @param array $params
   * @return array
   */
  public function getAllPagination($params = [])
  {
    $str_like = '';
    //xử lý tìm kiếm nếu có
    if (isset($params['name'])) {
      $str_like .= " WHERE `name` LIKE '%{$params['name']}%'";
    }

    $limit = $params['limit'];
    $page = $params['page'];
    $start = ($page - 1) * $limit;
    //gán thêm chuỗi truy vấn like nếu có vào câu truy vấn
    $obj_select = $this->connection->prepare("SELECT * FROM categories $str_like LIMIT :start, :limit");

//    do PDO coi tất cả các param luôn là 1 string, nên cần sử dụng bindValue / bindParam cho các tham số start và limit
    $obj_select->bindParam(':limit', $limit, PDO::PARAM_INT);
    $obj_select->bindParam(':start', $start, PDO::PARAM_INT);
    $obj_select->execute();
    $categories = $obj_select->fetchAll(PDO::FETCH_ASSOC);

    return $categories;
  }

  /**
   * Lấy category theo id truyền vào
   * @param $id
   * @return array
   */
  public function getCategoryById($id)
  {
    $obj_select = $this->connection->prepare('SELECT * FROM categories WHERE id = :id');
    $arr_select = [
      ':id' => $id
    ];

    $obj_select->execute($arr_select);

    $categories = $obj_select->fetchAll(PDO::FETCH_ASSOC);
    if (isset($categories[0])) {
      return $categories[0];
    }

    return [];
  }

  /**
   * Update bản ghi theo id truyền vào
   * @param $id
   * @return bool
   */
  public function update($id)
  {
    $obj_update = $this->connection->prepare("UPDATE categories SET `name` = :name, `avatar` = :avatar, `description` = :description, `status` = :status, `updated_at` = :updated_at 
         WHERE id = $id");
    $arr_update = [
      ':name' => $this->name,
      ':avatar' => $this->avatar,
      ':description' => $this->description,
      ':status' => $this->status,
      ':updated_at' => $this->updated_at,
    ];

    return $obj_update->execute($arr_update);
  }

  /**
   * Xóa bản ghi theo id truyền vào
   * @param $id
   * @return bool
   */
  public function delete($id)
  {
    $obj_delete = $this->connection->prepare("DELETE FROM categories WHERE id = $id");
    $is_delete = $obj_delete->execute();;
    //để đảm bảo toàn vẹn dữ liệu, sau khi xóa category thì cần xóa cả các product nào đang thuộc về category này
    $obj_delete_product = $this->connection->prepare("DELETE FROM products WHERE category_id = $id");
    $obj_delete_product->execute();

    return $is_delete;
  }

  /**
   * Lấy tổng số bản ghi trong bảng categories theo mảng params truyền vào
   * @param array $params
   * @return mixed
   */
  public function countTotal($params = [])
  {
    $str_like = '';
    //xử lý tìm kiếm nếu có
    if (isset($params['name'])) {
      $str_like .= " WHERE `name` LIKE '%{$params['name']}%'";
    }
    $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM categories $str_like");
    $obj_select->execute();

    return $obj_select->fetchColumn();
  }
}