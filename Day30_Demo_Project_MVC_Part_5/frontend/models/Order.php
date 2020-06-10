<?php
require_once 'models/Model.php';
class Order extends Model {
  //khai báo các thuộc tính của bảng, để phục vụ cho việc insert dữ liệu
  public $fullname;
  public $address;
  public $mobile;
  public $email;
  public $note;
  public $price_total;
  public $payment_status;

  /**
   * Insert vào bảng orders
   * @return bool|string
   */
  public function insert() {
    $sql_insert = "INSERT INTO orders(`fullname`, `address`, `mobile`, `email`, `note`, `price_total`, `payment_status`)
    VALUES (:fullname, :address, :mobile, :email, :note, :price_total, :payment_status)";
    $obj_insert = $this->connection->prepare($sql_insert);
    $arr_insert = [
        ':fullname' => $this->fullname,
        ':address' => $this->address,
        ':mobile' => $this->mobile,
        ':email' => $this->email,
        ':note' => $this->note,
        ':price_total' => $this->price_total,
        ':payment_status' => $this->payment_status,
    ];
    $is_insert = $obj_insert->execute($arr_insert);
    //
    if ($is_insert) {
      //chú ý kết quả trả về của hàm này sẽ là order id vừa insert, vì với logic hiện tại khi lưu vào bảng orders xong,
//      cần lưu cả vào bảng order_details, nên cần biết đc order id vừa insert thì mới có thể lưu đc vào bảng order_details này
      $order_id = $this->connection->lastInsertId();
      return $order_id;
    }

    return FALSE;
  }

  /**
   * Lấy thông tin đơn hàng theo id
   * @param $id
   * @return mixed
   */
  public function getOrder($id) {
    $sql_select = "SELECT * FROM orders WHERE `id` = $id";
    $obj_select = $this->connection->prepare($sql_select);
    $obj_select->execute();

    return $obj_select->fetch(PDO::FETCH_ASSOC);
  }
}