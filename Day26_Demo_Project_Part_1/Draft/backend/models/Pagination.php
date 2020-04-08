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

    public function getTotalPage() {
        $total = $this->config['total'] / $this->config['limit'];
        //làm tròn lên, trong trường hợp phép chia ra số thập phân
        $total = ceil($total);
        return $total;
    }
}