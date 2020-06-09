<!--Timeline items start -->
<!--Nếu tồn tại giỏ hàng, thì hiển thị ra màn hình-->
<div class="timeline-items container">
    <form action="" method="post">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th width="40%">Tên sản phẩm</th>
                <th width="12%">Số lượng</th>
                <th>Giá</th>
                <th>Thành tiền</th>
                <th></th>
            </tr>
<!--          views/carts/index.php
                lặp giỏ hàng để hiển thị ra thông tin các sản phẩm trong giỏ
  -->       <?php
            //tổng giá trị đơn hàng
            $total_order = 0;
            ?>
            <?php foreach($_SESSION['cart'] AS $product_id => $product): ?>
            <tr>
                <td>
                    <img class="product-avatar img-responsive"
                     src="../backend/assets/uploads/<?php echo $product['avatar']?>"
                         width="80">
                    <div class="content-product">
                        <a href="chi-tiet/<?php echo $product_id; ?>"
                           class="content-product-a">
                            <?php echo $product['name']; ?>
                        </a>
                    </div>
                </td>
                <td>
<!--                  cần chú ý, để đơn giản cho việc submit form, thì
                       thì name của số lượng sp đặt chính là id sản phẩm -->
                    <input type="number" min="0" name="<?php echo $product_id; ?>"
                           class="product-amount form-control"
                           value="<?php echo $product['quality']?>">
                </td>
                <td>
                    <?php echo number_format($product['price']); ?>đ
                </td>
                <td>
                    <?php
                    //hiển thị Thành tiền tương ứng với từng sp
                    $total_product = $product['quality'] * $product['price'];
                    //cộng dồn vào biến Tổng giá trị đơn hàng
                    $total_order += $total_product;
                    echo number_format($total_product);
                    ?>
                </td>
                <td>
                    <a class="content-product-a"
                       href="xoa-san-pham/<?php echo $product_id; ?>">
                        Xóa
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>

            <tr>
                <td colspan="5" style="text-align: right">
                    Tổng giá trị đơn hàng:
                    <span class="product-price">
                        <?php echo number_format($total_order)?>đ
                                                </span>
                </td>
            </tr>
            <tr>
                <td colspan="5" class="product-payment">
                    <input type="submit" name="submit" value="Cập nhật lại giá" class="btn btn-primary">
                    <a href="thanh-toan" class="btn btn-success">Đến trang thanh toán</a>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
<!--Timeline items end -->