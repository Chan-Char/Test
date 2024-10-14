<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB_HELMET</title>
    <link rel="stylesheet" href="../css/1.style.css">
    <script src="https://kit.fontawesome.com/3192225934.js" crossorigin="anonymous"></script>
</head>
<body>
   <div class="wrapper">
    <div class="header">
            <img src="../image/banner.jpg" style="width:100%;height:400px;">
        </div>
        <div class="menu">
            <ul class="list_menu">
                <li><a href="../index.php">TRANG CHỦ</a></li>
                <li><a href="gioithieu.php">VỀ CHÚNG TÔI</a></li>
                <li><a href="chinhsach.php">CHÍNH SÁCH</a></li>
                <li class="dropdown">
                    <a href="sanpham.php">SẢN PHẨM</a>
                    <ul class="sub-menu">
                        <li><a href="nonbaphan.php">Mũ bảo hiểm 3/4 đầu</a></li>
                        <li><a href="fullface.php">Mũ Bảo Hiểm Fullface</a> </li>
                        <li><a href="nuadau.php">Mũ bảo hiểm 1/2</a> </li>
                        <li><a href="nonkinh.php">Mũ bảo hiểm có kính</a></li>
                    </ul>
                <li><a href="lienhe.php">LIÊN HỆ</a></li>
            </ul>
            <ul class="list_icons">
                <li class="li_user">
                <?php if (isset($_SESSION['username'])): ?>
                    <a href=""><i class="fa fa-user"></i><span><?php echo $_SESSION['username']; ?></span></a>
                    <ul class="sub-user">
                        <li><a href="dangxuat.php">ĐĂNG XUẤT</a></li>
                    </ul>
                    <li><a href="cart.php"><i class="fa fa-shopping-bag"></i><span>GIỎ HÀNG</span></a></li>
                <?php else: ?>
                    <a href=""><i class="fa fa-user"></i><span>TÀI KHOẢN</span></a>
                    <ul class="sub-user">
                        <li><a href="dangnhap.php">ĐĂNG NHẬP</a></li>
                        <li><a href="dangky.php">ĐĂNG KÝ</a> </li>
                    </ul>
                <li><a href="giohang.php"><i class="fa fa-shopping-bag"></i><span>GIỎ HÀNG</span></a></li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="main" >
                <link rel="stylesheet" href="../css/3.style.css">
    <style>
        .breadcrumbs {
            color: #222;
            font-weight: 500;
            font-size: 16px;
            box-sizing: border-box;
            padding: 10px;
        }

        .breadcrumbs a.current {
            color: #111;
            font-weight: bold;
        }

        .breadcrumbs a {
            color: #ccc;
        }

        .no-click {
            pointer-events: none;
            color: #ccc;
        }

        .breadcrumbs a:hover {
            color: #296489;
        }

        .breadcrumbs .divider {
            margin: 0 .3em;
            opacity: .35;
        }
    </style>
</head>
<body>
<div class="page-title"> 
    <div class="page-title-inner">
        <div class="flex-col flex-grow medium-text-center">
            <div style="width: 500px; margin-left: auto; margin-right: auto;">
                <h2>
                    <nav class="breadcrumbs">
                        <a href="giohang.php" class="current" style="text-decoration: none;">Giỏ hàng</a>
                        <span class="divider"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                        <a href="checkout.php" class="hide-for-small" style="text-decoration: none;">Chi tiết thanh toán</a>
                        <span class="divider"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                        <span class="no-click">Hoàn tất</span>
                    </nav>
                </h2>
            </div>
        </div>
    </div>
</div>

<form method="post" action="giohang.php">
    <div class="cart-page">
        <!-- Cột trái: Giỏ hàng -->
        <div class="left_column">
            <div class="cart-container page-wrapper page-checkout">
                <div class="commerce">
                    <table class="shop_table" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="product-name" colspan="2">Sản phẩm</th>
                                <th class="product-price">Giá</th>
                                <th class="product-quantity">Số lượng</th>
                                <th class="product-subtotal">Thành tiền</th>
                                <th class="product-action">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        // Khởi tạo giỏ hàng
                        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
                        $count = 0; // Số thứ tự
                        $total = 0; // Tổng giỏ hàng

                        if (empty($cart)) { // Kiểm tra giỏ hàng có rỗng không
                            echo '<tr><td colspan="7">Giỏ hàng của bạn trống.</td></tr>'; // Thông báo nếu giỏ hàng trống
                        } else {
                            foreach ($cart as $product_id => $item) { // Sử dụng $product_id làm khóa
                                $total += $item['quantity'] * $item['price'];
                        ?>
                                <tr class="cart-item">
                                    <form action="updatecart.php?id=<?= $product_id ?>" method="POST"> <!-- Sửa biến từ product sang product_id -->
                                        <input type="hidden" name="product_id" value="<?= $product_id ?>">
                                        <td><?= ++$count ?></td>
                                        <td><?= htmlspecialchars($item['name']) ?></td> <!-- Sử dụng $item để lấy thông tin -->
                                        <td><?= number_format($item['price'], 0, '', '.') . " VNĐ" ?></td>
                                        <td>
                                            <input type="number" name="quantity" value="<?= $item['quantity'] ?>" min="1" />
                                        </td>
                                        <td><?= number_format($item['price'] * $item['quantity'], 0, '', '.') . " VNĐ" ?></td>
                                        <td>
                                        <input type="hidden" name="product_id" value="<?= $product_id ?>">
                                        <button type="submit">Cập nhật</button>
                                        </td>
                                        <td>
                                            <a href='deletecart.php?id=<?= $product_id ?>' class="btn-danger">Xóa</a> <!-- Sửa biến từ product sang product_id -->
                                        </td>
                                    </form>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>


                    </table>
                    <div class="cart-actions">
                        <ul class="continue-shopping">
                            <li>
                                <a class="is-outline" href="sanpham.php">←&nbsp;Tiếp tục xem sản phẩm</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cột phải: Tổng giỏ hàng -->
        <div class="right_column">
            <div class="cart-collaterals">
                <div class="cart_totals">
                    <h3>Tổng giỏ hàng</h3>
                    <table cellspacing="0" class="shop_table">
                        <tbody>
                            <tr class="cart-subtotal">
                                <th>Tạm tính</th>
                                <td><span class="Price"><?= number_format($total, 0, '', '.') . " VNĐ" ?></span></td>
                            </tr>
                            <tr class="shipping">
                                <th>Giao hàng</th>
                                <td>
                                    <ul id="shipping_method" class="shipping_lists">
                                        <li>
                                            <input type="radio" name="shipping_method" value="free_shipping" checked="checked">
                                            <label>Giao thường: miễn phí</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="shipping_method" value="flat_rate">
                                            <label>Phí giao nhanh: 30.000VNĐ</label>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr class="order-total">
                                <th>Tổng cộng</th>
                                <td><strong><?= number_format($total, 0, '', '.') . " VNĐ" ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="checkout">
                        <a href="checkout.php" class="button checkout" style="text-decoration: none;">Tiến hành thanh toán</a>
                    </div>
                    <form class="checkout_coupon" method="post">
                        <div class="coupon">
                            <h3><i class="fa fa-tag"></i> Phiếu ưu đãi</h3>
                            <input type="text" name="coupon_code" class="input-text" placeholder="Mã ưu đãi">
                            <input type="submit" class="is-form" name="apply_coupon" value="Áp dụng">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
        <div class="footer">
            <div class="f-left">
                <p>
                    <a href=""><img src="../image/logo.png" alt="" style="width:80px;height:80px;"></a>
                    <br> Chở che những chuyến đi, bảo vệ mọi hành trình<br>
                </p>
            </div>
    
            <div class="f-mid">
                <p>
                    <h2> VỀ CHÚNG TÔI </h2>
                    <i class="fa-solid fa-shop"></i><span>Tên cửa hàng: SafeJourney</span><br>
                    <i class="fa-solid fa-location-dot"></i><span>Địa chỉ cửa hàng: 56 Hoàng Diệu II, TP.Thủ Đức, TP.Hồ Chí Minh</span><br>
                    <i class="fa-solid fa-industry"></i><span>Nhà máy: 36 Tôn Thất Đạm, Quận 1, TP.Hồ Chí Minh</span><br>
                    <i class="fa-solid fa-phone"></i><span>Số điện thoại: (028) 38 291901</span><br>
                    <i class="fa-regular fa-envelope"></i><span>Email liên hệ: SafeJourney2024@gmail.vn</span><br>
                    <i class="fa-solid fa-clock"></i><span>Giờ làm việc: 7h-18h</span><br>
                    <i class="fa-solid fa-globe"></i><span>Website:</span>
                </p>
            </div>
    
            <div class="f-right">
                <p>
                    <h2>ĐỊA CHỈ TRÊN BẢN ĐỒ</h2>
                    <a href="https://maps.app.goo.gl/4g3DJTLHmXVE9Yq78">
                        <img src="../image/bando.png" alt="" style="width:200px;height: 200px;">
                    </a>
                </p>
            </div>
            <div class="f-bot">
                <ul class="social">
                    <li><a href=""><i class="fa-brands fa-facebook"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-tiktok"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>
                </ul>
                <p> © 2024 SafeJourney. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>


