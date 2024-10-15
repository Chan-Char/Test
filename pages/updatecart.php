<?php
session_start();
require 'db_connection.php'; 
$user_id = $_SESSION['user_id']; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $quantity = (int) $_POST['quantity'];

    // Cập nhật trong session
    if (isset($_SESSION['cart'][$product_id])) {
        if ($quantity > 0) {
            $_SESSION['cart'][$product_id]['quantity'] = $quantity;
        } else {
            unset($_SESSION['cart'][$product_id]); // Xóa sản phẩm khỏi session nếu số lượng <= 0
        }
    }

    // Cập nhật trong cơ sở dữ liệu
    if (isset($_SESSION['user_id'])) {
        if ($quantity > 0) {
            // Cập nhật số lượng sản phẩm trong CSDL
            $update_query = $conn->prepare("UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?");
            $update_query->bind_param("iii", $quantity, $user_id, $product_id);
            $update_query->execute();
        } else {
            // Xóa sản phẩm khỏi giỏ hàng trong CSDL nếu số lượng <= 0
            $delete_query = $conn->prepare("DELETE FROM cart WHERE user_id = ? AND product_id = ?");
            $delete_query->bind_param("ii", $user_id, $product_id);
            $delete_query->execute();
        }
    }

    // Chuyển hướng về trang giỏ hàng sau khi cập nhật
    header("Location: giohang.php");
    exit();
}
?>
