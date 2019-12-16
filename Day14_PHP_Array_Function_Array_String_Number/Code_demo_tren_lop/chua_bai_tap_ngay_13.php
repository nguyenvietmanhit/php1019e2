<?php
//chữa bài tập 4
function displayNumber($number)
{
    $string = '';

    for ($i = 1; $i <= $number; $i++) {
        $string .= $i;
        //tại lần lặp cuối cùng, ko hiển thị ký tự -
        if ($i == $number) {
            break;
        }
        $string .= "-";
    }

    return $string;
}

$display50 = displayNumber(150);
echo $display50;

//chữa bài tập 5
function displaySum($number)
{
    $string = "S($number) = ";
    $sum = 0;
    for ($i = 1; $i <= $number; $i++) {
        //cộng dồn tổng cần tìm sau mỗi lần lặp
        $sum += 1 / $i;
        $string .= "1/$i";
        if ($i == $number) {
            break;
        }
        $string .= " + ";
    }
    $string .= " = " . $sum;
    return $string;
}

echo "<br />";
$displaySum10 = displaySum(10);
echo displaySum(10);

//chữa bài tập 11
?>
<style>
    .green {
        background: green;
    }
</style>
<?php
//viết hàm kiểm tra số nguyên tố
function isPrime($number) {
    $is_prime = true;

    if ($number < 2) {
        $is_prime = false;
    } else {
        for($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i == 0) {
                $is_prime = false;
                break;
            }
        }
    }

    return $is_prime;
}
?>
<table border="1" cellpadding="10" cellspacing="0">
    <?php for ($row = 1; $row <= 10; $row++): ?>
        <tr>
            <?php for ($col = 1; $col <= 10; $col++):
                //xử lý logic để hiển thị được số number
                $number = ($row - 1) * 10 + $col;
                $class = '';
                //nếu $number là số nguyên tố
            //thì gán class = green cho thẻ <td>
                if (isPrime($number)) {
                   $class = " class='green' ";
                }
                ?>
                <td <?php echo $class; ?> >
                    <?php
                    echo $number;
                    ?>
                </td>
            <?php endfor; ?>
        </tr>
    <?php endfor; ?>
</table>>

