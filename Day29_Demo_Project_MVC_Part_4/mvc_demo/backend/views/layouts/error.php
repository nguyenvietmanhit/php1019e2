<div class="message-wrap content-wrap content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
<!--        <div class="alert alert-danger">Lỗi validate</div>-->
<!--        <p class="alert alert-success">Thành công</p>-->
      <?php if (isset($_SESSION['error'])): ?>
          <div class="alert alert-danger">
            <?php
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            ?>
          </div>
      <?php endif; ?>

      <?php if (!empty($this->error)): ?>
          <div class="alert alert-danger">
            <?php
            echo $this->error;
            ?>
          </div>
      <?php endif; ?>

      <?php if (isset($_SESSION['success'])): ?>
          <div class="alert alert-success">
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
          </div>
      <?php endif; ?>

    </section>


</div>