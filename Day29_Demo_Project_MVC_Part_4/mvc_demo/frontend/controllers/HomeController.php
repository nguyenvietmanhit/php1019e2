<?php
require_once 'controllers/Controller.php';

class HomeController extends Controller {

  public function index() {
    //lấy thông tin sản phẩm, và hiển thị ra trang chủ
    $this->content = $this->render('views/homes/index.php');
    require_once 'views/layouts/main.php';
  }
}