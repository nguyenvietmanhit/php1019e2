<?php
    echo "<table cellpadding='0px' spellcheck='0px' border='1px' style='display: contents'>";
    for ($i=1;$i<=8;$i++)
    {
        echo "<tr>";
        if ($i%2==0)
        {
            for ($j=1;$j<=8;$j++)
            {
                if ($j%2==0)
                {
                    echo "<td width='50px' height='50px' style='background: #000000'></td>";
                }
                else
                {
                    echo "<td width='50px' height='50px' ></td>";
                }
            }
        }
        else
        {
            for ($j=1;$j<=8;$j++)
            {
                if ($j%2==0)
                {
                    echo "<td width='50px' height='50px' ></td>";
                }
                else
                {
                    echo "<td width='50px' height='50px' style='background: #000000'></td>";
                }
            }
        }
        echo "</tr>";
    }
    echo "</table>";
?>