<?php
//models/Pagination.php
class Pagination {
    //khai báo 1 thuộc tính params, sẽ chứa các thông tin
//    liên quan đến phân trang
    public $params = [
        'total' => 0, //tổng số bản ghi đang có của table,
        // vd categories, products, users ...
        'limit' => 0,//số bản ghi trên 1 trang
        'query_string' => 'page', //tham số truyền lên url
//        của trình duyệt, tương đương với số trang hiện tại
//    vd url: index.php?controller=category&action=index&page=2,
        'controller' => '', //tên controller của chúc năng tương ứng
        'action' => '', //tên action tương ứng của controller trên
    ];

    //khởi tạo cho thuộc tính params ở trên
    //phương thức khởi tạo là phương thức đc gọi ngầm đầu tiên
    //khi khởi tạo class đó
    //giả sử mảng params truyền vào từ CategoryController đang là
//    $params = [
//      'total' => 45,
//      'limit' => 3,
//       'query_string' => 'page',
//       'controller' => 'category',
//       'action' => 'index'
//      ]
    public function __construct($params = [])
    {
        //validate các dũ liệu trong mảng params truyền vào
        if ($params['limit'] < 0) {
            die('Tham số limit ko đc < 0');
        }
        if ($params['total'] < 0) {
            die('Tham số total ko đc < 0');
        }
        //gán các giá trị từ tham số mảng params truyền vào cho
//        thuộc tính params của class hiện tại
        $this->params = $params;
    }

    /**
     * Lấy ra tổng số trang hiện tại
     * @return float|int
     */
    public function getTotalPage() {
        //khi lấy tổng số trang cần lưu ý với các trường hợp chia
//        ra số lẻ thì cần làm tròn lên
        //ví dụ total = 42 bản ghi, limit hiển thị 5 bản ghi /trang
//        => cần 9 trang
        $total = $this->params['total'] / $this->params['limit'];
        $total = ceil($total); //5.2 => 6, 8.001 => 9
        //làm tròn xuống là hàm floor, 5.2 -> 5
        return $total;
    }

    /**
     * Lấy ra số trang hiện tại
     * @return float|int
     */
    public function getCurrentPage() {
        //sẽ lấy ra trang hiện tại
        //sẽ dựa vào mảng $_GET có key=page để lấy số trang
        $page = 1;
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = $_GET['page'];
            $total_page = $this->getTotalPage();
            //nếu số trang hieinej tại >= tổng trang thì gán lại
//            trang hiện tại bằng tổng số trang
            if ($page >= $total_page) {
                $page = $total_page;
            }
        }
        return $page;
    }

    public function getPrevPage() {
        $prev_page = '';
        //lấy ra trang hiện tại
        $page_current = $this->getCurrentPage();
        //chỉ hiển thị ra link prev khi trang hiện tại >= 2
        if ($page_current >= 2) {
            $url_prev = 'index.php?controller='
                . $this->params['controller'] .
                '&action=' . $this->params['action'] .
                '&page=' . ($page_current - 1);
            $prev_link = "<li>";
            $prev_link .= "<a href='$url_prev'>";
            $prev_link .= "Prev";
            $prev_link .= "</a>";
            $prev_link .= "</li>";
            $prev_page = $prev_link;
        }

        return $prev_page;
    }

    /**
     * Hiển thị link Next
     * @return string
     */
    public function getNextPage() {
        $next_page = '';
        $current_page = $this->getCurrentPage();
        $total_page = $this->getTotalPage();
        //chỉ hiển thị link Next khi trang hiện tại < tổng số trang
        if ($current_page < $total_page) {
            $url = 'index.php?controller=' . $this->params['controller'] .
                '&action=' . $this->params['action'] .
                '&page=' . ($current_page + 1);
            $next_page .= "<li>";
            $next_page .= "<a href='$url'>";
            $next_page .= "Next";
            $next_page .= "</a>";
            $next_page .= "</li>";
        }
        return $next_page;
    }

    public function getPagination() {
        $data = '';
        $total_page = $this->getTotalPage();
        if ($total_page == 1) {
            return '';
        }
        $data .= "<ul class='pagination'>";
        //hiển thị ra link Prev
        $data .= $this->getPrevPage();
        //lặp từng trang
        for ($page = 1; $page <= $total_page; $page++) {
            $current_page = $this->getCurrentPage();
            //nếu là trang hiện tại thì thêm class active để nhận diện
            if ($current_page == $page) {
                $data .= "<li class='active'>";
                //xử lý ko thể click đc vào chính page hiện tại khi
//                đang đứng tại chính page đó
                    $data .= "<a href='#'>";
                    $data .= "Trang $page";
                    $data .= "</a>";
                $data .= "</li>";
            } else {
                $url = 'index.php?controller=' . $this->params['controller']
                    . '&action=' . $this->params['action']
                    . '&page=' . $page;
                $data .= "<li>";
                    $data .= "<a href='$url'>";
                    $data .= "Trang $page";
                    $data .= "</a>";
                $data .= "</li>";
            }
        }

        //hiển thị ra link Next
        $data .= $this->getNextPage();
        $data .= "</ul>";
        //nếu tổng trang chỉ có 1, thì ko cần hiển thị phân trang
        return $data;
    }

    //$a = new Pagination(['a' => 1]);


}