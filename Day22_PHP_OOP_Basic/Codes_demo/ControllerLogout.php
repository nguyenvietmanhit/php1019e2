<?php
/**
 * Created by PhpStorm.
 * User: nvmanh
 * Date: 1/15/2020
 * Time: 8:23 AM
 */
class ControllerLogout {
  public function __construct()
  {
    if (!isset($_SESSION['admin'])) {
      header("Location: admin.php");
      exit();
    }
  }
}

$controllerLogout = new ControllerLogout();