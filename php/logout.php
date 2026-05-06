<?php
session_start();
session_unset(); // Tüm session değişkenlerini temizler
session_destroy(); // Oturumu tamamen yok eder

// Ana sayfaya veya login sayfasına geri gönderelim
header("Location: ../login.php");
exit;
?>