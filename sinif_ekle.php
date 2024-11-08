<?php
include 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sinifName = $_POST['sinifName'];

    // Sınıf adı boş değilse ekleme işlemi yap
    if (!empty($sinifName)) {
        $stmt = $pdo->prepare("INSERT INTO sinif (name) VALUES (:name)");
        $stmt->execute([':name' => $sinifName]);

        // Başarılı ekleme sonrası index.php'ye yönlendirme
        header("Location: index.php");
        exit;
    } else {
        echo "Sınıf adı boş olamaz.";
    }
}
?>
