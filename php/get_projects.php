<?php
include 'database_connection.php'; // Veritabanı bağlantısını çağır

header('Content-Type: application/json'); // Çıktının JSON olduğunu belirt

try {
    $stmt = $conn->prepare("SELECT * FROM projects ORDER BY created_at DESC");
    $stmt->execute();
    
    $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Verileri JSON formatında döndür
    echo json_encode($projects);

} catch(PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>