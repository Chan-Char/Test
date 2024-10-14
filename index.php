<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helmet Store</title>
    <link rel="stylesheet" href="css/1.style.css">
    <script src="https://kit.fontawesome.com/3192225934.js" crossorigin="anonymous"></script>
</head>
<body>
   <div class="wrapper">
        <div class="header">
            <img src="image/banner.jpg" style="width:100%;height:400px;">
        </div>
        <div class="menu">
            <ul class="list_menu">
                <li><a href="index.php">HOME</a></li>
                <li><a href="pages/gioithieu.php">VỀ CHÚNG TÔI</a></li>
                <li><a href="pages/chinhsach.php">CHÍNH SÁCH</a></li>
                <li class="dropdown">
                <a href="pages/sanpham.php">SẢN PHẨM</a>
                    <ul class="sub-menu">
                        <li><a href="nonbaphan.php">Mũ bảo hiểm 3/4 đầu</a></li>
                        <li><a href="fullface.php">Mũ Bảo Hiểm Fullface</a> </li>
                        <li><a href="nuadau.php">Mũ bảo hiểm 1/2</a> </li>
                        <li><a href="nonkinh.php">Mũ bảo hiểm có kính</a></li>
                    </ul>
                <li><a href="pages/lienhe.php">LIÊN HỆ</a></li>
            </ul>
            <ul class="list_icons">
                <li class="li_user">
                <?php if (isset($_SESSION['username'])): ?>
                    <a href=""><i class="fa fa-user"></i><span><?php echo $_SESSION['username']; ?></span></a>
                    <ul class="sub-user">
                        <li><a href="pages/dangxuat.php">ĐĂNG XUẤT</a></li>
                    </ul>
                    <li><a href="pages/giohang.php"><i class="fa fa-shopping-bag"></i><span>GIỎ HÀNG</span></a></li>
                <?php else: ?>
                    <a href=""><i class="fa fa-user"></i><span>TÀI KHOẢN</span></a>
                    <ul class="sub-user">
                        <li><a href="pages/dangnhap.php">ĐĂNG NHẬP</a></li>
                        <li><a href="pages/dangky.php">ĐĂNG KÝ</a> </li>
                    </ul>
                <li><a href="pages/dangnhap.php"><i class="fa fa-shopping-bag"></i><span>GIỎ HÀNG</span></a></li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="main">
                <h2> TOP 5 SẢN PHẨM BÁN CHẠY</h2>
        <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "helmet";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT p.product_id, p.name, p.price, p.images, SUM(oi.quantity) AS total_sold
        FROM products p
        LEFT JOIN order_items oi ON p.product_id = oi.product_id
        GROUP BY p.product_id
        ORDER BY total_sold DESC
        LIMIT 5";
        $result = $conn->query($sql);
        ?>

        <div class="product-slider">
        <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="product">
            <img src= "<?php echo $row['images']; ?>" alt="<?php echo $row['name']; ?>">
            <h2><a href="<?php echo "pages/chitietnuadau.php?product_id=".$row['product_id']?>"><?php echo $row['name']; ?></a></h2>
            <p>Price: <?php echo $row['price']; ?></p>
            </div>
        <?php endwhile; ?>
        <?php else: ?>
            <p>No products found</p>
        <?php endif; ?>
    </div>
<?php
$conn->close();
?>
        <h2> DANH MỤC SẢN PHẨM</h2>
<div class="container">
        <div class="service-card" onclick="window.location.href='pages/nuadau.php'">
            <img src="image/NUADAU.PNG" alt="Nón nữa đầu">
            <div class="service-name">
                <a href="pages/nuadau.php">Nón nữa đầu</a>
            </div>
        </div>

        <div class="service-card" onclick="window.location.href='pages/nonbaphan.php'">
            <img src="image/BAPHAN.PNG" alt="Nón ba phần tư">
            <div class="service-name">
                <a href="pages/nonbaphan.php">Nón ba phần tư</a>
            </div>
        </div>

        <div class="service-card" onclick="window.location.href='pages/fullface.php'">
            <img src="image/FULLFACE.PNG" alt="Nón full face">
            <div class="service-name">
                <a href="pages/fullface.php">Nón Full Face</a>
            </div>
        </div>

        <div class="service-card" onclick="window.location.href='pages/nonkinh.php'">
            <img src="image/NONKINH.PNG" alt="Nón có kính">
            <div class="service-name">
                <a href="pages/nonkinh.php">Nón có kính</a>
            </div>
        </div>
    </div>
        </div>
        <div class="footer">
            <div class="f-left">
                <p>
                    <a href=""><img src="image/logo.png" alt="" style="width:80px;height:80px;"></a>
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
                        <img src="image/bando.png" alt="" style="width:200px;height: 200px;">
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
