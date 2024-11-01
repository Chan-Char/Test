<?php
session_start();
require 'db_connection.php'; 
$user_id = $_SESSION['user_id'] ?? null; 

// Khởi tạo giỏ hàng từ cơ sở dữ liệu khi đăng nhập
if ($user_id && !isset($_SESSION['cart'])) {
    $_SESSION['cart'] = []; // Khởi tạo giỏ hàng

    // Lấy giỏ hàng từ cơ sở dữ liệu
    $cart_query = $conn->prepare("SELECT * FROM cart WHERE user_id = ?");
    $cart_query->bind_param("i", $user_id);
    $cart_query->execute();
    $cart_result = $cart_query->get_result();

    // Duyệt qua từng mục trong giỏ hàng và thêm vào session
    while ($cart_item = $cart_result->fetch_assoc()) {
        $product_id = $cart_item['product_id'];

        // Truy vấn thông tin sản phẩm
        $product_query = $conn->prepare("SELECT name, price FROM products WHERE product_id = ?");
        $product_query->bind_param("i", $product_id);
        $product_query->execute();
        $product = $product_query->get_result()->fetch_assoc();

        if ($product) { // Kiểm tra sản phẩm tồn tại
            $_SESSION['cart'][$product_id] = [
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $cart_item['quantity']
            ];
        }
    }
}

// Xử lý khi thêm sản phẩm vào giỏ hàng
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Lấy thông tin sản phẩm từ cơ sở dữ liệu
    $product_query = $conn->prepare("SELECT name, price FROM products WHERE product_id = ?");
    $product_query->bind_param("i", $product_id);
    $product_query->execute();
    $product = $product_query->get_result()->fetch_assoc();

    if ($product) { // Nếu sản phẩm tồn tại
        $name = $product['name'];
        $price = $product['price'];

        // Thêm hoặc cập nhật sản phẩm trong session
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$product_id] = [
                'name' => $name,
                'price' => $price,
                'quantity' => $quantity
            ];
        }

        // Nếu người dùng đã đăng nhập, lưu giỏ hàng vào cơ sở dữ liệu
        if ($user_id) {
            $cart_check = $conn->prepare("SELECT * FROM cart WHERE user_id = ? AND product_id = ?");
            $cart_check->bind_param("ii", $user_id, $product_id);
            $cart_check->execute();
            $cart_item = $cart_check->get_result()->fetch_assoc();

            if ($cart_item) {
                $new_quantity = $cart_item['quantity'] + $quantity;
                $update_query = $conn->prepare("UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?");
                $update_query->bind_param("iii", $new_quantity, $user_id, $product_id);
                $update_query->execute();
            } else {
                $insert_query = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)");
                $insert_query->bind_param("iii", $user_id, $product_id, $quantity);
                $insert_query->execute();
            }
        }
    }

    // Chuyển hướng đến trang giỏ hàng
    header("Location: giohang.php");
    exit();
}
?>
