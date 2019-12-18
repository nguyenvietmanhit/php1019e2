<?php
    function xuat($n = 50)
    {
        for ($i=1;$i<=$n;$i++)
        {
            for ($j=1;$j<=$i;$j++)
            {
                echo "* ";
            }
            echo "<br>";
        }
    }
    xuat();
?>