<?php
session_start();
// Kullanıcı adı: admin | Şifre: 12345
if ($_POST['username'] === 'admin' && $_POST['password'] === '12345') {
    $_SESSION['admin_logged_in'] = true;
    header("Location: ../admin_dashboard.php");
} else {
    echo "Wrong username or password! <a href='../login.php'>Go back</a>";
}
?>