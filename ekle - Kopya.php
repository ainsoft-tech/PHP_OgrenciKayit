<?php
// ekle.php
include 'db.php';

// Kayıt ekleme işlemi
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $adi = $_POST['adi'];
    $soyadi = $_POST['soyadi'];
    $tcno = $_POST['tcno'];
    $telefon = $_POST['telefon'];
    $cinsiyet = isset($_POST['cinsiyet']) ? 1 : 0; // Checkbox kontrolü
    $dyeri = $_POST['dyeri'];
    $dtarihi = $_POST['dtarihi'];
    $adres = $_POST['adres'];

    $insertQuery = "INSERT INTO bilgi (adi, soyadi, tcno, telefon, cinsiyet, dyeri, dtarihi, adres) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($insertQuery);
    $stmt->execute([$adi, $soyadi, $tcno, $telefon, $cinsiyet, $dyeri, $dtarihi, $adres]);

    // Kullanıcıya devam etmek isteyip istemediğini sor
    if (isset($_POST['devam'])) {
        header("Location: ekle.php");
        exit;
    } else {
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ekle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Yeni Kayıt Ekle</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="adi" class="form-label">Adı</label>
            <input type="text" class="form-control" name="adi" required>
        </div>
        <div class="mb-3">
            <label for="soyadi" class="form-label">Soyadı</label>
            <input type="text" class="form-control" name="soyadi" required>
        </div>
        <div class="mb-3">
            <label for="tcno" class="form-label">TC No</label>
            <input type="number" class="form-control" name="tcno" required>
        </div>
        <div class="mb-3">
            <label for="telefon" class="form-label">Telefon</label>
            <input type="text" class="form-control" name="telefon" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Cinsiyet</label><br>
            <input type="radio" name="cinsiyet" value="1" id="erkek" required>
            <label for="erkek">Erkek</label>
            <input type="radio" name="cinsiyet" value="0" id="kadin" required>
            <label for="kadin">Kadın</label>
        </div>
        <div class="mb-3">
            <label for="dyeri" class="form-label">Doğum Yeri</label>
            <input type="text" class="form-control" name="dyeri" required>
        </div>
        <div class="mb-3">
            <label for="dtarihi" class="form-label">Doğum Tarihi</label>
            <input type="date" class="form-control" name="dtarihi" required>
        </div>
        <div class="mb-3">
            <label for="adres" class="form-label">Adres</label>
            <textarea class="form-control" name="adres" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success" name="devam" value="1">Kaydet</button>
        <a href="index.php" class="btn btn-secondary">İptal</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
