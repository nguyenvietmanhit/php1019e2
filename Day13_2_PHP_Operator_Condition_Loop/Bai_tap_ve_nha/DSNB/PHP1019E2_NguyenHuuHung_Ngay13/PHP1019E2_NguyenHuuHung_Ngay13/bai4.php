 <?php
function xuat($n = 50)
{

    $i=0;
    echo "<b>";
    while ($i<=$n)
    {
        echo "$i";
        if ($i==50)
        {
            $i++;
            continue;
        }
        echo " - ";
        $i++;
    }
    echo "</b>";
}
xuat();
?>