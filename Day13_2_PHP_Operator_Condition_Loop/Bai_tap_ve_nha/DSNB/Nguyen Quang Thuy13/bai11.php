<?php
function isPrime($n){
    $prime = true;
    if ($n < 2){
        return false;
    }
    else {
        for ($i = 2; $i <= sqrt($n); $i++){
            if ($n % $i == 0 ){
                $prime = false;
                break;
            }
        }
    }
    return $prime;
}

?>

<style>
    .green{
        background: green;
    }
</style>

<table  cellpadding="10" border="1" cellspacing="0">
<?php for ($i = 1; $i <=10; $i++): ?>
    <tr>
    <?php for ($j = 1; $j <= 10; $j++):
        $number = ($i - 1)*10 + $j;
        $class = "";
        if (isPrime($number)){
            $class  = "class='green'";
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
<table >
