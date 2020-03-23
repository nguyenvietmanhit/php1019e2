<?php
require_once 'models/Employee.php';

class EmployeeController
{
    public $error;

    /**
     * Phương thức thêm nhân viên vào CSDL
     */
    public function create()
    {
        if (isset($_POST['submit'])) {
//          echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
//          print_r($_POST);
//          echo "</pre>";
//          die;
            $name = $_POST['name'];
            $description = $_POST['description'];
            $salary = $_POST['salary'];
//            $_POST['birthday'] = date("d-m-Y", strtotime($_POST['birthday']));

            if (empty($name)) {
                $this->error = "Name không được để trống";
            }

            if (empty($this->error)) {
                $employee_model = new Employee();

                $employee_model->name = $name;
                $employee_model->description = $description;
                $employee_model->salary = $salary;
                $employee_model->gender = $_POST['gender'];
                $employee_model->birthday = $_POST['birthday'];

                $is_insert = $employee_model->insert();
                if ($is_insert) {
                    $_SESSION['success'] = 'Insert thành công';
                } else {
                    $_SESSION['error'] = 'Insert thất bại';
                }

                header("Location: index.php?controller=employee&action=create");
                exit();
            }

        }
        require_once 'views/employees/create.php';
    }

    /**
     * Phương thức liệt kê nhân viên trong CSDL
     */
    public function select()
    {
        $employee_model = new Employee();
        $employees = $employee_model->getAllEmployee();

        require_once 'views/employees/select.php';
    }

    /**
     * Phương thức xem chi tiết một nhân viên
     */
    public function details()
    {
        $id = $_GET['id'];

        $employee_model = new Employee();
        $employee = $employee_model->getEmployeeById($id);

        require_once 'views/employees/details.php';
    }

    /**
     * Phương thức sửa thông tin nhân viên
     */
    public function update()
    {
        $id = $_GET['id'];

        $employee_model = new Employee();
        $employee = $employee_model->getEmployeeById($id);

        if (!$employee) {
            $_SESSION['error'] = 'ID không hợp lệ';
        }

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $salary = $_POST['salary'];
            $_POST['birthday'] = date("Y-m-d", strtotime($_POST['birthday']));

            if (empty($name)) {
                $this->error = "Name không được để trống";
            }

            if (empty($this->error)) {
                $employee_model->name = $name;
                $employee_model->description = $description;
                $employee_model->salary = $salary;
                $employee_model->gender = $_POST['gender'];
                $employee_model->birthday = $_POST['birthday'];
                $employee_model->id = $id;

                $is_update = $employee_model->updateEmployee();

                if ($is_update) {
                    $_SESSION['success'] = 'Update thành công';
                } else {
                    $_SESSION['error'] = 'Update thất bại';
                }

                header("Location: index.php?controller=employee&action=select");
                exit();
            }
        }

        require_once 'views/employees/update.php';
    }

    /**
     * Phương thức xóa nhân viên
     */
    public function delete()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header("Location: index.php?controller=employee");
        }
        $id = $_GET['id'];

        $employee_model = new Employee();
        $is_delete = $employee_model->deleteEmployee($id);

        if ($is_delete) {
            $_SESSION['success'] = 'Xóa thành công';
        } else {
            $_SESSION['error'] = 'Xóa thất bại';
        }

        header('Location: index.php?controller=employee&action=select');
        exit();
    }
}

?>
