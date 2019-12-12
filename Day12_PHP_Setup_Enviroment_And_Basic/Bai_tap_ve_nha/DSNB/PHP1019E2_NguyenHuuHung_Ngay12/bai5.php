<link rel="stylesheet" href="css/bootstrap.min.css">
<style type="text/css">
    form{
        background: #9e9e9e14;
    }
</style>
<form method="post" onsubmit="return send()">
    <div class="row">
        <div class="form-group col-md-4">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group col-md-4">
            <label for="email">Email *</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group col-md-4">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>
    </div>
    <div class="row">
        <div class="form-group col">
            <label for="message">Message *</label>
            <textarea class="form-control" id="message" rows="3" name="message"> </textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-warning">Send message</button>
    <p>* These fields are required</p>
    <div id="result" style="color: blue;">

    </div>
</form>
<script type="text/javascript">
    function send() {
        document.getElementById('result').innerHTML = '<?php
        if (isset($_POST["name"])&&isset($_POST["email"])&&isset($_POST["phone"])&&isset($_POST["message"]))
        {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $message = $_POST["message"];
        }
        echo "Name: $name<br>";
        echo "<br>Email: $email<br>";
        echo "<br>Phone: $phone<br>";
        echo "<br>Message: $message";
        ?>';
        return false;
    }
</script>




