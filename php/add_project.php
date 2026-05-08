<?php
session_start();
// Senin güncel bağlantı dosyanın ismi
include 'database_connection.php'; 

// GÜVENLİK: Admin girişi yapılmamışsa bu işlemi yapma, login'e at
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit;
}

// Formdan "Gönder" butonuna basılıp basılmadığını kontrol et
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Formdaki kutucuklara yazılanları değişkenlere alalım
    $title = $_POST['title'];
    $description = $_POST['description'];
    $tech_stack = $_POST['tech_stack'];
    $github_url = $_POST['github_url'];
    
    // Resim linki boşsa varsayılan bir "Görsel Yok" resmi koyalım
    $image_url = !empty($_POST['image_url']) ? $_POST['image_url'] : 'https://via.placeholder.com/300x200';

    // 2. SQL Sorgusunu hazırla (Veritabanına "Ekle" komutu veriyoruz)
    // Soru işaretleri (?) güvenlik içindir, veriyi oraya biz yerleştireceğiz
    $sql = "INSERT INTO projects (title, description, tech_stack, github_url, image_url) VALUES (?, ?, ?, ?, ?)";
    
    // 3. Bağlantıyı kullanarak sorguyu "hazırla" (Prepare)
    $stmt = $conn->prepare($sql);
    
    // 4. Bilgileri soru işaretlerinin olduğu yerlere güvenle yerleştir (Bind)
    // "sssss" demek, 5 tane yazının (string) geleceği demektir
    $stmt->bind_param("sssss", $title, $description, $tech_stack, $github_url, $image_url);

    // 5. İşlemi çalıştır ve bitir
    if($stmt->execute()) {
        // Başarılıysa admin paneline geri gönder
        header("Location: ../admin_dashboard.php?status=success");
        exit;
    } else {
        // Hata varsa ekrana yazdır
        echo "Error: " . $conn->error;
    }
}
?>