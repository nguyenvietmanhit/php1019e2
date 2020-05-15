<?php
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
//controllers/CategoryController.php
//demo CRUD cho category
class CategoryController extends Controller {
//    public $content;
    public function index() {
        //gọi model
        $category_model = new Category();
        $categories = $category_model->getAll();
        echo "<pre>";
        print_r($categories);
        echo "</pre>";
        //lấy ra nội dung view của file liệt kê danh sách
        //category, gán cho thuộc tính content
        $this->content = $this->render('views/categories/index.php', [
            //trong view index.php muốn sử dụng biến nào thì phải
            //truyền biến đó theo dạng mảng như sau
            'categories' => $categories
        ]);
        echo "<pre>";
        print_r($this->content);
        echo "</pre>";
        //gọi layout tương ứng
        //ko gọi thẳng file index.php
        require_once 'views/layouts/main.php';
    }

    public function create() {
        //lấy ra nội dung view create.php
        $this->content = $this->render('views/categories/create.php');

        //gọi layout tương ứng
        require_once 'views/layouts/main.php';
    }
}