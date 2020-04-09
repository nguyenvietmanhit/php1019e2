<?php
//Đầu tiên cần xác định xem có tổng cộng bao nhiêu bản ghi cần phân trang (total)
//Tiếp đó xác định xem sẽ hiển thị bao nhiêu bản ghi trên 1 trang (limit)
//Sau khi có được 2 thông số trên là total và litmi, cần xác định số trang sẽ được chia ra dựa vào phép chia total/limit, đây là phép chia nên có thể sẽ xuất hiện số thập phân, do đó cần làm tròn lên bằng hàm ceil của php
//Khi muốn hiển thị ra số trang, sử dụng vòng lặp và gắn các link chứa tham số tương ứng

class Pagination
{
//    Tạo biến config chứa các thông tin cần thiết cho phân trang
    public $config = [
        'total' => 0, //tổng số bản ghi của table
        'limit' => 0, //số bản ghi trên 1 trang
        'full' => true, //true nếu muốn hiển thị full toàn bộ số trang, false trong trường hợp ngược lại
        'query_string' => 'page' //tham số truyền lên url trình duyêt, sẽ có dang là ?page=1
    ];

    public function __construct($config = [])
    {
        //validate các dữ liệu trong mảng config là hợp lệ
        if (isset($config['limit']) && $config['limit'] < 0) {
            die('limit không được nhỏ hơn 0');
        }
        if (isset($config['total']) && $config['total'] < 0) {
            die('total không được nhỏ hơn 0');
        }
        //validate query_string, nếu không có thì gán mặc định bằng page
        if (!isset($config['query_string'])) {
            $config['query_string'] = 'page';
        }
        //khởi tạo giá trị cho thuộc tính config bằng tham số config truyền vào constructor
        $this->config = $config;
    }

    /**
     * Lấy ra tổng số trang
     * @return float|int
     */
    public function getTotalPage()
    {
        $total = $this->config['total'] / $this->config['limit'];
        //làm tròn lên, trong trường hợp phép chia ra số thập phân
        $total = ceil($total);
        return $total;
    }

    /**
     * LẤy ra trang hiện tại
     * @return float|int
     */
    public function getCurrentPage()
    {
        $page = 1;
        $query_string = $this->config['query_string'];
        //nếu tồn tại tham số query_string trên url, và giá trị của tham số này >= 1
        if (isset($_GET[$query_string]) && $_GET[$query_string] >= 1) {
            //kiểm tra tiếp nếu lớn hơn tổng số trang
            //thì gán biến page bằng tổng số trang hiện tại
            if ($_GET[$query_string] > $this->getTotalPage()) {
                $page = $this->getTotalPage();
            } else {
                //ngược lại bằng giá trị của tham số đó
                $page = $_GET[$query_string];
            }
        }

        return $page;
    }

    /**
     * Trả về trang ngay trước trang hiện tại, tương đưuong với link Prev
     * @return string
     */
    public function getPrevPage()
    {
        $prev_page = '';
        //nếu trang hiện tại lớn hơn 1 thì hiển thị link Prev
        if ($this->getCurrentPage() > 1) {
            $prev_link = $_SERVER['PHP_SELF'] . '?' . $this->config['query_string'] . '=' . ($this->getCurrentPage() + 1);
            $prev_page = '<li><a href="' . $prev_link . '">Prev</a></li>';
        }

        return $prev_page;
    }

    /**
     * Hiển thị trang ngay sau trang hiện tại, tương đương với link Next
     * @return string
     */
    public function getNextPage()
    {
        $next_page = '';
//        nếu trang hiện tại nhỏ hơn tổng số trang, thì hiển thị link Next
        if ($this->getCurrentPage() < $this->getTotalPage()) {
            $next_link = $_SERVER['PHP_SELF'] . '?' . $this->config['query_string'] . '=' . ($this->getCurrentPage() - 1);
            $next_page = '<li><a href="' . $next_link . '"></a></li>';
        }

        return $next_page;
    }

    public function getPagination()
    {
        $data = '<ul>';
        $data .= $this->getPrevPage();
        if ($this->config['full']) {
            for ($i = 1; $i <= $this->getTotalPage(); $i++) {
                if ($i == $this->getCurrentPage()) {
                    $data .= "<li class='active'><a href='#'>$i</a></li>";
                } else {
                    $link_current = $_SERVER['PHP_SELF'] . '?' . $this->config['query_string'] . '=' . $i;
                    $data .= "<li><a href='$link_current'>$i</a></li>";
                }
            }

        }

        $data .= $this->getNextPage();
        $data .= '</ul>';
        return $data;
    }
}