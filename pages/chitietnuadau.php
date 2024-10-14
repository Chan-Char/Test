<?php
session_start();

// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = ""; // Mật khẩu của bạn
$dbname = "helmet"; // Tên cơ sở dữ liệu của bạn

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Lấy dữ liệu sản phẩm từ cơ sở dữ liệu
$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : 1;

$sql = "SELECT * FROM products WHERE product_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$currentProduct = $result->fetch_assoc();

// Đảm bảo có giá trị mặc định nếu dữ liệu không tồn tại
if (!$currentProduct) {
    echo "<p>Sản phẩm không tồn tại.</p>";
    exit; // Dừng chương trình nếu không có sản phẩm
}

$name = $currentProduct['name'] ?? 'Tên sản phẩm không có sẵn';
$description = $currentProduct['description'] ?? 'Mô tả không có sẵn';
$price = $currentProduct['price'] ?? 0; // Đặt giá mặc định là 0
$image = $currentProduct['image'] ?? 'default.png'; // Bạn có thể thay thế 'default.png' bằng ảnh mặc định của bạn
$quantity = $currentProduct['quantity'] ?? 0; // Đặt số lượng mặc định là 0

// Đóng kết nối
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/3192225934.js" crossorigin="anonymous"></script>
    <title><?php echo htmlspecialchars($name); ?></title>
    <link rel="stylesheet" href="../css/2.style.css">
</head>
<body>
<div class="wrapper">
    <div class="header">
        <img src="../image/banner.jpg" style="width:100%;height:400px;">
    </div>
    <div class="menu">
        <ul class="list_menu">
            <li><a href="index.php">HOME</a></li>
            <li><a href="gioithieu.php">VỀ CHÚNG TÔI</a></li>
            <li><a href="chinhsach.php">CHÍNH SÁCH</a></li>
            <li class="dropdown">
                <a href="sanpham.php">SẢN PHẨM</a>
                <ul class="sub-menu">
                    <li><a href="nonbaphan.php">Mũ bảo hiểm 3/4 đầu</a></li>
                    <li><a href="fullface.php">Mũ Bảo Hiểm Fullface</a></li>
                    <li><a href="nuadau.php">Mũ bảo hiểm 1/2</a></li>
                    <li><a href="nonkinh.php">Mũ bảo hiểm trẻ em</a></li>
                </ul>
            </li>
            <li><a href="lienhe.php">LIÊN HỆ</a></li>
        </ul>
        <ul class="list_icons">
            <li class="li_user">
            <?php if (isset($_SESSION['username'])): ?>
                <a href=""><i class="fa fa-user"></i><span><?php echo htmlspecialchars($_SESSION['username']); ?></span></a>
                <ul class="sub-user">
                    <li><a href="dangxuat.php">ĐĂNG XUẤT</a></li>
                </ul>
                <li><a href="giohang.php"><i class="fa fa-shopping-bag"></i><span>GIỎ HÀNG</span></a></li>
            <?php else: ?>
                <a href=""><i class="fa fa-user"></i><span>TÀI KHOẢN</span></a>
                <ul class="sub-user">
                    <li><a href="dangnhap.php">ĐĂNG NHẬP</a></li>
                    <li><a href="dangky.php">ĐĂNG KÝ</a></li>
                </ul>
                <li><a href="giohang.php"><i class="fa fa-shopping-bag"></i><span>GIỎ HÀNG</span></a></li>
            <?php endif; ?>
        </ul>
    </div>
        
    <div class="main">
    <div class="product-container">
        <div class="product-info">
            <h2><?php echo htmlspecialchars($name); ?></h2>
        
            <p class="price"><?php echo htmlspecialchars($price); ?> VND</p>
            <div class="product-image">
            <img src="../<?php echo $currentProduct['images']; ?>" alt="<?php echo $currentProduct['name']; ?>">
        </div>
           </br> <p class="quantity"> Số lượng: <?php echo htmlspecialchars($quantity); ?></p>
            <div class="add">
                <form action="<?php if (isset($_SESSION['username'])): 
                 echo "addcart.php";?>
            <?php else: 
                 echo "dangnhap.php";?>
            <?php endif; ?>" method="post">
                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                    <input type="hidden" name="name" value="<?php echo htmlspecialchars($name); ?>">
                    <input type="hidden" name="price" value="<?php echo htmlspecialchars($price); ?>">
                    <input type="hidden" name="quantity" value="1"> <!-- Hoặc thay đổi tùy vào số lượng khách hàng muốn mua -->
                    <button type="submit" class="btn-red" >THÊM VÀO GIỎ HÀNG</button>
                </form>
         
            </div>
            </div>
            <div class="product-info2">
                <p><?php echo htmlspecialchars($description); ?></p>
            </div>
        </div>
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
                <h2>VỀ CHÚNG TÔI</h2>
                <i class="fa-solid fa-shop"></i><span>Tên cửa hàng: SafeJourney<span><br>
                <i class="fa-solid fa-location-dot"></i><span>Địa chỉ cửa hàng: 56 Hoàng Diệu II, TP.Thủ Đức, TP.Hồ Chí Minh<span><br>
                <i class="fa-solid fa-industry"></i><span>Nhà máy: 36 Tôn Thất Đạm, Quận 1, TP.Hồ Chí Minh<span><br>
                <i class="fa-solid fa-phone"></i><span>Số điện thoại: (028) 38 291901<span><br>
                <i class="fa-regular fa-envelope"></i><span>Email liên hệ: SafeJourney2024@gmail.vn<span><br>
                <i class="fa-solid fa-clock"></i><span>Giờ làm việc: 7h-18h<span><br>
                <i class="fa-solid fa-globe"></i><span>Website:<span>
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
</body>
</html>
