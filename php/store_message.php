<?php
include 'database_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    try {
        $sql = "INSERT INTO messages (full_name, email, subject, message) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $email, $subject, $message]);
        
        echo "Success: Your message has been saved!";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>