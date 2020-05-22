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

  public function create()
  {
    if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $description = $_POST['description'];
      $status = $_POST['status'];
      $avatar_files = $_FILES['avatar'];

      //check validate
      if (empty($name)) {
        $this->error = 'Cần nhập tên';
      } //trường hợp có ảnh upload lên, thì cần kiểm tra điều kiện là file ảnh
      else if ($avatar_files['error'] == 0) {
        $extension_arr = ['jpg', 'jpeg', 'gif', 'png'];
        $extension = pathinfo($avatar_files['name'], PATHINFO_EXTENSION);
        $extension = strtolower($extension);
        $file_size_mb = $avatar_files['size'] / 1024 / 1024;
        //làm tròn theo đơn vị thập phân
        $file_size_mb = round($file_size_mb, 2);

        if (!in_array($extension, $extension_arr)) {
          $this->error = 'Cần upload file định dạng ảnh';
        } else if ($file_size_mb >= 2) {
          $this->error = 'File upload không được lớn hơn 2Mb';
        }
      }

      //nếu ko có lỗi thì tiến hành lưu dữ liệu và upload ảnh nếu có
      $avatar = '';
      if (empty($this->error)) {
        //xử lý upload ảnh nếu có
        if ($avatar_files['error'] == 0) {
          $dir_uploads = __DIR__ . '/../assets/uploads';
          if (!file_exists($dir_uploads)) {
            mkdir($dir_uploads);
          }
          $avatar = time() . '-' . $avatar_files['name'];
          move_uploaded_file($avatar_files['tmp_name'], $dir_uploads . '/' . $avatar);
        }
        //lưu vào csdl
        //gọi model để thực  hiện lưu
        $category_model = new Category();
        //gán các giá trị từ form cho các thuộc tính của category
        $category_model->name = $name;
        $category_model->avatar = $avatar;
        $category_model->description = $description;
        $category_model->status = $status;
        //gọi phương thức insert
        $is_insert = $category_model->insert();
        if ($is_insert) {
          $_SESSION['success'] = 'Thêm mới thành công';
        } else {
          $_SESSION['error'] = 'Thêm mới thất bại';
        }
        header('Location: index.php?controller=category&action=index');
        exit();
      }

    }

    //lấy nội dung view create.php
    $this->content = $this->render('views/categories/create.php');
    //gọi layout để nhúng nội dung view create vừa lấy đc
    require_once 'views/layouts/main.php';
  }
}