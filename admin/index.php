<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location:../login/login.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
   View Admin
</body>
</html>