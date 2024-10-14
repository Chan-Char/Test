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
        /* CSS styles for breadcrumbs and layout */
        .breadcrumbs {
            color: #222;
            font-weight: 500;
            font-size: 16px;
            box-sizing: border-box;
            padding: 10px;
        }

        .breadcrumbs a.current {
            color: #ccc;
            
        }

        .breadcrumbs a {
            color: #000;
            font-weight: bold;
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

<section class="checkout spad">
    <div class="checkout_form">
        <form action="process_order.php" method="post"> <!-- Chuyển hướng đến trang xử lý đơn hàng -->
            <div class="row-1">
                <div class="col-left">
                    <h3 style="width: 300px; margin-left: auto; margin-right: auto;">ĐỊA CHỈ GIAO HÀNG</h3>
                    <div class="row">
                        <div class="col-6">
                            <div class="checkout_input">
                                <p>Họ&Tên:<span>*</span></p>
                                <input type="text" placeholder="Họ và tên" name="fullname" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="checkout_input">
                                <p>Số điện thoại:<span>*</span></p>
                                <input type="text" placeholder="Số điện thoại" name="phone" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="checkout_input">
                                <p>Địa chỉ:<span>*</span></p>
                                <input type="text" placeholder="Địa chỉ" class="checkout__input__add" name="address" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="checkout_input">
                                <p>Ghi chú:</p>
                                <input type="text" placeholder="Ghi chú về đơn hàng....." class="checkout_note" name="note">
                            </div>
                        </div>
                    </div>                  
                    <h4>Cần hỗ trợ đặt hàng liên hệ: 0919.478.947</h4>
                </div>

                <div class="col-right">
                    <div class="checkout__order">
                        <h3 style="width: 200px; margin-left: auto; margin-right: auto;">ĐƠN HÀNG CỦA BẠN</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Lấy giỏ hàng từ phiên
                                $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
                                $total = 0; // Tổng giá trị đơn hàng

                                // Kiểm tra giỏ hàng có rỗng không
                                if (empty($cart)) {
                                    echo '<tr><td colspan="2">Giỏ hàng của bạn trống.</td></tr>';
                                } else {
                                    foreach ($cart as $item) {
                                        // Tính tổng giá trị đơn hàng
                                        $total += $item['quantity'] * $item['price'];
                                ?>
                                        <tr>
                                            <td style="padding-right: 20px;"><?= htmlspecialchars($item['name']) ?><span>x</span><?= $item['quantity'] ?></td>
                                            <td style="padding-left: 20px;"><?= number_format($item['price'] * $item['quantity'], 0, '', '.') . " VNĐ" ?></td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                                <tr class="order-total">
                                    <td style="text-align: left;">Tổng</td>
                                    <td style="text-align: right;">
                                        <strong><span class="price-amount" style="padding-left: 20px;">
                                            <bdi><?= number_format($total, 0, '', '.') . " VNĐ" ?></bdi></span></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                        <div class="checkout-payment">
                            <ul class="payment_methods">
                                <li class="payment_method_cod">
                                    <input type="radio" class="input-radio" name="payment_method" value="cod" checked="checked" data-order_button_text="">
                                    <label for="payment_method_cod">Trả tiền mặt khi nhận hàng</label>
                                </li>
                                <li class="payment_method_bacs">
                                    <input type="radio" class="input-radio" name="payment_method" value="bacs" data-order_button_text="">
                                    <label for="payment_method_bacs">Chuyển khoản ngân hàng</label>
                                    <div class="payment_method_bacs" style="display:none;">
                                        <p>Thực hiện thanh toán vào ngay tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng Mã đơn hàng của bạn trong phần Nội dung thanh toán. Đơn hàng sẽ được giao sau khi tiền đã chuyển.</p>
                                    </div>
                                </li>
                            </ul>
                        </div class="button-container" href="xulitt.php"  >
                        <button type="submit" class="button-site" style="width: 350px; margin-left: auto; margin-right: auto; font-size: 18px;">Đặt hàng</button></div>
                    </div>
                </div>
            </div>
        </form>
    </div> 
</section>

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

