<?php
/**
 * Created by PhpStorm.
 * User: tu901
 * Date: 2/29/2020
 * Time: 3:25 PM
 */

require_once "model/employee.php";
class EmployeeController
{
    public $error;
    public function error() {
        require_once "view/employees/error404.php";
    }
    public function create()
    {

        if (isset($_POST['submit'])) {
            $employees_model = New employee();
            if (empty($_POST['name'])) {
                $this->error = 'Không được để trống trường name';
            } elseif (empty($_POST['description'])) {
                $this->error = 'Không được để trống mô tả';
            } elseif (empty($_POST['salary'])) {
                $this->error = 'Không nhập khoản lương';
            } elseif (!isset($_POST['gender'])) {
                $this->error = 'Cần khai báo giới tính';
            } elseif (empty($_POST['birthday'])) {
                $this->error = 'Cần nhập ngày sinh';
            } else {
                $employees_model->name = $_POST['name'];
                $employees_model->description = $_POST['description'];
                $employees_model->salary = $_POST['salary'];
                $_POST['birthday'] = date("Y-m-d H:i:s", strtotime($_POST['birthday']));
                $employees_model->birthday =$_POST['birthday'];
                $employees_model->gender = $_POST['gender'];
                $is_insert = $employees_model->insert();
                $_SESSION['success'] = "Them thanh cong";
                header("Location: index.php?controller=employee&action=listEmployee");
                exit();
            }
            $_SESSION['error'] = $this->error;
            header("Location: index.php?controller=employee&action=create");
            exit();
        }
        require_once "view/employees/create.php";

    }
    public function listEmployee(){
        $employees_model = New employee();
        $employees = $employees_model ->select();
            require_once "view/employees/list.php";


    }
    public function detail() {
        if (!isset($_GET['id'])){
            $_SESSION['error'] = "Không tìm thấy dữ liệu";
            header("Location: index.php");
            exit();
        }
        else {
            $employees_model = New employee();
            $employee = $employees_model->detail();
            if (!$employee) {
                $_SESSION['error'] = "Trang không tồn tại";
                header("Location: index.php?action=error");
                exit();
            }
            if (empty($employee)) {
                $_SESSION['error'] = "Nhan vien khong co hoac da xoa";
            }
        }
        require_once "view/employees/detail.php";


    }
    public function update () {
        if (!isset($_GET['id'])){
            $_SESSION['error'] = "Không tìm thấy dữ liệu";
            header("Location: index.php");
            exit();
        }
        else {
            $employees_model = New employee();
            $employee = $employees_model->detail();
            if (!$employee) {
                $_SESSION['error'] = "Trang không tồn tại";
                header("Location: index.php?action=error");
                exit();
            }
            if (isset($_POST['reset'])){
                header("Location: index.php");
                exit();
            }
            if (isset($_POST['submit'])) {

                if (empty($_POST['name'])) {
                    $this->error = 'Không được để trống trường name';
                } elseif (empty($_POST['description'])) {
                    $this->error = 'Không được để trống mô tả';
                } elseif (empty($_POST['salary'])) {
                    $this->error = 'Không nhập khoản lương';
                } elseif (!isset($_POST['gender'])) {
                    $this->error = 'Cần khai báo giới tính';
                } elseif (empty($_POST['birthday'])) {
                    $this->error = 'Cần nhập ngày sinh';
                } else {
                    $employees_model->name = $_POST['name'];
                    $employees_model->description = $_POST['description'];
                    $employees_model->salary = $_POST['salary'];
                    $_POST['birthday'] = date("Y-m-d H:i:s", strtotime($_POST['birthday']));
                    $employees_model->birthday =$_POST['birthday'];
                    $employees_model->gender = $_POST['gender'];
                    $is_insert = $employees_model->update();
                    $_SESSION['success'] = "UPDATE THÀNh CÔNG";
                    header("Location: index.php");
                    exit();
                }

                $_SESSION['error'] = $this->error;
                header("Location: index.php?".$_GET['id']."controller=employee&action=update");
                exit();
            }
            require_once "view/employees/update.php";
        }
    }
    public function delete()
    {
        if (!isset($_GET['id'])) {
            $_SESSION['error'] = "Không tìm thấy dữ liệu";
            header("Location: index.php");
            exit();
        }
        $employees_model = New employee();
        $is_delete = $employees_model->delete();
        if ($is_delete) {
            $_SESSION['success'] = "XÓA BẢN GHI THÀNH CÔNG";
        }
        else {
            $_SESSION['error'] = "Xóa Bản Ghi XỊT";
        }
        header("Location: index.php");
        exit();
    }

}