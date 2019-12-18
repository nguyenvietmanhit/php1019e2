<?php
function show($n)
{
    echo "<td>";
    for ($i = 1; $i <= 10; $i++) {
        echo "$n x $i = " . ($n * $i) . "<br>";
    }
    echo "</td>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bài 9</title>
    <style>
        .blue td, .content {
            text-align: center;
        }

        .blue td {
            font-size: 20px;
            background: #cdffff;
            color: red;
            font-weight: bold;
        }

        .content td {
            width: 100px;
        }
    </style>
</head>
<body>
<table cellspacing="1px" cellpadding="3px" border="1px">
    <tr class="blue">
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
    </tr>
    <?php
    echo "<tr class='content'>";
    show(1);
    show(2);
    show(3);
    show(4);
    show(5);
    echo "</tr>";
    ?>
    <tr class="blue">
        <td>6</td>
        <td>7</td>
        <td>8</td>
        <td>9</td>
        <td>10</td>
    </tr>
    <?php
    echo "<tr class='content'>";
    show(6);
    show(7);
    show(8);
    show(9);
    show(10);
    echo "</tr>";
    ?>
</table>
</body>
</html>