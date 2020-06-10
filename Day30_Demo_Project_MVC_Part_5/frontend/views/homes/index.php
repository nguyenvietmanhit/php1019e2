<!--MAIN CONTENT-->
<section class="main-content">
    <div class="main-content-wrapper">
        <!--MAIN LEFT-->
        <div class="main-left content-body">
            <div class="content-timeline">
                <!--Timeline header area start -->
                <div class="post-list-header">
                    <h1 class="post-list-title">
                        <a href="#" class="link-category-item">Tin nổi bật</a>
                    </h1>
                </div>
<!--                views/homes/index.php-->
                <?php if (!empty($products)): ?>
                <div class="timeline-items">
                    <?php foreach($products AS $product): ?>
                    <!--ITEM-->
                    <div class="timeline-item">
                        <div class="timeline-left">
                            <div class="timeline-left-wrapper">
                                <a href="chi-tiet/<?php echo $product['id']?>"
                                   class="timeline-category" data-zebra-tooltip=""
                                   title="<?php echo $product['title']?>">
                                    <i class="material-icons"></i>
                                </a>
                                <span class="timeline-date">
                                    <?php echo $product['created_at']; ?>
                                </span>
                            </div>
                        </div>
                        <div class="timeline-right">
                            <div class="timeline-post-image">
                                <a href="chi-tiet/<?php echo $product['id']; ?>">
                                    <img
                        src="../backend/assets/uploads/<?php echo $product['avatar']?>"
                        width="260">
                                </a>
                            </div>
                            <div class="home-page timeline-post-content">
                                <a href="chi-tiet/<?php echo $product['id']; ?>"
                                   class="timeline-category-name font-arial">
                                    <?php echo $product['category_name']; ?>
                                </a>
                                <a href="chi-tiet/<?php echo $product['id']; ?>">
                                    <h3 class="timeline-post-title">
                                        <?php echo $product['title']?>
                                    </h3>
                                </a>
                                <div class="product-price timeline-post-info">
                                    <?php echo number_format($product['price'])?>đ
                                </div>
                                <div class="timeline-post-info">
                                    <a href="them-vao-gio-hang/<?php echo $product['id']?>"
                                       class="product-cart">
                                        Thêm vào giỏ hàng
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--END ITEM-->
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <!--Timeline items end -->

                <!--Data load more button start  -->
                <!--<div class="load-more">-->
                <!--<button class="load-more-button material-button" type="button">-->
                <!--<i class="material-icons">&#xE5D5;</i>-->
                <!--&lt;!&ndash; <span>Load More</span> &ndash;&gt;-->
                <!--</button>-->
                <!--</div>-->
                <!--Data load more button start  -->
            </div>

            <div class="category-one category-two">

                <h1 class="post-list-title">
                    <a href="#" class="link-category-item">Tin mới nhất</a>
                </h1>
                <!--<select class="frm-input">-->
                <!--<option value="1">Thể thao</option>-->
                <!--<option value="1">Book</option>-->
                <!--<option value="1">Cinema</option>-->
                <!--</select>-->

                <div class="two-item-wrap">
                    <div class="link-secondary-wrap">
                        <div class="item-link-secondary">
                            <a href="not-defined.html">
                                <img class="secondary-img img-responsive" src="assets/images/category-img-1.png"/>
                            </a>

                            <div class="two-item-title">
                                <a href="not-defined.html" class="two-item-link">
                                    <h4 class="timeline-post-title">
                                        Suốt mùa 2 "Người ấy là ai", Trấn Thành & Hương Giang đã để lại vô số phát
                                        ngôn ấn tượng!
                                    </h4>
                                </a>
                                <div class="category-time-ago">
                                    <a href="#" class="timeline-category-name font-arial">Thể thao</a> - <span
                                            class="time-ago">3 phút trước</span>
                                </div>
                                <div class="short-description">
                                    Có thể thấy, Lương Thùy Linh ngay từ nhỏ đã được rèn dũa có nét chữ đẹp,
                                    ngay
                                    ngắn, trình bày gọn gàng.
                                    Nhiều người còn ...
                                </div>

                            </div>
                        </div>
                        <div class="item-link-secondary">
                            <a href="not-defined.html">
                                <img class="secondary-img img-responsive" src="assets/images/category-img-1.png"/>
                            </a>

                            <div class="two-item-title">
                                <a href="not-defined.html" class="two-item-link">
                                    <h4 class="timeline-post-title">
                                        Suốt mùa 2 "Người ấy là ai", Trấn Thành & Hương Giang đã để lại vô số phát
                                        ngôn ấn tượng!
                                    </h4>
                                </a>
                                <div class="category-time-ago">
                                    <a href="#" class="timeline-category-name font-arial">Thể thao</a> - <span
                                            class="time-ago">3 phút trước</span>
                                </div>
                                <div class="short-description">
                                    Có thể thấy, Lương Thùy Linh ngay từ nhỏ đã được rèn dũa có nét chữ đẹp, ngay
                                    ngắn, trình bày gọn gàng.
                                    Nhiều người còn ...
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="seperator-line"></div>

            <!--CATEGORY ITEM-->
            <div class="category-two">
                <div class="row">
                    <div class="col-md-6 col-sm-6 category-two-item">
                        <h3 class="two-item-heading timeline-post-title">
                            <a href="#" class="link-category-item">Thế giới</a>
                            <span class="link-category-child">
                                    <a href="#" class="link-category-child-item">Điểm tin thế giới</a>
                                    <a href="#" class="link-category-child-item">Khám phá</a>
                                    <a href="#" class="link-category-child-item">Hồ sơ</a>
                                    <a href="#" class="link-category-child-item">Năm châu</a>
                                </span>
                        </h3>
                        <div class="two-item-wrap">
                            <a href="not-defined.html" class="two-item-link-heading">
                                <img src="http://tevratgundogdu.com/works/ideabox-html-template/img/news-test-images/news-img1.jpg"
                                     class="post-image-avatar img-responsive">
                                <h3 class="category-heading timeline-post-title">The Importance Of Letting Your Kids
                                    Join After
                                    School Activities</h3>
                            </a>
                            <div class="link-secondary-wrap">
                                <a href="not-defined.html" class="item-link-secondary">
                                    <img class="img-left img-responsive" src="assets/images/secondary-img1.png"/>
                                    <h4 class="font-arial secondary-title">
                                        Suốt mùa 2 "Người ấy là ai", Trấn Thành & Hương Giang đã để lại vô số phát
                                        ngôn ấn tượng!
                                    </h4>
                                </a>
                                <a href="not-defined.html" class="item-link-secondary">
                                    <img class="img-left img-responsive" src="assets/images/secondary-img1.png"/>
                                    <h4 class="font-arial secondary-title">
                                        Suốt mùa 2 "Người ấy là ai", Trấn Thành & Hương Giang đã để lại vô số phát
                                        ngôn ấn tượng!
                                    </h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 category-two-item">
                        <h3 class="two-item-heading timeline-post-title">
                            <a href="#" class="link-category-item">Khoa học</a>
                        </h3>
                        <div class="two-item-wrap">
                            <a href="not-defined.html" class="two-item-link-heading">
                                <img src="http://tevratgundogdu.com/works/ideabox-html-template/img/news-test-images/news-img1.jpg"
                                     class="post-image-avatar img-responsive">
                                <h3 class="category-heading timeline-post-title">
                                    The Importance Of Letting Your Kids
                                    Join After
                                    School Activities</h3>
                            </a>
                            <div class="link-secondary-wrap">
                                <a href="not-defined.html" class="item-link-secondary">
                                    <img class="secondary-img img-responsive"
                                         src="assets/images/secondary-img1.png"/>
                                    <h4 class="font-arial secondary-title">
                                        Suốt mùa 2 "Người ấy là ai", Trấn Thành & Hương Giang đã để lại vô số phát
                                        ngôn ấn tượng!
                                    </h4>
                                </a>
                                <a href="not-defined.html" class="item-link-secondary">
                                    <img class="secondary-img img-responsive"
                                         src="assets/images/secondary-img1.png"/>
                                    <h4 class="font-arial secondary-title">
                                        Suốt mùa 2 "Người ấy là ai", Trấn Thành & Hương Giang đã để lại vô số phát
                                        ngôn ấn tượng!
                                    </h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!--CATEGORY ITEM-->
            <div class="category-two">
                <div class="row">
                    <div class="col-md-6 col-sm-6 category-two-item">
                        <h3 class="two-item-heading timeline-post-title">
                            <a href="link-category-item">Kinh doanh</a>
                        </h3>
                        <div class="two-item-wrap">
                            <a href="not-defined.html" class="two-item-link-heading">
                                <img src="http://tevratgundogdu.com/works/ideabox-html-template/img/news-test-images/news-img1.jpg"
                                     class="post-image-avatar img-responsive">
                                <h3 class="category-heading timeline-post-title">The Importance Of Letting Your Kids
                                    Join After
                                    School Activities</h3>
                            </a>
                            <div class="link-secondary-wrap">
                                <a href="not-defined.html" class="item-link-secondary">
                                    <img class="img-left img-responsive" src="assets/images/secondary-img1.png"/>
                                    <h4 class="font-arial secondary-title">
                                        Suốt mùa 2 "Người ấy là ai", Trấn Thành & Hương Giang đã để lại vô số phát
                                        ngôn ấn tượng!
                                    </h4>
                                </a>
                                <a href="not-defined.html" class="item-link-secondary">
                                    <img class="img-left img-responsive" src="assets/images/secondary-img1.png"/>
                                    <h4 class="font-arial secondary-title">
                                        Suốt mùa 2 "Người ấy là ai", Trấn Thành & Hương Giang đã để lại vô số phát
                                        ngôn ấn tượng!
                                    </h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 category-two-item">
                        <h3 class="two-item-heading timeline-post-title">
                            <a href="link-category-item">Sức khỏe</a>
                        </h3>
                        <div class="two-item-wrap">
                            <a href="not-defined.html" class="two-item-link-heading">
                                <img src="http://tevratgundogdu.com/works/ideabox-html-template/img/news-test-images/news-img1.jpg"
                                     class="post-image-avatar img-responsive">
                                <h3 class="category-heading timeline-post-title">
                                    The Importance Of Letting Your Kids
                                    Join After
                                    School Activities</h3>
                            </a>
                            <div class="link-secondary-wrap">
                                <a href="not-defined.html" class="item-link-secondary">
                                    <img class="secondary-img img-responsive"
                                         src="assets/images/secondary-img1.png"/>
                                    <h4 class="font-arial secondary-title">
                                        Suốt mùa 2 "Người ấy là ai", Trấn Thành & Hương Giang đã để lại vô số phát
                                        ngôn ấn tượng!
                                    </h4>
                                </a>
                                <a href="not-defined.html" class="item-link-secondary">
                                    <img class="secondary-img img-responsive"
                                         src="assets/images/secondary-img1.png"/>
                                    <h4 class="font-arial secondary-title">
                                        Suốt mùa 2 "Người ấy là ai", Trấn Thành & Hương Giang đã để lại vô số phát
                                        ngôn ấn tượng!
                                    </h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--CATEGORY ITEM-->
            <div class="category-two">
                <div class="row">
                    <div class="col-md-6 col-sm-6 category-two-item">
                        <h3 class="two-item-heading timeline-post-title">
                            <a href="link-category-item">Thể thao</a>
                        </h3>
                        <div class="two-item-wrap">
                            <a href="not-defined.html" class="two-item-link-heading">
                                <img src="http://tevratgundogdu.com/works/ideabox-html-template/img/news-test-images/news-img1.jpg"
                                     class="post-image-avatar img-responsive">
                                <h3 class="category-heading timeline-post-title">The Importance Of Letting Your Kids
                                    Join After
                                    School Activities</h3>
                            </a>
                            <div class="link-secondary-wrap">
                                <a href="not-defined.html" class="item-link-secondary">
                                    <img class="img-left img-responsive" src="assets/images/secondary-img1.png"/>
                                    <h4 class="font-arial secondary-title">
                                        Suốt mùa 2 "Người ấy là ai", Trấn Thành & Hương Giang đã để lại vô số phát
                                        ngôn ấn tượng!
                                    </h4>
                                </a>
                                <a href="not-defined.html" class="item-link-secondary">
                                    <img class="img-left img-responsive" src="assets/images/secondary-img1.png"/>
                                    <h4 class="font-arial secondary-title">
                                        Suốt mùa 2 "Người ấy là ai", Trấn Thành & Hương Giang đã để lại vô số phát
                                        ngôn ấn tượng!
                                    </h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 category-two-item">
                        <h3 class="two-item-heading timeline-post-title">
                            <a href="link-category-item">Du lịch</a>
                        </h3>
                        <div class="two-item-wrap">
                            <a href="not-defined.html" class="two-item-link-heading">
                                <img src="http://tevratgundogdu.com/works/ideabox-html-template/img/news-test-images/news-img1.jpg"
                                     class="post-image-avatar img-responsive">
                                <h3 class="category-heading timeline-post-title">
                                    The Importance Of Letting Your Kids
                                    Join After
                                    School Activities</h3>
                            </a>
                            <div class="link-secondary-wrap">
                                <a href="not-defined.html" class="item-link-secondary">
                                    <img class="secondary-img img-responsive"
                                         src="assets/images/secondary-img1.png"/>
                                    <h4 class="font-arial secondary-title">
                                        Suốt mùa 2 "Người ấy là ai", Trấn Thành & Hương Giang đã để lại vô số phát
                                        ngôn ấn tượng!
                                    </h4>
                                </a>
                                <a href="not-defined.html" class="item-link-secondary">
                                    <img class="secondary-img img-responsive"
                                         src="assets/images/secondary-img1.png"/>
                                    <h4 class="font-arial secondary-title">
                                        Suốt mùa 2 "Người ấy là ai", Trấn Thành & Hương Giang đã để lại vô số phát
                                        ngôn ấn tượng!
                                    </h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--END MAIN LEFT-->

        <!--MAIN RIGHT-->
        <div class="main-right">
            <!--SIDEBAR RIGHT-->
            <div class="content-sidebar">
                <div class="sidebar_inner">

                    <div class="widget-item">
                        <div class="post-list-header">
                            <h1 class="post-list-title">
                                <a href="#" class="link-category-item">Đọc nhiều nhất</a>
                            </h1>
                        </div>
                        <div class="w-boxed-post">
                            <ul>
                                <li class="active">
                                    <a href="not-defined.html"
                                       style="background-image: url(http://tevratgundogdu.com/works/ideabox-html-template/img/news-test-images/news-img7.jpg);">
                                        <div class="box-wrapper">
                                            <div class="box-left">
                                                <span>1</span>
                                            </div>
                                            <div class="box-right">
                                                <h3 class="p-title">Things to Consider When Choosing City Moving
                                                    Companies</h3>
                                                <div class="p-icons">
                                                    213 likes . 124 comments
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="not-defined.html"
                                       style="background-image: url(http://tevratgundogdu.com/works/ideabox-html-template/img/news-test-images/news-img5.jpg);">
                                        <div class="box-wrapper">
                                            <div class="box-left">
                                                <span>2</span>
                                            </div>
                                            <div class="box-right">
                                                <h3 class="p-title">Things to Consider When Choosing City Moving
                                                    Companies</h3>
                                                <div class="p-icons">
                                                    213 likes . 124 comments
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="not-defined.html"
                                       style="background-image: url(http://tevratgundogdu.com/works/ideabox-html-template/img/news-test-images/news-img6.jpg);">
                                        <div class="box-wrapper">
                                            <div class="box-left">
                                                <span>3</span>
                                            </div>
                                            <div class="box-right">
                                                <h3 class="p-title">Things to Consider When Choosing City Moving
                                                    Companies</h3>
                                                <div class="p-icons">
                                                    213 likes . 124 comments
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="not-defined.html"
                                       style="background-image: url(http://tevratgundogdu.com/works/ideabox-html-template/img/news-test-images/news-img3.jpg);">
                                        <div class="box-wrapper">
                                            <div class="box-left">
                                                <span>4</span>
                                            </div>
                                            <div class="box-right">
                                                <h3 class="p-title">Things to Consider When Choosing City Moving
                                                    Companies</h3>
                                                <div class="p-icons">
                                                    213 likes . 124 comments
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="widget-item">
                        <div class="w-header">
                            <div class="w-title"></div>
                            <div class="w-seperator"></div>
                        </div>
                        <div class="w-carousel-post">
                            <div class="owl-carousel" id="widgetCarousel">
                                <div class="item">
                                    <a href="#">
                                        <div class="w-play-img">
                                            <img src="http://tevratgundogdu.com/works/ideabox-html-template/img/news-test-images/news-img4.jpg"
                                                 width="300">
                                            <span class="w-video-icon"><i class="material-icons">&#xE038;</i></span>
                                        </div>
                                        <span class="w-post-title">It has roots in a piece of classical Latin literature from</span>

                                    </a>
                                </div>
                                <div class="item">
                                    <a href="#">
                                        <img src="http://tevratgundogdu.com/works/ideabox-html-template/img/news-test-images/news-img5.jpg"
                                             width="300">
                                        <span class="w-post-title">Lorem Ipsum used since</span>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="#">
                                        <img src="http://tevratgundogdu.com/works/ideabox-html-template/img/news-test-images/news-img6.jpg"
                                             width="300">
                                        <span class="w-post-title">English versions from the 1914 translation</span>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="#">
                                        <img src="http://tevratgundogdu.com/works/ideabox-html-template/img/news-test-images/news-img7.jpg"
                                             width="300">
                                        <span class="w-post-title">The standard chunk of Lorem Ipsum used since</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-header">
                        <div class="w-title">Quảng cáo</div>
                        <div class="w-seperator"></div>

                    </div>

                    <a href="#" class="widget-ad-box">
                        <img src="http://tevratgundogdu.com/works/ideabox-html-template/img/adbox300x250.png"
                             width="300" height="250">
                    </a>

                </div>
            </div>
            <!--END SIDEBAR RIGHT-->
            <div class="category-list">
                <a class="category-list-home" href="">Trang chủ</a>
                <ul>
                    <li><h6><a href="">Video</a></h6></li>
                    <li><h6><a href="">Thế giới</a></h6></li>
                    <li><h6><a href="">Xã hội</a></h6></li>
                    <li><h6><a href="">Kinh doanh</a></h6></li>
                    <li><h6><a href="">Thể thao</a></h6></li>
                </ul>
                <ul>
                    <li><h6><a href="">Video</a></h6></li>
                    <li><h6><a href="">Thế giới</a></h6></li>
                    <li><h6><a href="">Xã hội</a></h6></li>
                    <li><h6><a href="">Kinh doanh</a></h6></li>
                    <li><h6><a href="">Thể thao</a></h6></li>
                </ul>
                <ul>
                    <li><h6><a href="">Video</a></h6></li>
                    <li><h6><a href="">Thế giới</a></h6></li>
                    <li><h6><a href="">Xã hội</a></h6></li>
                    <li><h6><a href="">Kinh doanh</a></h6></li>
                    <li><h6><a href="">Thể thao</a></h6></li>
                </ul>
                <ul>
                    <li><h6><a href="">Video</a></h6></li>
                    <li><h6><a href="">Thế giới</a></h6></li>
                    <li><h6><a href="">Xã hội</a></h6></li>
                    <li><h6><a href="">Kinh doanh</a></h6></li>
                    <li><h6><a href="">Thể thao</a></h6></li>
                </ul>
                <ul>
                    <li><h6><a href="">Video</a></h6></li>
                    <li><h6><a href="">Thế giới</a></h6></li>
                    <li><h6><a href="">Xã hội</a></h6></li>
                    <li><h6><a href="">Kinh doanh</a></h6></li>
                    <li><h6><a href="">Thể thao</a></h6></li>
                </ul>
            </div>
        </div>
        <!--END MAIN RIGHT-->
    </div>


</section>