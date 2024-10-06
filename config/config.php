<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=news_db', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Kết nối thất bại: ' . $e->getMessage();
}

// Nếu bạn cần thực hiện truy vấn nào đó, hãy khởi tạo $stm ở đây
// Ví dụ: $stm = $pdo->prepare('SELECT * FROM some_table');
// $stm->execute();
// $data = $stm->fetchAll(PDO::FETCH_ASSOC);
?>