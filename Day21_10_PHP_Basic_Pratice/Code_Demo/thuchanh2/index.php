<?php
//xử lý submit form
$error = '';
$result = '';
if (isset($_GET['submit'])) {
    $number = $_GET['number'];
    //validate
    if (empty($number)) {
        $error = 'Không được để trống';
    } else if (!is_numeric($number)) {
        $error = 'Cần phải nhập số';
    } else {
        //xử lý logic bài toán
//        phạm vi từ 0 - 50kw
        if ($number <= 50) {
            $result = $number * 1000;
        } //pham vi từ 50 - 100
        else if ($number > 50 && $number <= 100) {
            //từ 0 - 50 thì giá 1000
            $result = 50 * 1000;
            //số kw còn lại sau khi trừ 50kw ban đầu
            $result += ($number - 50) * 2000;
        } else if ($number > 100 && $number <= 200) {
            //từ 0 - 50 kw giá là 1000
            $result = 50 * 1000;
//            trên 50 - 100 giá là 2000
            $result += 50 * 2000;
            //số kw còn lại sau khi trừ 100kw ban đầu
            $result += ($number - 100) * 3000;
        } else {
//            0 - 50
            $result = 50 * 1000;
//            50 - 100
            $result += 50 * 2000;
//            100 - 200
            $result += 100 * 3000;
//            > 200
            $result += ($number - 200) * 4000;
        }
    }
}
?>
<h3 style="color: red">
    <?php echo $error; ?>
</h3>
<h3>Tính giá tiền điện</h3>
<form action="" method="get">
    Nhập số tiền điện tiêu thụ
    <input type="text" name="number" value=""/>
    <table border="0">
        <tr>
            <th colspan="2">
                Bảng giá tiền điện theo bậc thang
            </th>
        </tr>
        <tr>
            <td>
                0 - 50KW
            </td>
            <td>
                <b>1000đ/KW</b>
            </td>
        </tr>
        <tr>
            <td>
                Trên 50 - 100KW
            </td>
            <td>
                <b>2000đ/KW</b>
                <br/>
                Từ 0 - 50KW giá 1000đ/KW
            </td>
        </tr>

        <tr>
            <td>
                Trên 100 - 200KW
            </td>
            <td>
                <b>3000đ/KW</b>
                <br/>
                Từ 0 - 50KW giá 1000đ/KH <br/>
                Trên 50 - 100KW giá 2000đ/KH <br/>
            </td>
        </tr>

        <tr>
            <td>
                Trên 200KW
            </td>
            <td>
                <b>4000đ/KW</b>
                <br/>
                Từ 0 - 50KW giá 1000đ/KW <br/>
                Trên 50 - 100KW giá 2000đ/KW <br/>
                Trên 100 - 200KW giá 3000đ/KW <br/>
            </td>
        </tr>
    </table>
    <input type="submit" name="submit" value="Tính tiền điện"/>
    <h3 style="color: green">
        <?php echo $result; ?>
    </h3>
</form>