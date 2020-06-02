<?php
require_once 'controllers/Controller.php';
//xử lý giỏ hàng - thêm, sửa, xóa, liệt kê giỏ hang
//controllers/CartController.php
class CartController extends Controller {
  public function add() {
    //giỏ hàng thường sẽ dùng session để lưu
    //và cấu trúc của giỏ hàng để tiện thao tác nhất sẽ có
//    cấu trúc như sau, với key sẽ là id của sản phẩm
    $carts = [
      1 => [
          'name' => 'ABC',
          'price' => 12000,
          'avatar' => 'image.jpg',
          'quality' => 2
      ],
      4 => [
          'name' => 'SP4',
          'price' => 3000,
          'avatar'=> 'img4-jpg',
          'quality' => 1
      ]
    ];
    //xử lý thêm sản phẩm vào giỏ hàng
    //nếu là lần dầu tiên, thì khi đó giỏ hàng chưa tồn tại, thì
//    sẽ tạo mới giỏ hàng và thêm sản phẩm đó vào
    $product_id = $_GET['id'];
    if (!isset($_SESSION['cart'])) {
      //lấy thông tin sản phẩm  từ bảng products
      //theo id vừa bắt được
      $product_model = new Product();
      $product = $product_model->getById($product_id);
      //giả sử đã lấy đc thông tin product
      $cart_obj = [
          'name' => $product['name'],
          'price' => $product['price'],
          'avatar' => $product['avatar'],
          'quality' => 1
      ];
      //khởi tạo mới giỏ hàng
      $_SESSION['cart'][$product_id] = $cart_obj;
      //chuyển hướng về trang danh sách giỏ hàng
    }
  }
}