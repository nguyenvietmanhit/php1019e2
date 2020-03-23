<?php

class Employee
{
    const DB_DSN = 'mysql:host=localhost;dbname=employee_mvc;charset=utf8';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';

    public $id;

    public $name;
    public $description;
    public $salary;
    public $gender;
    public $birthday;

    public function getConnection()
    {
        try {
            $connection = new PDO(self::DB_DSN,
                self::DB_USERNAME,
                self::DB_PASSWORD);
        } catch (PDOException $e) {
            die("Kết nối thất bại: " . $e->getMessage());
        }
        return $connection;
    }

    public function insert(){
        $connection = $this->getConnection();
        $obj_insert = $connection
            ->prepare("INSERT INTO employees(`name`, `description`, `salary`, `gender`, `birthday`) 
                                VALUES (:name, :description, :salary, :gender, :birthday )");

        $arr_insert = [
            ':name' => $this->name,
            ':description' => $this->description,
            ':salary' => $this->salary,
            ':gender' => $this->gender,
            ':birthday' => $this->birthday,
        ];

        $is_insert = $obj_insert->execute($arr_insert);
        return $is_insert;
    }

    public function getAllEmployee(){
        $connection = $this->getConnection();
        $obj_select = $connection->prepare("SELECT * FROM employees");
        $obj_select->execute();
        $employees = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $employees;
    }

    public function getEmployeeById($id){
        $connection = $this->getConnection();
        $obj_details = $connection
            ->prepare("SELECT * FROM employees WHERE id = :id");

        $arr_details = [
            ':id' => $id,
        ];
        $obj_details->execute($arr_details);
        $employees = $obj_details->fetchAll(PDO::FETCH_ASSOC);

        if (empty($employees)){
            return false;
        }

        return $employees[0];
    }

    public function updateEmployee(){
        $connection = $this->getConnection();
        $obj_update = $connection
            ->prepare("UPDATE employees 
        SET `name` = :name, `description` = :description, `salary` = :salary, `gender` = :gender, `birthday` = :birthday WHERE id = :id");

        $arr_update = [
            ':name' => $this->name,
            ':description' => $this->description,
            ':salary' => $this->salary,
            ':gender' => $this->gender,
            ':birthday' => $this->birthday,
            ':id' => $this->id,
        ];

        return $obj_update->execute($arr_update);
    }

    public function deleteEmployee($id){
        $connection = $this->getConnection();
        $obj_delete = $connection->prepare("DELETE FROM employees WHERE id = $id");

        return $obj_delete->execute();
    }
}

?>
