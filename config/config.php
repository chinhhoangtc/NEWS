<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  // Tạo kết nối PDO
  $conn = new PDO("mysql:host=$servername;dbname=news_db", $username, $password);
  
  // Thiết lập chế độ lỗi PDO thành ngoại lệ
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  // Nếu kết nối thành công
  // echo "Connected successfully";
} catch(PDOException $e) {
  // Nếu kết nối thất bại, hiển thị thông báo lỗi
  echo "Connection failed: " . $e->getMessage();
}
?>
