<?php
session_start();
include 'database_connection.php'; 
// OTURUM KONTROLÜ
if(!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit;
}

// PARAMETRE KONTROLÜ
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    //Güvenli sorgu
    $stmt = $conn->prepare("DELETE FROM projects WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: ../admin_dashboard.php");
exit;
?>