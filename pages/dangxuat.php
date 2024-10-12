<?php
session_start();
session_unset(); // Xóa tất cả các biến trong session
session_destroy(); // Hủy session
header("Location: ../index.php"); // Chuyển hướng đến trang đăng nhập
exit();
?>