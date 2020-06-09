<?php
//controllers/PaymentController.php
require_once 'controllers/Controller.php';
class PaymentController extends Controller {
  //hiển thị form thanh toán
  public function index() {
    //check nếu ko tồn tại giỏ hàng sẽ ko truy cập đc trang này
    if (!isset($_SESSION['cart'])) {
      $_SESSION['error'] = 'Chưa có sp thì vào đây làm gì';
      $url_redirect = $_SERVER['SCRIPT_NAME'] .'/';
      header("Location: $url_redirect");
      exit();
    }

    //kiểm tra nếu submit form - user click Thanh toán thì xử lý
    if (isset($_POST['submit'])) {
      //lấy giá trị
      echo "<pre>";
      print_r($_POST);
      echo "</pre>";

      $email = $_POST['email'];
      //xử lý validate
      //lưu thông tin đơn hàng
      if (empty($this->error)) {
        //lưu vào bảng orders thông tin đơn hàng
//        khởi tạo đối tượng từ class Order
        sau đó gọi phương thức insert() để lưu vòa bảng
//        orders
        //sau khi lưu vào bảng orders thì cần lưu vào
//        cả bảng order_details nữa
        //khi lưu vào bảng orders, cần lấy đc id order
//        vừa lưu
      }
    }

    //lấy nội dung view và gọi layout để hiển thị ra
    $this->content = $this->render('views/payments/index.php');
    require_once 'views/layouts/main.php';
  }
}