<?php
//controllers/CartController.php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
class CartController extends Controller{
  //Xử lý add vào giỏ hàng
  public function add() {
    //do đường dẫn rewrite đã bắt buộc phải truyền id dạng số
//    nên ko cần bắt validate bằng PHP nữa
    $id = $_GET['id'];
    //lấy ra thông tin của sản phẩm, để thêm vào giỏ hàng
    $product_model = new Product();
    $product = $product_model->getById($id);
//    echo "<pre>";
//    print_r($product);
//    echo "</pre>";

    //tạo ra 1 mảng chứa các thông tin để thêm vào giỏ hàng
    $product_cart = [
        'name' => $product['title'],
        'price' => $product['price'],
        'avatar' => $product['avatar'],
        //do chức năng thêm giỏ hàng đang là chuyển trang, nên
      //mặc định mỗi lần click THêm vào giỏ hàng là chọn 1 sản phẩm
        'quality' => 1
    ];

    //giỏ hàng thường sẽ dùng session để lưu để tiết kiệm dung lương
//    thay vì lưu vào CSDL
    //trường hợp 1: giỏ hàng chưa từng tồn tại, thì với trường hợp
//    này sẽ cần tạo mới giỏ hàng, và thêm phần tử đầu tiên cho giỏ hàng
      if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'][$id] = $product_cart;
      }
      //trường hợp 2: đã tồn tại giỏ hàng r
      //thì lại có 2 trường hợp xảy ra
      else {
        //trường hợp 1: thêm sản phẩm chưa tồn tại trong giỏ hàng
        if (!array_key_exists($id, $_SESSION['cart'])) {
          $_SESSION['cart'][$id] = $product_cart;
        }
        //trường hợp 2: thêm sản phẩm đã tồn tại trong giỏ hàng
        //tăng quality lên 1
        else {
          $_SESSION['cart'][$id]['quality']++;
        }
      }
//      echo "<pre>";
//      print_r($_SESSION['cart']);
//      echo "</pre>";
    //chuyển hướng người dùng về trang Giỏ hang của bạn
    //khi sử dụng rewrite, cần phải set lại url
    //SCRIPT_NAME của $_SERVER sẽ trả về đường dẫn url tới file
//    index.php gốc ứng dụng
//    die("dsa");
    $url_redirect = $_SERVER['SCRIPT_NAME'] . '/gio-hang-cua-ban';
    header("Location: $url_redirect");
      exit();
//    Giỏ hàng xây dựng sẽ kiểu như sau
//    $cart = [
//        6 => [
//          'name' => 'Tivi',
//          'price' => 123,
//          'avatar' => 'abc.jpg',
//          'quality' => 2
//        ]
//    ];
  }

  public function index() {
    //nếu như chưa tồn tại giỏ hàng thì chuyển hướng về trang
//    chủ kèm theo thông báo
    if (!isset($_SESSION['cart'])) {
      $_SESSION['error'] = 'Làm gì có vào sản phẩm mà vào đây';
      //chuyển hướng sử dụng $_SERVER['SCRIPT_NAME]
      $url_redirect = $_SERVER['SCRIPT_NAME'] . '/';
      header("Location: $url_redirect");
      exit();
    }

    //xử lý update giỏ hàng khi user click nút Cập nhật giỏ hàng
    if (isset($_POST['submit'])) {
      //lặp giỏ hàng, dựa theo product id để gán lại quality dựa
//      vào mảng $_POST vừa bắt đc
      foreach ($_SESSION['cart'] AS $product_id => $product) {
        //gán lại số lượng từ việc submit form của user
        $_SESSION['cart'][$product_id]['quality'] = $_POST[$product_id];
      }
    }

    //lấy ra view index của cart
    $this->content = $this->render('views/carts/index.php');
    require_once 'views/layouts/main.php';
  }

  //xóa sản phẩm khỏi giỏ hàng
  public function delete() {
    //lấy id sp dựa vào url đã rewrite
    $id = $_GET['id'];
    //xóa phần tử khỏi mảng dựa theo id
    unset($_SESSION['cart'][$id]);
    //check nếu như xóa hết sản phẩm trong giỏ hàng
    //thì tương đương giỏ hàng trống -> xóa luôn giỏ hàng
    if (empty($_SESSION['cart'])) {
      unset($_SESSION['cart']);
    }
    $_SESSION['success'] = 'Xóa sản phẩm thành công';
    $url_redirect = $_SERVER['SCRIPT_NAME'] . '/gio-hang-cua-ban';
    header("Location: $url_redirect");
    exit();
  }
}