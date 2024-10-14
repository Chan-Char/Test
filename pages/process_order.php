<?php
session_start(); // Khởi động session
require 'db_connection.php'; // Kết nối cơ sở dữ liệu

// Kiểm tra nếu có giỏ hàng
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "Giỏ hàng trống. Không thể đặt hàng.";
    exit();
}

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['user_id'])) {
    echo "Vui lòng đăng nhập để tiếp tục.";
    exit();
}

$user_id = $_SESSION['user_id']; // ID người dùng đăng nhập

// Lấy thông tin từ biểu mẫu
$fullname = $_POST['fullname'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$note = isset($_POST['note']) ? $_POST['note'] : '';
$cart = $_SESSION['cart'];

// Tính tổng tiền
$total = 0;
foreach ($cart as $item) {
    $total += $item['quantity'] * $item['price'];
}

// Bắt đầu transaction
$conn->begin_transaction();

try {
    // Lưu thông tin đơn hàng vào bảng `orders`
    $order_query = $conn->prepare("INSERT INTO orders (user_id) VALUES (?)");
    $order_query->bind_param("i", $user_id);
    $order_query->execute();
    // Lấy ID của đơn hàng vừa được thêm
    $order_id = $order_query->insert_id;

    // Lưu chi tiết sản phẩm vào bảng `order_details`
    foreach ($cart as $product_id => $item) {
        $quantity = $item['quantity'];
        $price = $item['price'];
        $order_details_query = $conn->prepare("INSERT INTO order_details (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        $order_details_query->bind_param("iiid", $order_id, $product_id, $quantity, $price);
        $order_details_query->execute();
    }

    // Hoàn tất transaction
    $conn->commit();

    unset($_SESSION['cart']);
    
}catch (Exception $e) {
    // Nếu có lỗi xảy ra, hoàn tác transaction
    $conn->rollback();
    echo "Có lỗi xảy ra trong quá trình đặt hàng. Vui lòng thử lại sau.";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helmet Store</title>
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
                    <li><a href="giohang.php"><i class="fa fa-shopping-bag"></i><span>GIỎ HÀNG</span></a></li>
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
        <div class="main">
   <style>
        .breadcrumbs {
            color: #222;
            font-weight: 500;
            font-size: 16px;
            box-sizing: border-box;
            padding: 10px;
        }

        .breadcrumbs a.current {
            color: #ccc;
            font-weight: bold;
        }

        .breadcrumbs a {
            color: #ccc;
        }

        .no-click {
            pointer-events: none;
            color: #000;
            font-weight: bold;
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
            <div style="width: 600px; margin-left: auto; margin-right: auto;">
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


<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" img src="../image/camon.gif" alt="Mô tả ảnh GIF">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text" style="width: 500px; margin-left: auto; margin-right: auto;">
                    <h2>Hoàn thành</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form"  style="width:450px; margin-left: auto; margin-right: auto;">
            <h3> >>Cảm ơn bạn đã đặt hàng trên hệ thống của chúng tôi<br>Chúng tôi sẽ sớm liên
                hệ với bạn để chốt đơn hàng!>>
            <img src="../image/camon.gif" alt="Cảm ơn đã đặt hàng" style="width:100%;height:400px;">

            </h3>
            


        </div>
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
                    <i class="fa-solid fa-shop"></i><span>Tên cửa hàng: SafeJourney<span><br>
                    <i class="fa-solid fa-location-dot"></i><span>Địa chỉ cửa hàng: 56 Hoàng Diệu II, TP.Thủ Đức, TP.Hồ Chí Minh<span><br>
                    <i class="fa-solid fa-industry"></i><span>Nhà máy: 36 Tôn Thất Đạm, Quận 1, TP.Hồ Chí Minh<span><br>
                    <i class="fa-solid fa-phone"></i><span>Số điện thoại: (028) 38 291901<span><br>
                    <i class="fa-regular fa-envelope"></i><span>Email liên hệ: SafeJourney2024@gmail.vn <span>  <br>
                    <i class="fa-solid fa-clock"></i><span>Giờ làm việc: 7h-18h<span><br>
                    <i class="fa-solid fa-globe"></i><span>Website:<span>
                </p>
            </div>
    
            <div class="f-right">
                <p>
                    <h2>ĐỊA CHỈ TRÊN BẢN ĐỒ <h2>
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
