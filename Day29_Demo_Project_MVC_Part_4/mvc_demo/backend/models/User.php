<?php
//tất cả các class model con đều kế thừa từ class
//model cha là Model.php
//để có thể sử dụng được thuộc tính $connection
require_once 'models/Model.php';
//models/User.php
class User extends Model {
  //khai báo 1 số trường trong bảng users để lưu
//  dữ liệu
  public $username;
  public $password;

  public function register() {
    //do đã kế thừa từ class Model.php nên có thể
//    sử dụng được luôn biến kết nối $connection
    //chuẩn bị câu truy vấn
    $obj_insert = $this->connection
        ->prepare("INSERT INTO users(`username`, `password`)
VALUES (:username, :password);
");
//gán giá trị cho các placeholder
    $arr_insert = [
        ':username' => $this->username,
        ':password' => $this->password
    ];
    //thực thi truy vấn
    $is_insert = $obj_insert->execute($arr_insert);
    return $is_insert;
  }

  public function checkExistUsername($username) {
    //cbi câu truy vấn
    $obj_select = $this->connection
        ->prepare("SELECT * FROM users 
        WHERE `username` = :username");
    //gán giá trị cho các placeholder nếu có
    $arr_select = [
        ':username' => $username
    ];
    $obj_select->execute($arr_select);
    //trong trường hợp mà kết quả truy vấn trả về chỉ có đúng
//    1 bản ghi duy nhất , dùng phương thức fetch
    //còn trường hợp trả về nhiều bản ghi thì vẫn dùng fetchAll
    $user = $obj_select->fetch(PDO::FETCH_ASSOC);
    if (!empty($user)) {
      return TRUE;
    }
    return FALSE;
  }

  public function getUserLogin($username, $password) {
    //tạo câu truy vấn
    $obj_select =
        $this->connection
        ->prepare("SELECT * FROM users WHERE
        `username` = :username AND `password` = :password ");
    //gán giá trị thật cho các placeholder nếu có
    $arr_select = [
      ':username' => $username,
      ':password' => $password
    ];
    //thực thi truy vấn, với truy vấn select thì phải qua 1 số
    //bước trung gian
    $obj_select->execute($arr_select);
    $user = $obj_select->fetch(PDO::FETCH_ASSOC);
    return $user;
  }
}