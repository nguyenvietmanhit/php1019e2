<h1>Demo Lập trình hướng đối tượng</h1>
<?php
//1 - Class
    class Book {
        //thuộc tính của class
        public $name;
        public $type;

//        2 phương thức của class
        public function canRead() {
            echo 'Phương thức can read';
        }

        public function sell() {
            echo 'Phương thức sell';
        }
    }

//    2 - Đối tượng - Object
    //đối tượng sẽ có tất cả thuộc tính và phương thức
    //của class
    $sgk = new Book();
    $sgk->name = 'Sách giáo khoa';
    $sgk->type = 'Sách';
    //set giá trị cho thuộc tính name và type của đối tượng
    echo $sgk->name; //Sách giáo khoa
    echo $sgk->type; // Sách
    //gọi phương thức
    $sgk->canRead();
    $sgk->sell();

    class Car {
        public $producer; //nhà sản xuất
        public $brand; //thương hiệu
        public $color; //màu xe
        public $card; //biển số

        public function go() {

        }
    }
    //khởi tạo đối tượng từ class Car
    $car = new Car();
    //set các giá trị cho các thuộc tính của đối tượng vừa khởi tạo
    $car->producer = 'Toyota';
    $car->brand = 'Toyota';
    $car->color = 'Yellow';
    $car->card = 123456;
    echo "<pre>";
    print_r($car);
    echo "</pre>";
    $car->go();

//    3 - Từ khóa this
//truy cập thuộc tính hoặc phương thức trong chính class hiện tại
    class StudentDemo {
        public $name;

        public function getName() {
            echo "Name: " . $this->name;
        }
    }

    $student = new StudentDemo();
    $student->name = 'ABC';
    $student->getName(); //Name: ABC

//4  - Phạm vi truy cập thuộc tính/phương thức
//có 3 mức độ:
//private:
    class TestPrivate {
        private $name;

        private function show() {
            echo "Phương thức show";
        }

        private function getName() {
            //truy cập private bình thường trong nội bộ class
            $this->name = "ABC";
        }
    }

    $test_private = new TestPrivate();
    //cố tính truy cập thuộc tính name đang
    //  ở chế độ private sẽ báo lỗi
//    $test_private->name = 'Name 1';
//    echo $test_private->name;
//cố tính truy cập phương thức show đang
//  ở chế độ private sẽ báo lỗi
//    $test_private->show();

//protected
class TestProtected {
    protected $name;
    private $age;
    protected function show() {
        echo 'Phương thức show';
    }
}
//bên ngoài class cũng không thể truy cập đc thuộc tính/phương thức
//đang ở chế độ protected
$test_protected = new TestProtected();
//$test_protected->name = 'ABCDEF';

class ChildProtected extends TestProtected {
    public function child() {
        $this->name = 'ABC';
        //báo lỗi
//        $this->age = 12;
    }
}

//public
class TestPublic {
    public $name;
    public $age;

    public function getName() {
        echo "getName";
    }

    public function getAge() {
        echo "getAge";
    }
}
//thông thường khi làm project thì sẽ để phạm vi truy cập là public hết
//để đơn giản
$test_public = new TestPublic();
$test_public->name = "12345";
$test_public->age = 345;
$test_public->getName();
$test_public->getAge();

//5  - THuộc tính của class
class Animal {
    //2 thuộc tính của class, về bản chất vẫn là biến thông thường
    //do đang liên kết với object nên gọi là thuộc tính
    public $name;
    public $color;
    public $age;
}
$animal = new Animal();
//truy cập thuộc tính của class sử dụng cú pháp là ->
$animal->name = "Mèo";
$animal->color = "Trắng";

//6 - Phương thức của class
class Student2 {
    public function addStudent() {
        echo "addStudent";
    }

    public function editStudent($id) {
        echo "editStudent";
    }
}
$student = new Student2();
//về bản chất phương thức trong class chính là các hàm
//để truy cập các phương thức sử dụng ký tự ->
$student->addStudent();//addStudent
$student->editStudent(123); //editStudent

//7  - Phương thức khởi tạo của class
//là phương thức tự động chạy đầu tiên khi 1 đối tượng của class
//được sinh ra
class TestConstructor {
    public function __construct() {
        echo "<p>Phương thức khởi tạo sẽ 
        chạy đầu tiên khi đối tượng được sinh ra</p>";
    }
}
$test_constructor = new TestConstructor();
//8 - Từ khóa static
class TestStatic {
    public static $name;

    //nếu trong phương thức mà có truy cập đến thuộc tính static
    //thì bắt buộc phương thức đó cũng phải là static
    public static function getName() {
//        TestStatic::$name = "ABC";
        //từ khóa self đại diện cho class đó
        //tương đương với từ khóa this
        self::$name = "ABC";
        echo self::$name;
    }
}
//không thể truy cập thuộc tính/phương thức đang ở trạng thái static
//từ việc khởi tạo đối tượng
$test_static = new TestStatic();
//$test_static->name;
//truy cập thuộc tính/phương thức tĩnh bằng cách dùng
//Tên_Class::tên_thuộc_tính/tên_phương_thức
TestStatic::$name = "ABCDe";
TestStatic::getName();//ABC

// 9 - Từ khóa extends - Kế thừa
class Person1 {
    public $name;
    public $age;

    public function getName() {
        echo 'getNAme';
    }
}
//class kế thừa sẽ có tất cả các thuộc tính và phương thức của class cha
//mà đang có phạm vi truy cập là protected và public
class Student1 extends Person1 {
    public $class;
    public function showID() {}
}
$student = new Student1();
$student->name = "MẠnh";
$student->age = 30;
$student->getName();

//10 - Từ khóa abstract - Tính trừu tượng
abstract class Person2 {
    public $name;

    public function getName() {

    }
    //phương thức trừu tượng khai báo ko có nội dung\
    //bắt buộc các class khi extends phải ghi đè lại phương thức này
    abstract public function test();
}

class TestPerson2 extends Person2 {
    public function test() {
        //code
    }
}

//11 - Từ khóa implement - Interface
interface Config {
//    public $name;
    public function sendMail();
    public function test();
}

class Mail implements Config {
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