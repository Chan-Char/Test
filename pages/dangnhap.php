<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐĂNG NHẬP</title>
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
                <li><a href="../index.php">HOME</a></li>
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
                </li>
                <li><a href="lienhe.php">LIÊN HỆ</a></li>
            </ul>
        </div>
        <div class="main">
            <div class="boxlogin">
                <form action="dangnhap.php" method="post">
                    <h2 style="text-align: center;"> ĐĂNG NHẬP</h2>
                    <table>
                    <tr>
                        <td><label for="user"><p><b>Tài khoản:</b></p></label></td>
                        <td><input type="text" id="user" name="user" placeholder="Enter username"></td>
                    </tr>
                    <tr>
                        <td><label for="pass"><p><b>Password:</b></p></label></td>
                        <td><input type="password" id="pass" name="pass" placeholder="Enter password"></td>
                    </tr>
                    <tr>
                        <td>Bạn mới biết đến shop?</td> 
                        <td><a href="dangky.php">ĐĂNG KÝ</a></td> 
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="login" value="login"></td>
                    </tr>
                    </table>
                    <?php
            session_start(); // Khởi động session

            // Kết nối tới cơ sở dữ liệu
                $host = 'localhost';
                $db = 'Helmet';
                $user = 'root';
                $pass = '';

            $conn = new mysqli($host, $user, $pass, $db);

            // Kiểm tra kết nối
            if ($conn->connect_error) {
                die("Kết nối thất bại: " . $conn->connect_error);
            }
        // Lấy thông tin từ form
        if (isset($_POST['login'])) {
            $username = isset($_POST['user']) ? $_POST['user'] : '';
            $password = isset($_POST['pass']) ? $_POST['pass'] : '';

            $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION['username'] = $username; 
                $_SESSION['user_id'] = $row['user_id']; // Lưu ID người dùng vào session
        
            // Truy vấn giỏ hàng của người dùng
                $cart_sql = "SELECT * FROM cart WHERE user_id='" . $row['id'] . "'";
                $cart_result = $conn->query($cart_sql);
        
                $cart_items = [];
                if ($cart_result->num_rows > 0) {
                    while ($cart_row = $cart_result->fetch_assoc()) {
                        $cart_items[] = $cart_row; // Lưu từng sản phẩm vào mảng giỏ hàng
                    }
                }
                    $_SESSION['cart'] = $cart_items; // Lưu giỏ hàng vào session
                header("Location: ../index.php"); 
                exit();
            } 
            else{
                echo "Tài khoản hoặc mật khẩu không đúng.";
                }
            $conn->close();
        }
        ?>
                </form>
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
