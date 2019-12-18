<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bài 10</title>
</head>
<body>
<table cellspacing="0px" cellpadding="0px" border="1px">
    <?php
    for ($i = 1; $i <= 8; $i++)//i=row
    {
        echo "<tr>";
        for ($j = 1; $j <= 8; $j++)//j=col
        {
            $sum = $i + $j;
            if ($sum % 2 == 0) {
                echo "<td style='background: #000000; width: 60px; height: 60px;'></td>";
            } else {
                echo "<td style='background: #ffffff; width: 60px; height: 60px;'></td>";
            }
        }
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>