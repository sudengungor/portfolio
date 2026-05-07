<?php
session_start();
if(isset($_SESSION['admin_logged_in'])) { header('Location: admin_dashboard.php'); exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="display:flex; justify-content:center; align-items:center; height:100vh; background:#f4f4f4;">
    <form action="php/auth.php" method="POST" style="background:white; padding:2rem; border-radius:8px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">
        <h2>Admin Login</h2>
        <input type="text" name="username" placeholder="Username" required style="display:block; margin-bottom:10px; width:100%; padding:8px;">
        <input type="password" name="password" placeholder="Password" required style="display:block; margin-bottom:10px; width:100%; padding:8px;">
        <button type="submit" style="width:100%; padding:10px; background:#ff4081; color:white; border:none; cursor:pointer;">Login</button>
    </form>
</body>
</html>