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
    <title>User</title>
</head>

<body>
    <h2>Welcome</h2>
    <p>This is the user dashboard page.</p>

    <a href="../login/logout.php">
        <button>Logout</button>
    </a>
</body>

</html>
