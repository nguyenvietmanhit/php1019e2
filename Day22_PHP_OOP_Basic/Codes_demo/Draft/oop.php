<?php

//Từ khóa static;
class People {
    private $private;
    protected $protected;
    public $public = 'Public';

    //biến static
    public static $static = 'Static';

    public static function staticFunction() {
        echo self::$static;
//        echo People::$static;
        echo 'Static Function';
    }
}

//cách truy cập biến/phương thức có phạm vi truy cập là public
//cần khởi tạo đối tượng
$people = new People();
echo $people->public;

//gọi thuộc tính tĩnh bằng cách sử dụng tên class :: tên thuộc tính/
//phương thức
echo People::$static;

People::staticFunction();


//từ khóa extends
class Animal {
    public $name = 'Animal';
    protected $protected;
    private $private;

    public function run() {
        echo "Animal is runnning";
    }
}

class Cat extends Animal {
    public function getProtected() {
        echo $this->protected;
    }
}

$cat = new Cat();
echo '<br />';
echo $cat->name;
echo $cat->run();
//echo $cat->protected;


//Từ khóa abstract
//class abstract chỉ dùng với mục đích kế thừa
abstract class Visual {
    public $public;
    private $private;
    protected $protected;
    public function publicFunction() {
        echo 'abc';
    }

    abstract function abstractFunction();
}

class A extends Visual {
    public function abstractFunction()
    {
        echo $this->public;
        echo $this->protected;
    }
}

//interface
interface Pattern {
    //không khai báo đc biến trong interface
    public function run();

    public function display();
}

class Pattern1 implements Pattern  {
    public function run()
    {
        // TODO: Implement run() method.
    }

    public function display()
    {
        // TODO: Implement display() method.
    }
}

//abc?controller=book&action=index