<?php
session_start(); // Bắt đầu phiên làm việc

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Xóa sản phẩm khỏi giỏ hàng
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }

    // Chuyển hướng về trang giỏ hàng
    header("Location: giohang.php");
    exit();
} else {
    echo "Có lỗi xảy ra khi xóa sản phẩm.";
}
?>
