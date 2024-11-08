<?php
include 'config/db.php'; // Veritabanı bağlantısı için gerekli dosyayı dahil edin

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $okulName = $_POST['okulName'];

    // Okul adı boş değilse ekleme işlemi yap
    if (!empty($okulName)) {
        $stmt = $pdo->prepare("INSERT INTO okul (name) VALUES (:name)");
        $stmt->execute([':name' => $okulName]);

        // Başarılı ekleme sonrası index.php'ye yönlendirme
        header("Location: index.php");
        exit;
    } else {
        echo "Okul adı boş olamaz.";
    }
}
?>
