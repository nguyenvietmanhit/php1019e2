<h3 class="error">
    <?php
    echo $this->error;
    ?>
    <?php
        if (isset($_SESSION['error'])){
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
    ?>
</h3>
<h3 class="success">
    <?php
        if (isset($_SESSION['success'])){
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        }
    ?>
</h3>
<h3 class="center">Footer chung</h3>
</div>
</body>