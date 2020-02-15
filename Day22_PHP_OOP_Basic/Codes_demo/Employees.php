<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11/12/2019
 * Time: 9:08 PM
 */

class Employees
{
    public $id;
    public $name;
    public $description;
    public $salary;
    public $gender;
    public $birthday;
    public $created_at;

    public function connectDb() {
        $db_host = 'localhost';
        $db_username = 'root';
        $db_password = '';
        $db_name = 'bt1';
        $connection = mysqli_connect($db_host, $db_username,
            $db_password, $db_name);
        if (!$connection) {
            die ("Connection error, " . mysqli_connect_error());
        }

        echo "Connection successful";

        return $connection;
    }

    public function index() {
        $connection = $this->connectDb();
        //tạo và thực thi truy vấn
        $querySelect = "SELECT * FROM employees";
        $results = mysqli_query($connection, $querySelect);

        $employees = [];

        if (mysqli_num_rows($results) > 0) {
            $employees = mysqli_fetch_all($results,
                MYSQLI_ASSOC);
        }
        echo "<pre>";
        print_r($employees);
        echo "</pre>";
        $this->closeConnection($connection);
    }

    public function closeConnection($connection) {
        mysqli_close($connection);
    }

    public function insert() {

    }

    public function edit() {

    }

    public function delete() {

    }


}

$employee = new Employees();
$employee->index();