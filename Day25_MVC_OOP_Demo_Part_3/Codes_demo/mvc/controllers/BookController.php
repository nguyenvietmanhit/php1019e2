<?php
require_once 'models/Book.php';
//controllers/BookController.php
//lưu ý tên class trong MVC sẽ trùng với tên file
class BookController
{

  //chứa thông tin liên quan đến lỗi
  public $error;

    /**
     * Phương thức liệt kê sách đang có trong CSDL
     */
  public function index() {
      //controller gọi model nhờ lấy dữ liệu
    $book_model = new Book();
    $books = $book_model->getAllBook();

//    echo "<pre>";
//      print_r($books);

    //truyền ra view
    require_once 'views/books/index.php';
  }

  public function delete() {
      if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
          $_SESSION['error'] = 'ID không hợp lệ';
          header("Location: index.php?controller=book");
      }
      $id = $_GET['id'];
      //gọi model để thực hiện xóa bản ghi theo id bắt được
      $book_model = new Book();
      $is_delete = $book_model->deleteBook($id);
      if ($is_delete) {
          $_SESSION['success'] = 'Xóa thành công';
      } else {
          $_SESSION['error'] = 'Xóa thất bại';
      }
      header('Location: index.php?controller=book');
      exit();
  }

  public function update() {
//      index.php/book/update/2
//      sửa bản ghi có id = 2
      //gọi model để lấy bản ghi theo id truyền lên
      //kiểm tra nếu id không hợp lệ thì chuyển hướng về trang
//      danh sách
    echo "<pre>" . __LINE__ . ", " . __DIR__ . "<br />";
    print_r($_REQUEST );
    echo "</pre>";
    die;
      if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
          $_SESSION['error'] = 'ID không hợp lệ';
          header("Location: index.php?controller=book");
          exit();
      }

      $id = $_GET['id'];
      //gọi model lấy bản ghi theo id vừa bắt được từ trình duyệt
      $book_model = new Book();
      $book = $book_model->getBookById($id);
//      echo "<pre>";
//      print_r($book);

      //xử lý khi user submit form
      if(isset($_POST['submit'])) {
          $name = $_POST['name'];
          $amount = $_POST['amount'];
          $avatar_arr = $_FILES['avatar'];
          //check validate
          //nếu như để trống tên hoặc upload file ko phải ảnh thì báo lỗi
          if (empty($name)) {
              $this->error = 'Không được để trống name';
          } else if ($avatar_arr['error'] == 0) {
              //tạo 1 mảng chứa danh sách các file ảnh hợp lệ
              $arr_extension = ['png', 'jpg', 'jpeg', 'gif'];
              //lấy ra đuôi file vừa upload lên
              $extension = pathinfo($avatar_arr['name'],
                  PATHINFO_EXTENSION);
              //validate đuôi file
              if (!in_array($extension, $arr_extension)) {
                  $this->error = 'Phải upload định dạng ảnh';
              }
          }
          //xử lý lưu vào csdl và upload file nếu có trong
//          trường hợp validate thành công ko có lỗi
          if (empty($this->error)) {
              //upload đè file cũ nếu có hành động upload file
              $avatar = $book['avatar'];
              if ($avatar_arr['error'] == 0) {
                  $dir_uploads = __DIR__ . '/../assets/uploads';
                  if (!file_exists($dir_uploads)) {
                      mkdir($dir_uploads);
                  }
                  //xóa file cũ trên hệ thống đi để tránh file rác
                  //thêm ký tự @ để ko hiển thị lỗi khi xóa file ko tồn tại
                  @unlink($dir_uploads . '/' . $avatar);
                  //tạo tên file mới theo kiểu ngẫu nhiên để tránh trùng file
                  $avatar = time() . '-' . $avatar_arr['name'];
                  move_uploaded_file($avatar_arr['tmp_name'],
                      $dir_uploads . '/' . $avatar);
              }
              //lưu vao csdl
              //gọi model để thực hiện update
              //gán các giá trị cho đối tượng book_model
              $book_model->name = $name;
              $book_model->amount = $amount;
              $book_model->avatar = $avatar;
              $book_model->id = $id;
              $is_update = $book_model->updateBook();
              if ($is_update) {
                  $_SESSION['success'] = 'Update thành công';
              } else {
                  $_SESSION['error'] = 'Update thất bại';
              }
              header('Location: index.php?controller=book');
              exit();
          }
      }

      //gọi view để hiển thị book
      require_once 'views/books/update.php';
  }

  public function create()
  {

    //xử lý submit form từ view gửi lên
    if (isset($_POST['submit'])) {
      echo "<pre>";
      print_r($_POST);
      echo "</pre>";
      $name = $_POST['name'];
      $amount = $_POST['amount'];

      //xử lý validate:
//            1 - name không được để trống
//            2 - File phải có định dạng ảnh png, jpg, jpeg, gif
//            Nếu validate lỗi thì sẽ gán giá trị cho thuộc tính error
//            ,chỉ xử lý thêm vào CSDL khi error không có giá trị
      $avatar_arr = $_FILES['avatar'];
      $extension_arr = ['png', 'jpg', 'jpeg', 'gif'];
      //lấy ra đuôi file mà user tải lên
//            echo "<pre>";
//            print_r($avatar_arr);
//            echo "</pre>";
//            die;

//            var_dump($extension);
      if (empty($name)) {
        $this->error = "Name không được để trống";
      } elseif ($avatar_arr['error'] == 0) {
        $extension = pathinfo($avatar_arr['name'],
          PATHINFO_EXTENSION);
        if (!in_array($extension, $extension_arr)) {
          $this->error = "Phải upload định dạng ảnh";
        }
      }

      //trường hợp validate thành công, tương đương biến error đang rỗng
      if (empty($this->error)) {
        //upload ảnh
        //tạo thư mục uploads
//                    chú ý tạo thư mục thì phải là đường dẫn tuyệt đối
//        nếu có hành đông upload file, tương đương mang4 $_FILES của key error = 0 thì xử lý upload
        $file_name = '';
        if ($avatar_arr['error'] == 0) {
          $dir_uploads = __DIR__ . '/../assets/uploads';
          if (!file_exists($dir_uploads)) {
            mkdir($dir_uploads);
          }
          //tạo ra tên file ngẫu nhiên để tránh trường upload
//                    đè file giống nhau
          $file_name = time() . '-' . $avatar_arr['name'];
          move_uploaded_file($avatar_arr['tmp_name'],
            $dir_uploads . '/' . $file_name);
        }

        //lưu vào bảng books
        //gọi model Book
        $book_model = new Book();
        //gán giá trị cho các thuộc tính của model book
        $book_model->name = $name;
        $book_model->avatar = $file_name;
        $book_model->amount = $amount;
        //gọi phương thức insert đã tạo trong model Book
        $is_insert = $book_model->insert();
        if ($is_insert) {
          $_SESSION['success'] = 'Insert thành công';
        } else {
          $_SESSION['error'] = 'Insert thất bại';
        }
        //url luôn phải tuân theo format trong mvc, là phải có tham số
//                    controller và action
        header("Location: index.php?controller=book&action=create");
        exit();
      }

    }
//        echo "Đang ở trong phương thức create";
    //gọi view để hiển thị form thêm mới sách
    //đứng từ file index.php gốc của ứng dụng để nhúng file
//        views/books/create.php
    require_once 'views/books/create.php';
  }
}