<?php
function xuat($n = 5)
{
    for ($i=1;$i<=$n;$i++)
    {
        for ($j=1;$j<=$i;$j++)
        {
            echo "* ";
        }
        echo "<br>";
    }
    for ($i=$n;$i>=1;$i--)
    {
        for ($j=$i;$j>=1;$j--)
        {
            echo "* ";
        }
        echo "<br>";
    }
}
xuat();
?>