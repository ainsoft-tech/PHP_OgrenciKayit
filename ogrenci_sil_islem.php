<!-- ogrenci_sil_islem.php -->
<?php
include 'config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $stmt = $pdo->prepare("DELETE FROM ogrenci WHERE id = ?");
    $stmt->execute([$id]);
    
    header("Location: index.php");
    exit();
}
?>