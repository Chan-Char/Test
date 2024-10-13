<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $quantity = (int) $_POST['quantity'];

    // Kiểm tra giỏ hàng đã tồn tại sản phẩm này chưa
    if (isset($_SESSION['cart'][$product_id])) {
        if ($quantity > 0) {
            // Cập nhật số lượng sản phẩm
            $_SESSION['cart'][$product_id]['quantity'] = $quantity;
        } else {
            // Nếu số lượng <= 0 thì xóa sản phẩm khỏi giỏ hàng
            unset($_SESSION['cart'][$product_id]);
        }
    }
}

// Chuyển hướng về trang giỏ hàng sau khi cập nhật
header("Location: giohang.php");
exit();
?>


