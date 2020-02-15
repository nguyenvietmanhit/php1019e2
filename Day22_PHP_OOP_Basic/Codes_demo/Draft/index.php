<?php
//khai báo class
//PSR1
//class Student {
//    //khai báo các thuộc tính
//    public $name = 'Manh';
//    public $age;
//    private $gender;
//    protected $created_at;
//
//    //khai báo các phương thức
//    public function displayName() {
//        echo "Hello, World";
////        echo $this->
//    }
//}
//
//$student1 = new Student();
//$student1->displayName();
//$studentName = $student1->name;
//echo $studentName;

//Từ khóa this
//class Student {
//    private $birthday;
//
//    public function setBirthday($birthdayParam) {
//        $this->birthday = $birthdayParam;
//    }
//
//    public function getBirthday() {
//        return $this->birthday;
//    }
//}
//
//$student = new Student();
//$student->setBirthday("12-2-2012");
//echo $student->getBirthday();

//Phạm vi truy cập
//class Person
//{
//    public $public;
//    private $private;
//    protected $protected;
//
//    public function getPrivate() {
//        return $this->private;
//    }
//
//    private function checkPrivate() {
//
//    }
//
//    protected function checkProteded() {
//
//    }
//
//}
//
//class Student extends Person
//{
//    public function getProtected()
//    {
//        $protected = $this->protected;
////        $protected = $this->private;
//        $this->checkProteded();
//    }
//}
//
//$person = new Person();
//echo "<p>$person->public</p>";
//
//$student = new Student();
//echo "<p>$student->public</p>";
//echo "<p>$student->private</p>";
//echo "<p>$student->protected</p>";
//echo "<p>$student->private</p>";
//echo "<p>$student->protected</p>";

//Hàm khởi tạo
class Student {
    public function __construct()
    {
        echo "Đây là hàm khởi tạo";
    }
}

$student = new Student();