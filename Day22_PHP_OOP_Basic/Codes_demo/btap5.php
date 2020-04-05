<! DOCTYPE html>
<meta charset="utf-8"/>
<html>
<head>
    <title></title>
</head>
<style>
    div{
        maxwith:500px;
        width: 600px;
        background-color: #00fafa;
        margin: 0 auto;
    }
</style>
<?php
$ten = 'Nguyen Viet Manh';
$mail = 'nguyenvietmanhgmail.com';
$phone = '0987xxx';
?>
<body>
<div>
<form>
    <table border="0">
        <tr>
            <td>Name<span>*</span></td>
            <td>Email<span>*</span></td>
            <td>Phone<span>*</span></td>
        </tr>
        <tr>
            <td>
                <input type="text" placeholder="<?php echo $ten; ?>" />
            </td>
            <td>
                <input style="background-color: #00fafa"  type="email" placeholder="<?php echo $mail; ?>"/>
            </td>
            <td>
                <input type="number" name="phone" placeholder="<?php echo $phone; ?> "/>
            </td>
        </tr>
        <tr>
            <td>Messege<span>*</span></td>

        </tr>
        <tr>
            <td><textarea>This is a message</textarea></td>

        </tr>
        <tr>
            <td><input style="background-color: yellow" type="submit" name="submit" value="submit"/></td>

        </tr>
        <tr>
            <td><span>*</span><p>These fields are required</p></td>

        </tr>
    </table>

</form>
</div>
</body>
</html>
