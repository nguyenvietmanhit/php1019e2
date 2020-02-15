<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11/12/2019
 * Time: 7:59 PM
 */

interface ABC {
//    public $abc;
    public function getAbc();
}

class Monkey
{
    protected static $legs = 4;

    public static function countLegs() {
        return static::$legs;
    }
}

class Human extends Monkey
{
    protected static $legs = 2;
}

echo Human::countLegs() . " aaaaaaaaaaaa";

//2 - Lớp  - Class
class People {
   public $name;
   public $age;
   public $address;

   public function say() {
       echo "Saying...";
   }

   public function eat() {
       echo "Eating...";
   }
}
//khởi tạo đối tượng cụ thể từ lớp
//set các giá trị cho đối tượng cụ thể
// từ các thuộc tính của lớp
$people = new People();
$people->age = 25;
$people->name = "Manh";
$people->address = "Ha Noi";

$people->say();
$people->eat();

//3 - Từ khóa this
class Book {
    public $name;
    public $page;

    public function addBook() {
        $this->name = "Sach giao khoa";
        echo "Add book " . $this->name;
        $this->listBook();
    }

    public function listBook() {
        echo "List book...";
    }
}

$book = new Book();
$book->addBook();

//Phạm vi truy cập
//public, protected, private
class Student {
    //biến private không thể truy cập được từ
//    đối tượng bên ngoài,
//    mà chỉ truy cập đc trong nội bộ class đó
    private $name;
    public $age;
    protected $address;

    public function addStudent() {
        $this->name = "Manh";
        echo $this->name;
    }

    public function deleteStudent() {

    }
}

class StudentA extends Student {
    public function display() {
        $this->addStudent();
        //cố tình truy cấp thuộc tính private của class cha
//        sẽ báo lỗi
//        $this->name;
        //class con có thể truy cập đc
        // thuộc tính và phương thức của class
//        cha đang ở protected
        $this->address = "Ha noi";
        echo $this->address;
    }
}

$studentA = new StudentA();
$studentA->display();

$student = new Student();
//$student->name = "abc";
$student->addStudent();
//$student->address;
//echo $student->name;

//5 - THuộc tính của lớp
class Person2 {
    public $name;
    private $age;
    protected $address;
}

//6 - Phương thức của lớp
class Person3 {
    public function eat() {
        //code
    }

    private function study() {
        //code
    }

    protected function run() {
        //code
    }
}

//7 - Phương thức khởi tạo
class Person4 {
    public function __construct() {
        echo "Hàm này chạy đầu tiên khi khởi tạo đối tượng từ class";
    }
}
$person4 = new Person4();

//8 - Từ khóa static
//không cần khởi tạo đối tượng mà vẫn truy cập đối tương đang ở dạng
//static
class Person5 {
    public static $name;
    public $age;
    public static function display() {
        self::$name = "Manh";
    }
}

//$person5 = new Person5();
//$person5->age;
Person5::$name = "Manh";
echo Person5::$name;

//9 - Từ khóa extends
class People1 {
    public $name;
    public $age;

    public function getName() {
        echo "Get name";
    }
}

class Student1 extends People1 {

}

$student1 = new Student1();
$student1->getName();