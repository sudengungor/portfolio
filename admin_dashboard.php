<?php
session_start();
// Eğer giriş yapılmamışsa login sayfasına yönlendir (Session Kontrolü)
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}
include 'php/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | Project Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="admin-body">
    <div class="container">
        <h1>Welcome, Sudenur!</h1>
        <p>Use this form to add new projects to your portfolio.</p>
        
        <form action="php/add_project.php" method="POST" class="admin-form">
            <input type="text" name="title" placeholder="Project Title" required>
            <textarea name="description" placeholder="Project Description" required></textarea>
            <input type="text" name="tech_stack" placeholder="Tech Stack (e.g. Flutter, Dart)">
            <input type="text" name="github_link" placeholder="GitHub URL">
            <button type="submit" class="btn primary">Add Project</button>
        </form>

        <a href="php/logout.php" class="btn secondary">Logout</a>
    </div>
</body>
</html>