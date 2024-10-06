<?php
session_start();
include("./config/config.php");

// Kiểm tra nếu người dùng đã đăng nhập
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $stm = $pdo->prepare('SELECT role FROM users WHERE username=:username');
    $stm->execute(['username' => $username]);
    $data = $stm->fetch(PDO::FETCH_ASSOC);

    if ($data) {
        // Chuyển hướng dựa trên vai trò
        if ($data['role'] == 1) {
            header('Location: ./user/index.php'); // Chuyển đến trang user
            exit();
        } else {
            header('Location: ./admin/index.php'); // Chuyển đến trang admin
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Welcome to the Home Page</h1>
    <p>Please log in to access your account.</p>
    <a href="./login/login.php">
        <button>Login</button>
    </a>
</body>
</html>
