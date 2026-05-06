<?php
session_start();
include 'db.php';

// Güvenlik: Giriş yapmamış biri bu linke direkt tıklarsa engelleyelim
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $tech_stack = $_POST['tech_stack'];
    $github_link = $_POST['github_link'];

    try {
        $sql = "INSERT INTO projects (title, description, tech_stack, github_link) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$title, $description, $tech_stack, $github_link]);
        
        // Başarıyla eklendikten sonra admin paneline geri dönsün
        header("Location: ../admin_dashboard.php?status=success");
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>