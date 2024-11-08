<?php
// Veritabanı bağlantısı
include 'config/db.php';

// Öğrenci ID'sini al
$ogrenciId = $_GET['id'];

// Öğrenciyi sil
$stmt = $pdo->prepare("DELETE FROM ogrenci WHERE id = :id");
$stmt->bindParam(':id', $ogrenciId);

if ($stmt->execute()) {
    header('Location: index.php');
    exit;
} else {
    echo "Bir hata oluştu. Lütfen tekrar deneyin.";
}
?>