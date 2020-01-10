<?php
function isPrime($number) {
    if ($number < 2) {
        return false;
    }
    $is_prime = true;
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            $is_prime = false;
            break;
        }
    }

    return $is_prime;

}
//xử lý submit form tại đây
$error = '';
$result = '';
if (isset($_GET['submit'])) {
    $number = $_GET['number'];
    //check validate
    if (empty($number)) {
        $error = 'Không được để trống';
    } else if (!is_numeric($number)) {
        $error = 'Phải nhập số';
    } else {
        $result = "Các số nguyên tố nhỏ hơn $number là: ";
        //xử lý logic bài toán
        for ($i = 0; $i <= $number; $i++) {
            if (isPrime($i))  {
                $result .= "$i,";
            }
        }
        //cắt bỏ ký tự ',' thừa ở cuối chuỗi
        $result = substr($result, 0, -1);
    }
}

?>
<h3>
    Tìm các số nguyên tốt nhỏ hơn số nhập vào
</h3>
<form action="" method="get">
    Nhập số cần kiểm tra
    <input type="text" name="number" value="" />
    <br />
    <input type="submit" value="Kiểm tra" name="submit" />
</form>
<h3 style="color: green">
    <?php echo $result; ?>
</h3>