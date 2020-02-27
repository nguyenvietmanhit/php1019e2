<?php
require_once 'controllers/Controller.php';
require_once 'models/Book.php';
class BookController extends ParentController
{
  public function index()
  {
    //controller gọi model, model sẽ truy vấn dữ liệu và trả về cho controller
    //khởi tạo model book
    $bookModel = new Book();
    $books = $bookModel->getBooks();
    //import file view tương ứng, xử lý biến $books tại view này
    require_once 'views/books/show.php';
  }
}