<?php
session_start();
require 'db_connection.php'; 
$user_id = $_SESSION['user_id']; 

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

    // Nếu người dùng đã đăng nhập, lưu giỏ hàng vào cơ sở dữ liệu
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        // Kiểm tra sản phẩm đã tồn tại trong giỏ hàng của người dùng trong CSDL chưa
        $query = $conn->prepare("SELECT * FROM cart WHERE user_id = ? AND product_id = ?");
        $query->bind_param("ii", $user_id, $product_id); // 'ii' là kiểu dữ liệu: cả user_id và product_id đều là số nguyên
        $query->execute();
        $result = $query->get_result();
        $cart_item = $result->fetch_assoc();

        if ($cart_item) {
            // Nếu sản phẩm đã có trong CSDL, cập nhật số lượng
            $new_quantity = $cart_item['quantity'] + $quantity;
            $update_query = $conn->prepare("UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?");
            $update_query->bind_param("iii", $new_quantity, $user_id, $product_id); // Cả 3 đều là số nguyên
            $update_query->execute();
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng của CSDL, thêm mới
            $insert_query = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)");
            $insert_query->bind_param("iii", $user_id, $product_id, $quantity); // 'iii' là các kiểu: 3 số nguyên
            $insert_query->execute();
        }

        // Tải lại tất cả sản phẩm từ cơ sở dữ liệu vào session
        $cart_query = $conn->prepare("SELECT * FROM cart WHERE user_id = ?");
        $cart_query->bind_param("i", $user_id);
        $cart_query->execute();
        $cart_result = $cart_query->get_result();

        while ($cart_item = $cart_result->fetch_assoc()) {
            $_SESSION['cart'][$cart_item['product_id']] = [
                'quantity' => $cart_item['quantity'],
                'name' => $name, // Giả sử tên và giá không thay đổi từ form
                'price' => $price
            ];
        }
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
