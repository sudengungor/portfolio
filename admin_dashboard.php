<?php
session_start();
// Eğer giriş yapılmamışsa login sayfasına yönlendir (Session Kontrolü)
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}
// Veritabanı bağlantısı
include 'php/database_connection.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | Project Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="admin-body">
    <div class="admin-wrapper">
        <h1>Welcome, Sudenur!</h1>
        <p>Use this form to add new projects to your portfolio.</p>
        
        <div class="admin-form-card">
            <form action="php/add_project.php" method="POST">
                <input type="text" name="title" placeholder="Project Title" required>
                <textarea name="description" placeholder="Project Description" required></textarea>
                <input type="text" name="tech_stack" placeholder="Tech Stack (e.g. Flutter, Dart)">
                <input type="text" name="github_url" placeholder="GitHub URL">
                <input type="text" name="image_url" placeholder="Project Image URL (Link)">
                <button type="submit" class="btn primary">Add Project</button>
            </form>
        </div>

        <hr style="margin: 30px 0; border: 0; border-top: 1px solid var(--border-color);">

        <div class="manage-projects">
            <h3>Manage Existing Projects</h3>
            <div class="project-list">
                <?php
                $result = $conn->query("SELECT * FROM projects ORDER BY id DESC");
                
                while($row = $result->fetch_assoc()) {
                    // SATIR İÇİ STYLE'LARI SİLDİK, CLASS EKLEDİK
                    echo "<div class='manage-project-item'>";
                    echo "<div><strong>" . htmlspecialchars($row['title']) . "</strong></div>";
                    echo "<a href='php/delete_project.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>

        <br><br>
        <a href="php/logout.php" class="logout-link">Logout and Return</a>
    </div>
</body>
</html>