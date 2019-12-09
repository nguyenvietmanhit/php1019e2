<?php echo time(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Chương trình PHP đầu tiên</title>
    </head>

    <body>
        <?php
        //code PHP ở đây
        /*
         Comment nhiều dòng
         Comment nhiều dòng
         */
        echo "Hello, PHP";
        ?>

    <h1>
        <?php echo time(); ?>

        <?php
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        echo date('d-m-Y H:i:s', time());
        ?>
    </h1>
    </body>

</html>