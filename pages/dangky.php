<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐĂNG KÝ</title>
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
                    <a href="danhmucsp.php">SẢN PHẨM</a>
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
                <ul class="list_icons">
                <li class="li_user">
                    <a href="dangnhap.php"></i><span>ĐĂNG NHẬP</span></a>
            </ul>
            </ul>
        </div>
        <div class="main">
        <div class="boxsignup">
        <form action="dangky.php" method="post">
        <h2 style="text-align: center;">ĐĂNG KÝ</h2>
            <table>
                <tr>
                    <td><label for="user"><p><b>Tài khoản:</b></p></label></td>
                    <td><input type="text" name="user" placeholder="Enter username"></td>
                </tr>
                <tr>
                    <td><label for="email"><p><b>Email:</b></p></label></td>
                    <td><input type="text" name="email" placeholder="Enter email"></td>
                </tr>
                <tr>
                    <td><label for="pass"><p><b>Password:</b></p></label></td>
                    <td><input type="password" name="pass" placeholder="Enter password"></td>
                </tr>
                <tr>
                    <td><label for="confirm"><p><b>Comfirm Password:</b></p></label></td>
                    <td><input type="password" name="confirm" placeholder="Enter password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="signup" value="signup"></td>
                </tr>
            </table>
        </form> 
        <?php
session_start(); 

$host = 'localhost';
$db = 'Helmet';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
if (isset($_POST['signup'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['user'];
        $password = $_POST['pass'];
        $confirm= $_POST['confirm'];
        $email = $_POST['email'];
    
        $check_user = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($check_user);
    
        if ($result->num_rows > 0) {
            echo "Tên người dùng đã tồn tại. Vui lòng chọn tên khác.";
        } 
        else {
            if ($password !== $confirm) {
                echo "Mật khẩu xác nhận không khớp.";
            } else {
                $sql = "INSERT INTO users (username,password,email) VALUES ('$username','$password','$email')";
            
                if ($conn->query($sql) === TRUE) {
                    echo "Đăng ký thành công. Bạn có thể đăng nhập ngay bây giờ.";
                } else {
                    echo "Lỗi: " . $sql . "<br>" . $conn->error;
                }
            }
        }
            $conn->close();
    }
}
   
?>
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