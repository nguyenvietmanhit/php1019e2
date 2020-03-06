<?php
/**
 * Created by PhpStorm.
 * User: tu901
 * Date: 2/29/2020
 * Time: 3:26 PM
 */

class employee{
const DB_DSN = 'mysql:host=localhost;dbname=employees_mvc;charset=utf8';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
public $name;
public $description;
public $gender;
public $salary;
public $birthday;
public function connectDB(){
    try {
        $connection =New PDO (self::DB_DSN,self:: DB_USERNAME,self::DB_PASSWORD);
    }
    catch (PDOException $e){
        die('Co loi: '. $e->getMessage());
    }
    return $connection;
}
public function insert() {
    $connection = $this->connectDB();
    $obj_insert = $connection->prepare("INSERT INTO employees(`name`,`description`,`gender`,`salary`,`birthday`) VALUE (:name, :description, :gender, :salary, :birthday)");
    $arr_insert = [
      ':name' => $this->name,
      ':description' => $this->description,
      ':gender' =>$this->gender,
      ':salary' =>$this->salary,
      ':birthday' => $this->birthday
    ];
    return $obj_insert->execute($arr_insert);
}
public function select() {
    $connection = $this ->connectDB();
    $obj_select = $connection->prepare("SELECT * FROM employees WHERE id > :id");
    $arr_select = [
      ":id" => 0
    ];
    $obj_select->execute($arr_select);
    $employees = $obj_select->fetchAll(PDO:: FETCH_ASSOC);
    return $employees;
}
public function detail(){
    $connection= $this->connectDB();
    $obj_detail=$connection->prepare("SELECT * FROM employees WHERE id = :id");
    $arr_select= [
        ":id" => $_GET['id']
    ];
    $employees=$obj_detail->execute($arr_select);
    $employee = [];
    $employees= $obj_detail->fetchAll(PDO::FETCH_ASSOC);
    $employee = $employees[0];
    return $employee;
}
    public function update() {
        $connection = $this->connectDB();
        $obj_update = $connection->prepare("UPDATE employees SET `name` = :name,`description` = :description,
`gender`= :gender,`salary` = :salary,`birthday` = :birthday WHERE id = :id");
        $arr_update = [
            ':name' => $this->name,
            ':description' => $this->description,
            ':gender' =>$this->gender,
            ':salary' =>$this->salary,
            ':birthday' => $this->birthday,
            ':id' => $_GET['id']
        ];
        return $obj_update->execute($arr_update);
    }
    public function delete () {
    $connection = $this->connectDB();
    $obj_del = $connection ->prepare("DELETE FROM employees WHERE  `id` = :id");
    $arr_del = [
        ':id' => $_GET['id']
    ];
    return $obj_del->execute($arr_del);
    }
}