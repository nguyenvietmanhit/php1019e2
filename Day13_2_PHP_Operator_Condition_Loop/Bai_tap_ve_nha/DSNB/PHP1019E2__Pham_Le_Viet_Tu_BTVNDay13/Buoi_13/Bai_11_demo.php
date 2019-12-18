<style>
    .green {
        background: green;
    }
</style>
<?php
function isPrime($number)
{
    $is_prime = true;
    if ($number < 2) {
        $is_prime = false;
    } else {
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i == 0) {
                $is_prime = false;
                break;
            }
        }
    }

    return $is_prime;
}

?>
<table border="1px" cellpadding="10px" cellspacing="0px">
    <?php for ($row = 1; $row <= 10; $row++): ?>
        <tr>
            <?php for ($col = 1; $col <= 10; $col++):
                //Xử lý logic để hiển thị được số number
                $number = ($row - 1) * 10 + $col;
                $class = '';
                //Nếu $number là số nguyên tố thì gán class = green cho thẻ <td>
                if (isPrime($number) == TRUE) {
                    $class = "class='green'";
                }
            ?>
                <td <?php echo $class; ?>>
                    <?php
                    echo $number;
                    ?>
                </td>
            <?php endfor; ?>
        </tr>
    <?php endfor; ?>
</table>