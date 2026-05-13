<?php
include 'database_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // MySQLi kullanarak güvenli kayıt 
    $sql = "INSERT INTO messages (full_name, email, subject, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if ($stmt->execute()) {
        echo "Success: Your message has been saved!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>