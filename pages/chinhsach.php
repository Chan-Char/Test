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
                <span class="o-text"><a href="../index.php">Trang chủ</a>/ Chính sách</span>                
            </div>
            </div>
            <div class="cs">
				<p>Tại <b>SafeJourney</b>, chúng tôi luôn cam kết mang đến sự hài lòng và đảm bảo quyền lợi tốt nhất cho khách hàng. Dưới đây là các chính sách quan trọng của cửa hàng:</p>
                <h1>Chính Sách Cửa Hàng SafeJourney</h1>
                    <h2>1. Chính Sách Đổi Trả</h2>
                    <ul>
                    <li><strong>Thời gian đổi trả:</strong> Khách hàng có thể đổi trả sản phẩm trong vòng 7 ngày kể từ ngày nhận hàng, với điều kiện sản phẩm chưa qua sử dụng và còn nguyên tem mác, hộp đựng.</li>
                    <li><strong>Điều kiện đổi trả:</strong> Sản phẩm phải còn nguyên vẹn, không bị trầy xước, hư hỏng do sử dụng. Hóa đơn mua hàng và các phụ kiện kèm theo (nếu có) phải được cung cấp đầy đủ.</li>
                    <li><strong>Chi phí đổi trả:</strong> Cửa hàng sẽ chịu phí vận chuyển trong trường hợp sản phẩm bị lỗi do nhà sản xuất. Đối với các trường hợp đổi trả vì lý do cá nhân (không phù hợp kích cỡ, màu sắc…), khách hàng sẽ chịu phí vận chuyển.</li>
                    </ul>
                <h2>2. Chính Sách Bảo Hành</h2>
                <ul>
                    <li><strong>Thời gian bảo hành:</strong> Nón bảo hiểm được bảo hành trong vòng 12 tháng đối với các lỗi do nhà sản xuất.</li>
                    <li><strong>Điều kiện bảo hành:</strong> Áp dụng cho các lỗi kỹ thuật như gãy quai, hỏng khóa, lỗi chất liệu vỏ nón. Không áp dụng bảo hành đối với các hư hỏng do va đập mạnh, sử dụng sai cách hoặc tự ý sửa chữa.</li>
                    <li><strong>Quy trình bảo hành:</strong> Khách hàng có thể mang sản phẩm đến cửa hàng hoặc gửi qua đường bưu điện kèm theo hóa đơn mua hàng để được bảo hành.</li>
                </ul>
                    <h2>3. Chính Sách Vận Chuyển</h2>
                <ul>
                    <li><strong>Phạm vi giao hàng:</strong> SafeJourney giao hàng trên toàn quốc, thông qua các đối tác vận chuyển uy tín.</li>
                    <li><strong>Thời gian giao hàng:</strong> Tùy thuộc vào địa điểm, thời gian giao hàng từ 2-5 ngày làm việc.</li>
                    <li><strong>Phí vận chuyển:</strong> Miễn phí vận chuyển cho đơn hàng từ 500.000 đồng trở lên. Đối với đơn hàng dưới 500.000 đồng, phí vận chuyển sẽ được tính theo biểu phí của đơn vị giao hàng.</li>
                </ul>
                    <h2>4. Chính Sách Thanh Toán</h2>
                    <li><strong>Phương thức thanh toán:</strong> Cửa hàng chấp nhận các phương thức thanh toán như tiền mặt khi nhận hàng (COD), chuyển khoản ngân hàng, và thanh toán qua ví điện tử.</li>
                    <li><strong>Bảo mật thông tin thanh toán:</strong> SafeJourney cam kết bảo mật thông tin cá nhân và tài khoản thanh toán của khách hàng. Thông tin của bạn sẽ được xử lý an toàn và không chia sẻ với bên thứ ba.</li>
                <h2>5. Chính Sách Chăm Sóc Khách Hàng</h2>
                <ul>
                    <p>Đội ngũ hỗ trợ khách hàng của SafeJourney luôn sẵn sàng giải đáp các thắc mắc, tư vấn sản phẩm, và hỗ trợ quá trình mua hàng. Quý khách có thể liên hệ với chúng tôi qua hotline hoặc email, từ 8h00 đến 20h00 hằng ngày.</p>
                </ul>
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
