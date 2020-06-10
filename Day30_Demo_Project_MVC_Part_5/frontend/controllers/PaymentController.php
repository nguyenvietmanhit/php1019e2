<?php
require_once 'controllers/Controller.php';
require_once 'models/Order.php';
require_once 'models/OrderDetail.php';
//nhúng thư viên gửi mail
require_once 'configs/PHPMailer/src/PHPMailer.php';
require_once 'configs/PHPMailer/src/SMTP.php';
require_once 'configs/PHPMailer/src/Exception.php';

class PaymentController extends Controller {
  public function index() {
    //nếu giỏ hàng trống thì ko cho phép truy cập trang này
    if (!isset($_SESSION['cart'])) {
      $_SESSION['error'] = 'Bạn chưa có sản phẩm nào trong giỏ hàng';
      header("Location: index.php");
      exit();
    }

    //xử lý submit form khi user click Thanh toán
    if (isset($_POST['submit'])) {
      //lấy giá trị từ form
      $fullname = $_POST['fullname'];
      $address = $_POST['address'];
      $mobile = $_POST['mobile'];
      $email = $_POST['email'];
      $note = $_POST['note'];
      //check validate
      if (empty($fullname) || empty($address) || empty($mobile)) {
        $this->error = 'Fullname, address, mobile ko đc để trống';
      }

      //xử lý lưu dữ liệu khi ko có lỗi
      if (empty($this->error)) {
        $order_model = new Order();
        $order_model->fullname = $fullname;
        $order_model->address = $address;
        $order_model->mobile = $mobile;
        $order_model->email = $email;
        $order_model->note = $note;
        $price_total = 0;
        //lặp giỏ hàng để lấy ra tổng giá trị đơn hàng
        foreach ($_SESSION['cart'] as $cart) {
          $price_total += $cart['quality'] * $cart['price'];
        }
        $order_model->price_total = $price_total;
        //mặc định là chưa thanh toán
        $order_model->payment_status = 0;
        //lưu vào bảng orders, chú ý phương thức insert sẽ trả về order id vừa lưu
        //vì còn phải lưu cả vào bảng order_details nữa
        $order_id = $order_model->insert();
        //nếu như có giá trị order_id trả về
        if ($order_id > 0) {
          //lưu vào bảng order_details
          $order_detail = new OrderDetail();
          $order_detail->order_id = $order_id;
          //bảng order_details là bảng mô tả chi tiết thông tin về order đó như sản phẩm nào đang có số lượng là bao nhiêu
          //nên cần lặp giỏ hàng để lưu
          foreach ($_SESSION['cart'] AS $product_id => $cart) {
            $order_detail->product_id = $product_id;
            $order_detail->quality = $cart['quality'];
            $order_detail->insert();
          }

          $_SESSION['success'] = 'Bạn đã đặt hàng thành công';
          //tạo message để gửi mail cho kh vừa đặt hàng
          $message = "Cảm ơn bạn đã đặt hàng, $fullname";
          //gửi mail theo địa chỉ email của kh
          $this->sendMail($email, $message);
          //chuyển hướng về trang cảm ơn
          header("Location: cam-on");
          exit();
        } else {
          $_SESSION['error'] = 'Lưu thông tin thanh toán thất bại';
          header("Location: thanh-toan");
          exit();
        }
      }
    }

    $this->content = $this->render('views/payments/index.php');
    require_once 'views/layouts/main.php';
  }

  /*
   * Trang cảm ơn
   */
  public function thank() {
    $this->content = $this->render('views/payments/thank.php');
    require_once 'views/layouts/main.php';
  }

  /**
   * Gửi mail, tham khảo cách sử dụng của thư viện PHPMailer theo link: https://github.com/PHPMailer/PHPMailer
   * @param $email
   */
  protected function sendMail($email, $message) {
    // Instantiation and passing `true` enables exceptions
    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

    try {
      //Server settings
      $mail->SMTPDebug = \PHPMailer\PHPMailer\SMTP::DEBUG_SERVER;                      // Enable verbose debug output
      $mail->isSMTP();
      // Send using SMTP
      //host miễn phí của gmail
      $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      //username gmail của chính bạn
      $mail->Username   = 'nguyenvietmanhit@gmail.com';                     // SMTP username
      //password cho ứng dụng, ko phải password của tài khoảng
//    đăng nhập gmail
//    tạo mật khẩu ứng dụng tại link:
// https://myaccount.google.com/ - menu Bảo mật
      $mail->Password   = 'yichffdzhetottuw';                               // SMTP password
      $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
      $mail->Port       = 587;                                    // TCP port to connect to

      //Recipients
      $mail->setFrom('abc@gmail.com', 'ABC');
      //setting mail người gửi
      $mail->addAddress($email, 'Manh');     // Add a recipient
//    $mail->addAddress('ellen@example.com');               // Name is optional
//    $mail->addReplyTo('info@example.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');

      // Attachments
//      $mail->addAttachment('rose.jpeg');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Cảm ơn bạn đã đặt hàng';
      $mail->Body    = $message;
//    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      echo 'Message has been sent';
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }
}