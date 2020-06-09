<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
class HomeController extends Controller {
  public function index() {

    //lấy nội dung sản phẩm trong CSDL để hiển thị ra
//    trang chủ
    $product_model = new Product();
    $products = $product_model->getProductHomePage();
//    echo "<pre>";
//    print_r($products);
//    echo "</pre>";
    $this->content = $this->render('views/homes/index.php', [
        'products' => $products
    ]);
    require_once 'views/layouts/main.php';
  }
}