<?php
include 'config/db.php'; // Veritabanı bağlantısı için gerekli dosyayı dahil edin

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bolumName = $_POST['bolumName'];

    // bolum adı boş değilse ekleme işlemi yap
    if (!empty($bolumName)) {
        $stmt = $pdo->prepare("INSERT INTO bolum (name) VALUES (:name)");
        $stmt->execute([':name' => $bolumName]);

        // Başarılı ekleme sonrası index.php'ye yönlendirme
        header("Location: index.php");
        exit;
    } else {
        echo "bolum adı boş olamaz.";
    }
}
?>
