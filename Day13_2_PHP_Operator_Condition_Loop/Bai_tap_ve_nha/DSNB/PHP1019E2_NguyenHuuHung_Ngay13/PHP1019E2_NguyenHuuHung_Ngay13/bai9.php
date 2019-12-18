<?php
    echo "<table cellpadding='0px' spellcheck='0px' border='1px' style='text-align: center;font-weight: bold'>";
    for ($i=1;$i<=4;$i++)
    {
        if ($i==1)
        {
            echo "<tr style='color: red; background: #9fcdff'>";
            for ($j=1;$j<=5;$j++)
            {
                echo "<td>$j</td>";
            }
            echo "</tr>";
        }
        if ($i==3)
        {
            echo "<tr style='color: red; background: #9fcdff'>";
            for ($j=6;$j<=10;$j++)
            {
                echo "<td>$j</td>";
            }
            echo "</tr>";
        }
        if ($i==2)
        {
            echo "<tr>";
            for ($j=1;$j<=5;$j++)
            {
                echo "<td>";
                for ($h=1;$h<=10;$h++)
                {
                    echo "$j" . "x" . "$h = " . $j*$h . "<br>";
                }
                echo "</td>";
            }
            echo "</tr>";
        }
        if ($i==4)
        {
            echo "<tr>";
            for ($j=6;$j<=10;$j++)
            {
                echo "<td>";
                for ($h=1;$h<=10;$h++)
                {
                    echo "$j" . "x" . "$h = " . $j*$h . "<br>";
                }
                echo "</td>";
            }
            echo "</tr>";
        }
    }
    echo "</table>";
?>
