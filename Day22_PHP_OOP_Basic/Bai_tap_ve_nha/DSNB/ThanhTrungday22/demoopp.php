<h1>Demo Lap trinh huong doi tuong</h1>
<?php
    class Book {
        public $name;
        public $age;
        public  function canRead() {
            echo 'Phuong thuc canRead';
        }
        public  function sell () {
            echo 'Phuong thuc sell';
        }
    }
//    2 - ObJECT
$sgk = new Book();
    $sgk->name = 'Sach Giao Khoa';
    $sgk->type = 'Sach';
    echo $sgk->name;
    echo $sgk->type;
    $sgk->canRead();
    $sgk->sell();
    class Car {
        public $producer;
        public $brand;
        public $color;
        public $card;
        public function go() {

        }
    }
    $car = new Car();
    $car->producer = 'Toyota';
    $car->brand = 'Toyota';
    $car->color = 'yellow';
    $car->card = 3629;
    echo '<pre>';
    print_r($car);
    echo '</pre>';
    $car->go();
//3 - Key This
    class StudentDemo {
        public $name;
        public function getName(){
            echo 'Name: '.$this->name;
        }
    }
    $student = New StudentDemo();
    $student->name = "abc";
    $student->getName();
    //4 Pham vi truy cap
//co 3 muc do
//private:
class Testpivate{
    private $name;
    private function show() {
        echo "Phuong thuc show";
    }
    private function getName(){
        $this->name = "abc";
    }
}
class ChildPrivate extends Testpivate {

}
$test_private = New Testpivate();
//co tinh truy cap thuoc tinh name dang o private
//$test_private->name = 'echo';
//protected
class Test_Protected{
    protected $name;
    private $age;
    protected function show() {
        echo 'phuong thuc show';
    }
}
$test_prptected = New Test_Protected();
//ben ngoai kho the truy cam vao thuoc tinh dang o che do protected
//$test_prptected->name = 'abcdf'
class ChildProtected extends Test_Protected {
    public function child (){
        $this->name= 'abc';
//        $this->age= 18;

    }
}
//public
class Test_public{
    public $name;
    public $age;
    public function getName(){
        echo 'getName';
    }
    public function getAge(){
        echo 'getAge';
    }
}
$test_public = New Test_public();
$test_public->name = 'thicc';
$test_public->age = 13;
$test_public->getName();
$test_public->getAge();

//5 Thuoc tinh class
class Animal{
    public $name;
    public $color;
}
$animal = New Animal();
$animal->name= 'Shimba';
$animal->color = 'cam';
//6 phuong thuc class
class Studen2{
    public function addStudent(){
        echo "abcdefkjg";
    }
    public function editStudent($id){
        echo 'editStudent';
    }
}
$student = New Studen2();
$student->editStudent(12);

//7 phuong thuc khoi tao
class TestContructor {
    public function __construct(){
        echo'<p>Phuong thuc khoi tao se chay dau tien khi doi tuong sin ra</p>';
    }
}
$contruc = New TestContructor();
class TestStatic{
    public static $name;
    public static function getName(){
//        TestStatic:$name = "abc";
    self::$name = "name";
    echo self::$name;
    }
}
//khong the truy cap thuoc tinh/phuong thuc o trang thai static
$test_static = New TestStatic();
//$test_static->name = 'abcxyz'
//Cach truy trang thai stactic
TestStatic::$name = 'Shuten';
TestStatic::getName();
class Person2 {
    public $name;
    public $age;
    public function getName(){
        echo 'getName';
    }


}
class Student2 extends Person2 {

}
$student = New Student2();
$student->name = 'tuanh';
$student->age = 123;
$student->getName();
//10 - tu khoa abstract - tinh truu tuong
abstract class Person3{
    public $name;
    public function getName(){

    }
    abstract public function test();
}
class TestPeron3 extends Person3 {
    public function test(){
        //code
    }
}
interface Config{
    public function sendMail();
    public function test();
}
class Mail implements Config{
    public function sendMail()
    {
        // TODO: Implement sendMail() method.
    }
    public function test()
    {
        // TODO: Implement test() method.
    }
}
?>

