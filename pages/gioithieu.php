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
                <li><a href="dangnhap.php"><i class="fa fa-shopping-bag"></i><span>GIỎ HÀNG</span></a></li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="main">
        <div class=ima>
                <img src="../image/bn.png" alt="" class="b-img"></a>                    
                <div class="o-content">
                <span class="o-text"><a href="../index.php">Trang chủ</a>/ Về chúng tôi</span>                
            </div>
            </div>
            <div class="rte">
				<p>Chào mừng bạn đến với SafeJourney – cửa hàng chuyên cung cấp nón bảo hiểm uy tín và chất lượng hàng đầu. Với phương châm <b> Chở che những chuyến đi, bảo vệ mọi hành trình</b> chúng tôi cam kết mang đến cho khách hàng những sản phẩm nón bảo hiểm đạt chuẩn, bảo vệ bạn trong mỗi chuyến đi.</p>
                <p>Tại SafeJourney, chúng tôi tự hào cung cấp đa dạng các loại nón bảo hiểm từ các thương hiệu nổi tiếng, phù hợp với mọi nhu cầu từ đi lại hằng ngày đến những chuyến phượt đường dài. Không chỉ đảm bảo về chất lượng và độ an toàn, các mẫu nón tại cửa hàng còn mang tính thẩm mỹ cao, hiện đại và thời trang.</p>
                    <img alt="" src="../image/chatluong.php" />
                <p>Đội ngũ nhân viên chuyên nghiệp, tận tâm của SafeJourney luôn sẵn sàng tư vấn và giúp bạn chọn lựa chiếc nón phù hợp nhất với phong cách và nhu cầu sử dụng của mình. Với các tiêu chuẩn nghiêm ngặt về an toàn và thiết kế, chúng tôi đảm bảo mang đến cho bạn sự yên tâm trên mọi cung đường.</p>
                <p>Hãy ghé thăm <b>SafeJourney</b> để trải nghiệm sản phẩm và dịch vụ tốt nhất!</p>
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
