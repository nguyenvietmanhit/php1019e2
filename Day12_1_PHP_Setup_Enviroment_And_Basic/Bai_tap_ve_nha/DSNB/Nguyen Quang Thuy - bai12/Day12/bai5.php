<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bai5</title>
</head>
<body>
<?php
$name = "Nguyen Viet Manh";
$email = "nguyenvietmanhit@gmail.com";
$phone = "0987xxxxxx";


?>

    <div class="container">
        <form action="">
            <table>
                <tr>
                    <td>Name*</td>
                    <td>Email*</td>
                    <td>Phone</td>
                </tr>
                <tr>
                    <td><input type="text"></td>
                    <td><input type="email">
                    </td>
                    <td><input type="number">
                    </td>
                </tr>
                <tr>
                    <td>Message</td>
                    <td>
                        <texariare placeholder="This is a message"  >
                        </texariare>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="Send message"></td>
                    <td><p>*These fileds are required</p></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>