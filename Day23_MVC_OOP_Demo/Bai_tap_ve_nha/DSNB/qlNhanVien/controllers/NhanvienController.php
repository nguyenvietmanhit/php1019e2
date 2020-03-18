<?php
require_once "models/Nhanvien.php";

class NhanvienController
{
    public $error;

    public function delete()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID khong hop le';
            header("Location:index.php?controller=nhanvien&action=list");
            exit();
        }
        $id = $_GET['id'];
        $nhanvien_model = new Nhanvien();
        $is_delete = $nhanvien_model->deleteEmployee($id);
        if ($is_delete) {
            $_SESSION['success'] = "Delete successfully";
        } else {
            $_SESSION['error'] = "Delete failed";
        }
        header("Location:index.php?controller=nhanvien&action=list");
        exit();
    }

    public function update()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID khong hop le';
            header("Location:index.php?controller=nhanvien&action=list");
            exit();
        }
        $id = $_GET['id'];

        $nhanvien_model = new Nhanvien();
        $employee = $nhanvien_model->getById($id);

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $salary = $_POST['salary'];
            if (isset($_POST['gender'])) {
                $gender = $_POST['gender'];
            } else {
                $gender = '';
            }
            $birthday = $_POST['birthday'];

            if (empty($name)) {
                $this->error = "Name khong duoc de trong";
            }
            if (empty($this->error)) {
                $nhanvien_model = new Nhanvien();
                $nhanvien_model->name = $name;
                $nhanvien_model->description = $description;
                $nhanvien_model->salary = $salary;
                $nhanvien_model->gender = $gender;
                $nhanvien_model->birthday = $birthday;
                $nhanvien_model->id = $id;

                $is_update = $nhanvien_model->updateEmployee();
                if ($is_update) {
                    $_SESSION['success'] = "update successfully";
                } else {
                    $_SESSION['error'] = "update failed";
                }
                header("Location:index.php?controller=nhanvien&action=list");
                exit();
            }
        }

        require_once "./views/nhanvien/update.php";
    }

    public function detail()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID khong hop le';
            header("Location:index.php?controller=nhanvien&action=list");
            exit();
        }
        $id = $_GET['id'];

        $nhanvien_model = new Nhanvien();
        $employee = $nhanvien_model->getById($id);

        require_once "./views/nhanvien/detail.php";
    }

    public function list()
    {
        $employees_model = new Nhanvien();
        $employees = $employees_model->getAllEmployees();
        require_once "./views/nhanvien/list.php";
    }

    public function create()
    {
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $salary = $_POST['salary'];
            if (isset($_POST['gender'])) {
                $gender = $_POST['gender'];
            } else {
                $gender = '';
            }
            $birthday = $_POST['birthday'];

            if (empty($name)) {
                $this->error = "Name khong duoc de trong";
            }
            if (empty($this->error)) {
                $nhanvien_model = new Nhanvien();
                $nhanvien_model->name = $name;
                $nhanvien_model->description = $description;
                $nhanvien_model->salary = $salary;
                $nhanvien_model->gender = $gender;
                $nhanvien_model->birthday = $birthday;

                $is_insert = $nhanvien_model->insert();
                if ($is_insert) {
                    $_SESSION['success'] = "Them moi thanh cong";
                } else {
                    $_SESSION['error'] = "Them moi that bai";
                }
                header("Location:index.php?controller=nhanvien&action=list");
                exit();
            }
        }
        require_once "views/nhanvien/create.php";
    }
}