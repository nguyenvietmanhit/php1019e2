<meta charset="utf-8">
<title>Bài 9</title>
<style>
    table {
        display: inline-block;
    }
    #blue{
        background: lightblue;
        text-align: center;
    }
</style>
<?php
for($i = 1 ;$i <= 10;$i++){
        echo "<table border='1' cellspacing='0'>
            <tr><td id='blue'>$i</td></tr>
            <tr><td>
            $i x 1 = ".($i*1)." <br>"."
            $i x 2 = ".($i*2)." <br>"."
            $i x 3 = ".($i*3)." <br>"."
            $i x 4 = ".($i*4)." <br>"."
            $i x 5 = ".($i*5)." <br>"."
            $i x 6 = ".($i*6)." <br>"."
            $i x 7 = ".($i*7)." <br>"."
            $i x 8 = ".($i*8)." <br>"."
            $i x 9 = ".($i*9)." <br>"."
            $i x 10 = ".($i*10)." <br>"."
            </td></tr>
            </table>";
    }

?>
