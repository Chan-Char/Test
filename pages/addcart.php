<?php
session_start();

// Khởi tạo giỏ hàng nếu chưa tồn tại
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Xử lý thêm sản phẩm vào giỏ hàng
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] += $quantity; // Tăng số lượng
    } else {
        $_SESSION['cart'][$product_id] = [
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity
        ];
    }

    // Debug: In giỏ hàng sau khi thêm sản phẩm
    echo "<pre>";
    print_r($_SESSION['cart']);
    echo "</pre>";

    // Chuyển hướng đến trang giỏ hàng
    header("Location: giohang.php");
    exit();
}
?>
