<?php
    function songuyento($s)
    {
        if ($s==1)
        {
            return false;
        }
        if ($s==2)
        {
            return true;
        }
        for ($i=2;$i*$i<=$s;$i++)
        {
            if ($s%$i==0)
                return false;
        }
        return true;
    }
    echo "<table cellpadding='0px' cellspacing='0px' border='1px' style='display: contents; text-align: center'>";
        for ($i=0;$i<10;$i++)
        {
            echo "<tr>";
            if ($i==0)
            {
                for ($j=1;$j<=10;$j++)
                {
                    if (songuyento($j))
                        echo "<td width='50px' height='50px' style='background: #7aaf13e0'>$j</td>";
                    else
                        echo "<td width='50px' height='50px'>$j</td>";
                }
            }
            else
            {
                for ($j=1;$j<=10;$j++)
                {
                    $s = $i*10+$j;
                    if (songuyento($s))
                        echo "<td width='50px' height='50px' style='background: #7aaf13e0'>$s</td>";
                    else
                        echo "<td width='50px' height='50px'>$s</td>";
                }
            }
            echo "</tr>";
        }
    echo "</table>";
?>