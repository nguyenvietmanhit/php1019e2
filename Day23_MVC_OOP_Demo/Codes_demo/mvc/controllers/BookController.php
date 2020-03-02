<?php
require_once 'models/Book.php';
//Tạo class phải trùng với tên file
class BookController {

    public function create() {

        //xử lý submit form
        if (isset($_GET['submit'])) {
            print_r($_GET);
            $name = $_GET['name'];
            $amount = $_GET['amount'];

            //kiểm tra validate, tạm thời bỏ qua

            //gọi model để thực hiện insert vào database
            $book_model = new Book();
            //truy cập và gán giá trị cho thuộc tính
            $book_model->name = $name;
            $book_model->amount = $amount;

            $is_insert = $book_model->insert();
            var_dump($is_insert);
        }

        echo "Đang ở trong phương thức create của BookControler";
        //gọi view để hiển thị form thêm mới
        //bản chất vẫn là nhúng file view vào
        //luôn phải tư duy là đứng từ file index.php gốc của
//        ứng dụng để nhúng file
        require_once 'views/books/create.php';

//        mail()
    }
}