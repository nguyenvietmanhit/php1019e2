<?php
//Đầu tiên cần xác định xem có tổng cộng bao nhiêu bản ghi cần phân trang (total)
//Tiếp đó xác định xem sẽ hiển thị bao nhiêu bản ghi trên 1 trang (limit)
//Sau khi có được 2 thông số trên là total và litmi, cần xác định số trang sẽ được chia ra dựa vào phép chia total/limit, đây là phép chia nên có thể sẽ xuất hiện số thập phân, do đó cần làm tròn lên bằng hàm ceil của php
//Khi muốn hiển thị ra số trang, sử dụng vòng lặp và gắn các link chứa tham số tương ứng

class Pagination
{
//    Tạo biến config chứa các thông tin cần thiết cho phân trang
  public $params = [
    'total' => 0, //tổng số bản ghi của table
    'limit' => 0, //số bản ghi trên 1 trang
    'query_string' => 'page', //tham số truyền lên url trình duyêt, sẽ có dang là ?page=1
    'controller' => '', //tên controller truyền vào, do mô hình đang sử dụng là MVC nên bắt buộc phải truyền vào controller
    'action' => '', //tên action của controller tương ứng, do mô hình đang sử dụng là MVC nên bắt buộc phải truyền vào controller,
    'query_additional' => '' //chứa chuỗi query từ url nếu có, ví dụ như khi search theo name, thì biến này sẽ có giá trị là &name=abc chẳng hạn, để đảm bảo phân trang hoạt động đúng
//    khi có thêm các query từ trình duyệt
  ];

  public $full_url;

  public function __construct($params = [])
  {
    //validate các dữ liệu trong mảng params là hợp lệ
    if (isset($params['limit']) && $params['limit'] < 0) {
      die('limit không được nhỏ hơn 0');
    }
    if (isset($params['total']) && $params['total'] < 0) {
      die('total không được nhỏ hơn 0');
    }
    //validate query_string, nếu không có thì gán mặc định bằng page
    if (!isset($params['query_string'])) {
      $params['query_string'] = 'page';
    }
    //khởi tạo giá trị cho thuộc tính params bằng tham số params truyền vào constructor
    $this->params = $params;
    $query_additional = '';
    //nếu như query_additional đang khác rỗng, nghĩa là từ nơi gọi nó có truyền vào 1 tham số gì đó thì sẽ gán vào chuỗi url full đang có
    if (isset($this->params['query_additional']) && !empty($this->params['query_additional'])) {
      $query_additional = "&" . $this->params['query_additional'];
    }
    //tạo luôn url dạng abc?controller=&action=&page= để sử dụng cho các phương thức sau
    $this->full_url = $_SERVER['PHP_SELF'] . '?controller=' . $this->params['controller'] . '&action=' . $this->params['action'] . $query_additional . '&' . $this->params['query_string'] . '=';
  }

  /**
   * Lấy ra tổng số trang
   * @return float|int
   */
  public function getTotalPage()
  {
    $total = $this->params['total'] / $this->params['limit'];
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
    $query_string = $this->params['query_string'];
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
    //nếu trang hiện tại lớn hơn 1 thì hiển thị nút Prev
    if ($this->getCurrentPage() > 1) {
      $prev_link = $this->full_url . ($this->getCurrentPage() - 1);
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
//        nếu trang hiện tại đang nhỏ hơn tổng số trang đang có, thì hiển thị nút Next
    if ($this->getCurrentPage() < $this->getTotalPage()) {
      $next_link = $this->full_url . ($this->getCurrentPage() + 1);
      $next_page = '<li><a href="' . $next_link . '">Next</a></li>';
    }

    return $next_page;
  }

  /**
   * Hiển thị cấu trúc phân trang dạng HTML
   * @return string
   */
  public function getPagination()
  {
    //nếu chỉ có đúng 1 trang thì sẽ không cần hiển thị phân trang
    if ($this->getTotalPage() == 1) {
      return '';
    }
    //ngược lại xử lý để hiển thị ra cấu trúc phân trang
    $data = '<ul class="pagination">';
    $data .= $this->getPrevPage();
    for ($i = 1; $i <= $this->getTotalPage(); $i++) {
      if ($i == $this->getCurrentPage()) {
        $data .= "<li class='active'><a href=''>$i</a></li>";
      } else {
        $link_current = $this->full_url . $i;
        $data .= "<li><a href='$link_current'>$i</a></li>";
      }
    }

    $data .= $this->getNextPage();
    $data .= '</ul>';
    return $data;
  }
}