<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo $_SERVER['SCRIPT_NAME'] ?>"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sutiin</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700,900&amp;subset=latin-ext"
          rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <!--<link rel="stylesheet" href="assets/css/font-awesome.min.css"/>-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Tooltip plugin (zebra) css file -->
    <link rel="stylesheet" href="assets/css/zebra_tooltips.min.css"/>
    <!-- Owl Carousel plugin css file. only used pages -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css"/>
    <!-- Ideabox main theme css file. you have to add all pages -->
    <link rel="stylesheet" href="assets/css/main-style.css"/>
    <!-- Ideabox responsive css file -->
    <link rel="stylesheet" href="assets/css/responsive-style.css"/>
    <link rel="stylesheet" href="assets/css/style.css"/>
</head>

<body>

<?php require_once 'header.php'; ?>

<?php require_once 'sidebar.php'; ?>

<a href="#" class="scrollup"></a>


<div class="container">
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
</div>

<!--Main container start -->
<main class="main-container">
    <!--MAIN CONTENT-->
  <?php echo $this->content; ?>
</main>

<?php require_once 'footer.php'; ?>

<!-- Register popup html source start -->
<div class="m-modal-box" id="registerModal">
    <div class="m-modal-overlay"></div>
    <div class="m-modal-content small">
        <div class="m-modal-header">
            <h3 class="m-modal-title">Register</h3>
            <span class="m-modal-close"><i class="material-icons">&#xE5CD;</i></span>
        </div>
        <div class="m-modal-body">
            <div class="m-modal-social-logins">
                <div class="columns column-2">
                    <button class="frm-button facebook material-button full" type="button">Facebook</button>
                </div>
                <div class="columns column-2">
                    <button class="frm-button twitter material-button full" type="button">Twitter</button>
                </div>
                <div class="columns column-2">
                    <button class="frm-button google material-button full" type="button">Google</button>
                </div>
            </div>

            <div class="m-modal-seperator"><span>OR</span></div>

            <form>
                <div class="frm-row">
                    <input class="frm-input" type="text" name="name" placeholder="Name">
                </div>
                <div class="frm-row">
                    <input class="frm-input" type="text" name="username" placeholder="Username">
                </div>
                <div class="frm-row">
                    <input class="frm-input" type="text" name="email" placeholder="Email">
                </div>
                <div class="frm-row">
                    <input class="frm-input" type="text" name="password" placeholder="Password">
                </div>
                <div class="frm-row">
                    <label class="frm-check-radio-label"><input type="checkbox" name="test"> <span>I accept your <a
                                    href="#">register policy</a>.</span></label>
                </div>
                <div class="frm-row">
                    <button class="frm-button material-button full" type="button">Register</button>
                </div>
            </form>
            <div class="frm-row">
                <p class="txt-center">Bạn đã có tài khoản? <a href="#" data-modal="loginModal">Đăng nhập</a></p>
            </div>
        </div>
    </div>
</div>
<!-- Register popup html source end ---->

<!-- Login popup html source start -->
<div class="m-modal-box" id="loginModal">
    <div class="m-modal-overlay"></div>
    <div class="m-modal-content small">
        <div class="m-modal-header">
            <h3 class="m-modal-title">Đăng nhập</h3>
            <span class="m-modal-close"><i class="material-icons">&#xE5CD;</i></span>
        </div>
        <div class="m-modal-body">
            <div class="m-modal-social-logins">
                <div class="columns column-3">
                    <button class="frm-button facebook material-button full" type="button">Facebook</button>
                </div>
                <div class="columns column-3">
                    <button class="frm-button google material-button full" type="button">Google</button>
                </div>
            </div>

            <div class="m-modal-seperator"><span>OR</span></div>

            <form>
                <div class="frm-row">
                    <input class="frm-input" type="text" name="email" placeholder="Email">
                </div>
                <div class="frm-row">
                    <input class="frm-input" type="text" name="password" placeholder="Password">
                </div>
                <div class="frm-row">
                    <button class="frm-button material-button full" type="button">Login</button>
                </div>
            </form>
            <div class="frm-row">
                <p class="txt-center">Bạn chưa có tài khoản? <a href="#" data-modal="registerModal">Đăng ký ngay</a>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Login popup html source end -->

<!-- Newsletter popup html source start -->
<div class="m-modal-box" id="newsletterModal">
    <div class="m-modal-overlay"></div>
    <div class="m-modal-content small">
        <div class="m-modal-header">
            <h3 class="m-modal-title">Theo dõi</h3>
            <span class="m-modal-close"><i class="material-icons">&#xE5CD;</i></span>
        </div>
        <div class="m-modal-body">
            <p>Nhận thông báo mỗi khi có bài mới thông qua mail của bạn!</p>
            <form>
                <div class="frm-row">
                    <input class="frm-input" type="text" name="email" placeholder="Email address">
                </div>
                <div class="frm-row">
                    <button class="frm-button material-button full" type="button">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Newsletter popup html source end -->

<div class="overlay"></div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Tooltip plugin (zebra) js file -->
<script src="assets/js/zebra_tooltips.min.js"></script>


<!-- Owl Carousel plugin js file -->
<script src="assets/js/owl.carousel.min.js"></script>

<!-- Ideabox theme js file. you have to add all pages. -->
<script src="assets/js/script.js"></script>

</body>

</html>