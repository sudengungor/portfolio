<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio_db";

// MySQLi ile bağlantı kuruyoruz 
$conn = new mysqli($host, $username, $password, $dbname);

// Bağlantı hatası var mı kontrol edelim
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Türkçe karakter desteği
$conn->set_charset("utf8");
?>