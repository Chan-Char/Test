<?php
session_start();
require 'db_connection.php'; 

// Xóa sản phẩm khỏi giỏ hàng
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Xóa sản phẩm khỏi session
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }

    // Xóa sản phẩm khỏi cơ sở dữ liệu nếu người dùng đã đăng nhập
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $delete_query = $conn->prepare("DELETE FROM cart WHERE user_id = ? AND product_id = ?");
        $delete_query->bind_param("ii", $user_id, $product_id);
        $delete_query->execute();
    }

    // Chuyển hướng về trang giỏ hàng
    header("Location: giohang.php");
    exit();
}
