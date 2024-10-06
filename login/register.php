<?php
// session_start();
// include("./config/config.php");

// // Khởi tạo biến lỗi
// $error = '';

// // Xử lý đăng ký khi có POST request
// if (isset($_POST['register'])) {
//     $username = $_POST['username'] ?? '';
//     $password = $_POST['password'] ?? '';
//     $email = $_POST['email'] ?? '';

//     // Kiểm tra thông tin đầu vào
//     if (empty($username) || empty($password) || empty($email)) {
//         $error = 'Vui lòng điền đầy đủ thông tin !!!';
//     } else {
//         // Kiểm tra xem tên người dùng đã tồn tại chưa
//         $stm = $pdo->prepare('SELECT * FROM users WHERE username = :username');
//         $stm->execute(['username' => $username]);
//         $existingUser = $stm->fetch(PDO::FETCH_ASSOC);

//         if ($existingUser) {
//             $error = 'Tên người dùng đã tồn tại !!!';
//         } else {
//             // Thêm người dùng mới vào cơ sở dữ liệu
//             $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
//             $stm = $pdo->prepare('INSERT INTO users (username, password, email) VALUES (:username, :password, :email)');
//             $stm->execute(['username' => $username, 'password' => $hashedPassword, 'email' => $email]);

//             // Chuyển hướng đến trang đăng nhập sau khi đăng ký thành công
//             header('Location: ./login.php');
//             exit();
//         }
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2>Register</h2>
    <form method="post" action="">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        <br>
        <input type="submit" name="register" value="Register">
    </form>
    <!-- <?php if ($error): ?>
        <div class="error-message"><?php echo $error; ?></div>
    <?php endif; ?> -->
</body>
</html>
