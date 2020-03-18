<?php

class Nhanvien
{
    const DB_DSN = 'mysql:host=localhost;dbname=ql_nhan_vien;charset=utf8';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';

    public $name;
    public $description;
    public $salary;
    public $gender;
    public $birthday;
    public $id;

    public function getConnection()
    {
        try {
            $connection = new PDO(self::DB_DSN, self::DB_USERNAME, self::DB_PASSWORD);
        } catch (PDOException $e) {
            die("Ket noi that bai" . $e->getMessage());
        }
        return $connection;
    }


    public function insert()
    {
        $connection = $this->getConnection();
        $obj_insert = $connection->prepare(
            "INSERT INTO employees(`name`, `description`, `gender`, `salary`, `birthday`)
                                    VALUES(:name, :description, :gender, :salary, :birthday);");
        $arr_inset = [
            ':name' => $this->name,
            ':description' => $this->description,
            ':gender' => $this->gender,
            ':salary' => $this->salary,
            ':birthday' => $this->birthday
        ];
        $is_insert = $obj_insert->execute($arr_inset);
        return $is_insert;
    }

    public function getAllEmployees()
    {
        $connection = $this->getConnection();
        $obj_select = $connection->prepare("SELECT * FROM `employees`;");
        $obj_select->execute();
        $employees = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $employees;
    }

    public function getById($id)
    {
        $connection = $this->getConnection();
        $obj_select = $connection->prepare("SELECT * FROM `employees` WHERE id = :id");
        $arr_select = [
            ':id' => $id
        ];
        $obj_select->execute($arr_select);
        $employees = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $employees[0];
    }

    public function updateEmployee()
    {
        $connection = $this->getConnection();
        $obj_update = $connection->prepare(
            "UPDATE employees SET 
            `name` = :name, `description` = :description, `salary` = :salary, 
            `gender` = :gender, `birthday` = :birthday
                WHERE id = :id");
        $arr_update = [
            ':name'=>$this->name,
            ':description'=>$this->description,
            ':salary'=>$this->salary,
            ':gender'=>$this->gender,
            ':birthday'=>$this->birthday,
            ':id'=>$this->id
        ];

        return $obj_update->execute($arr_update);
    }

    public function deleteEmployee($id)
    {
        $connection = $this->getConnection();
        $obj_delete = $connection->prepare("DELETE FROM employees WHERE id = $id");
        return $obj_delete->execute();
    }

}