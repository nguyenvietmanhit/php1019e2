<?php
require_once 'controllers/Controller.php';

class HomeController extends Controller {
  public function index() {

    $this->content = $this->render('views/homes/index.php');
    require_once 'views/layouts/main.php';
  }
}