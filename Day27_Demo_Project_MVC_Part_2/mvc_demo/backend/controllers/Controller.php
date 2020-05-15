<?php
//controllers/Controller.php
//class này đóng vai trò class cha, chứa 1 số phương thức
//hoặc thuộc tính dùng chung cho các class con mà kế thừa từ nó
class Controller {
    //khai báo thuộc tính content
    //thuộc tính này dùng để chứa nội dung sẽ render ra layout
    //khai báo ở class cha để các class con kế thừa từ nó
    //mặc định sẽ có luôn
    public $content;

    //khai báo thuộc tính chứa thông tin lỗi chung cho các
//    class con kế thừa từ nó
    public $error;

    public function render($file, $variables = []) {
        //khi muốn sử dụng biến từ bên ngoài vào file view
        //thì sẽ gọi hàm sau
        extract($variables);
        //bắt đầu lưu thông tin vào bộ nhớ đệm
        ob_start();
        //nhúng đường dẫn file
        require_once $file;

        //kết thúc việc lưu thông tin từ bộ nhớ đếm
        $render_view = ob_get_clean();

        return $render_view;
    }
}