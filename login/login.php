<?php
session_start();
include '../config/config.php';

// Khởi tạo biến lỗi
$error = '';

// Kiểm tra nếu session username đã được thiết lập, chuyển hướng người dùng đến trang tương ứng
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $stm = $pdo->prepare('SELECT role FROM users WHERE username=:username');
    $stm->execute(['username' => $username]);
    $data = $stm->fetch(PDO::FETCH_ASSOC);

    if ($data) {
        if ($data['role'] == 1) {
            // Nếu là user
            header('Location: ../user/index.php');
            exit();
        } else {
            // Nếu là admin
            header('Location: ../admin/index.php');
            exit();
        }
    }
}

// Tiếp tục xử lý đăng nhập nếu chưa có session username hoặc không tìm thấy thông tin vai trò trong cơ sở dữ liệu
if (isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $error = 'Yêu cầu nhập đầy đủ thông tin đăng nhập !!!';
    } else {
        $stm = $pdo->prepare('SELECT * FROM users WHERE username=:username AND password=:password');
        $stm->execute(['username' => $username, 'password' => $password]);
        $data = $stm->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            // Xác định vai trò của người dùng dựa trên cột 'role'
            $_SESSION['username'] = $username;
            if ($data['role'] == 1) {
                header('Location: ../user/index.php');
            } else {
                header('Location: ../admin/index.php');
            }
            exit();
        } else {
            $error = 'Thông tin tài khoản hoặc mật khẩu không chính xác !!!';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <style>
        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2>Login</h2>
    <!-- Form gửi dữ liệu về chính trang này -->
    <form method="post" action="../login/login.php" enctype="multipart/form-data">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" name="login" value="Login">
        <a href="./register.php">Register</a>
    </form>
    <?php if ($error): ?>
        <div class="error-message"><?php echo $error; ?></div>
    <?php endif; ?>
</body>
</html>
