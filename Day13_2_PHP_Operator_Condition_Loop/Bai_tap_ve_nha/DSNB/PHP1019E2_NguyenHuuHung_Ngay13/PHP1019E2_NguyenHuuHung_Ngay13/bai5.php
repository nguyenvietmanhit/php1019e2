<?php
    function  tinh($n = 10)
    {
        $S = 0;
        $str = "S($n) = ";
        for ($i=1;$i<=$n;$i++)
        {
            $S = $S + 1/$i;
            if ($i == $n)
            {
                $str = $str . "1/$i";
                continue;
            }
            $str = $str . "1/$i +";
        }
        echo "<b>$str = $S</b>";
    }
    tinh();
?>