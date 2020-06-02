<?php
require_once 'models/User.php';
//backend/controllers/LoginController
class LoginController {
  public $error;
  //nội dung động để hiển thị ra layout
  public $content;
//  Vào file Controller.php copy phương thức render
  /**
   * @param $file string Đường dẫn tới file
   * @param array $variables array Danh sách các biến truyền vào file
   * @return false|string
   */
  public function render($file, $variables = []) {
    //Nhập các giá trị của mảng vào các biến có tên tương ứng chính là key của phần tử đó.
    //khi muốn sử dụng biến từ bên ngoài vào trong hàm
    extract($variables);
    //bắt đầu nhớ mọi nội dung kể từ khi khai báo, kiểu như lưu vào bộ nhớ tạm
    ob_start();
    //thông thường nếu ko có ob_start thì sẽ hiển thị 1 dòng echo lên màn hình
    //tuy nhiên do dùng ob_Start nên nội dung của nó đã đc lưu lại, chứ ko hiển thị ra màn hình nữa
    require_once $file;
    //lấy dữ liệu từ bộ nhớ tạm đã lưu khi gọi hàm ob_Start để xử lý, lấy xong rồi xóa luôn dữ liệu đó
    $render_view = ob_get_clean();

    return $render_view;
  }

  //chức năng đăng ký user
  public function signup() {
    //debug
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    if (isset($_POST['submit'])) {
      //gán các giá trị từ mảng $_POST
      $username = $_POST['username'];
      $password = $_POST['password'];
      $confirm_password = $_POST['confirm_password'];
      //xử lý validate:
//      1-  các trường ko đc để trống
//      2 - Password phải trùng nhau
      if (empty($username) || empty($password)
          || empty($confirm_password)) {
        $this->error = 'Ko đc để trống các trường';
      } else if ($password != $confirm_password) {
        $this->error = 'Password phải trùng nhau';
      }
      //xử lý lưu dữ liệu khi ko có lỗi
      if(empty($this->error)) {
        $user_model = new User();
        $user_model->username = $username;
        //thực tế cần kiểm tra xem đã tồn tại username trong
//        bảng users chưa, nếu chưa tồn tại thì mới cho đăng ký
        //còn ngược lại thì báo username đã tồn tại
        $is_exist_username =
            $user_model->checkExistUsername($username);
        //nếu đã tồn tại username thì báo lỗi, ko cho đăng ký
        if ($is_exist_username) {
          $this->error = "Username $username đã tồn tại";
        } else {
          //chú ý khi lưu password vào csdl, cần
//        sử dụng cơ chế mã hóa, chứ ko lưu thẳng text
          $user_model->password = md5($password);
          $is_register = $user_model->register();
          if ($is_register) {
            $_SESSION['sucess'] = 'Đăng ký thành công';
          } else {
            $_SESSION['error'] = 'Đăng ký thất bại';
          }
          header
          ('Location: index.php?controller=login&action=login');
          exit();
        }


      }
    }
    //lấy nội dung view tương ứng,
    // sau đó gọi layout main_login
    $this->content =
        $this->render('views/users/signup.php', []);
    require_once 'views/layouts/main_login.php';
  }

  public function login() {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    if (isset($_POST['submit'])) {
      //gán giá trị cho biến
      $username = $_POST['username'];
      $password = $_POST['password'];
      //xử lý validate form, các trường ko đc để trống
      if (empty($username) || empty($password)) {
        $this->error = 'Ko đc để trống các trường';
      }
      //xử lý login khi ko có lỗi nào xảy ra
      if (empty($this->error)) {
        $user_model = new User();
        //do đang sử dụng cơ chế mã hóa password = md5
        //nên cần gán lại giá trị cho biến password như sau
        $password = md5($password);
        $user = $user_model->getUserLogin($username, $password);
        //nếu đăng nhập thành công
        if (!empty($user)) {
          //tạo 1 session để lưu lại thông tin user
          $_SESSION['user'] = $user;
          $_SESSION['success'] = 'Đăng nhập thành công';
          header('Location: index.php?controller=category');
          exit();
        } else {
          $this->error = 'Sai toàn khoản hoăc mật khẩu';
        }
      }
    }
    //lấy nội dung view login, sau đó gọi layout main_login
    $this->content =
        $this->render('views/users/login.php', []);
    require_once 'views/layouts/main_login.php';
  }
}