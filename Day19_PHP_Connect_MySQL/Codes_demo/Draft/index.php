<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Check ajax</title>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
<!--<a href="#" id="show-ajax">Click để show dữ liệu từ MySQL</a>-->
<!--<div id="result-ajax"></div>-->
<form onsubmit="return check()">
    <input type="text" id="name" />
    <input type="submit" />
</form>
<script>
    function check() {
        var obj_name = document.getElementById("dsadasdsa");
        var name = obj_name.value;
        return false;
    }
</script>
</body>
</html>