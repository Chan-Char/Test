<?php
session_start();

// Kiểm tra nếu có giỏ hàng
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "Giỏ hàng trống. Không thể đặt hàng.";
    exit();
}

// Lấy thông tin từ biểu mẫu
$fullname = $_POST['fullname'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$note = isset($_POST['note']) ? $_POST['note'] : '';
$payment_method = $_POST['payment_method'];
$cart = $_SESSION['cart'];

// Xử lý đơn hàng (lưu vào cơ sở dữ liệu, gửi email, v.v.)
$total = 0;
foreach ($cart as $item) {
    $total += $item['quantity'] * $item['price'];
}

// Thông báo hoàn tất
echo "Cảm ơn bạn đã đặt hàng! Đơn hàng của bạn sẽ được xử lý.";
// Xóa giỏ hàng sau khi đặt hàng
unset($_SESSION['cart']);
?>
