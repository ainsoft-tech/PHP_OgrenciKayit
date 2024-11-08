<?php
include 'config/db.php';

// Sınıfları al
$sınıflar = $pdo->query("SELECT * FROM sinif")->fetchAll(PDO::FETCH_ASSOC);

// Okulları al
$okullar = $pdo->query("SELECT * FROM okul")->fetchAll(PDO::FETCH_ASSOC);

// Bölümleri al
$bolumler = $pdo->query("SELECT * FROM bolum")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adi = $_POST['adi'];
    $soyadi = $_POST['soyadi'];
    $tckimlik = $_POST['tckimlik'];
    $telefon = $_POST['telefon'];
    $cinsiyet = $_POST['cinsiyet'];
    $veli_adi = $_POST['veli_adi'];
    $veli_telefon = $_POST['veli_telefon'];
    $dogumyeri = $_POST['dogumyeri'];
    $dogumtarihi = $_POST['dogumtarihi'];
    $adres = $_POST['adres'];
    $sinif_id = $_POST['sinif_id'];
    $bolum_id = $_POST['bolum_id'];
    $okul_id = $_POST['okul_id'];

    if (strlen($tckimlik) != 11) {
        echo "TCKimlik numarası 11 karakter olmalıdır.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO ogrenci (adi, soyadi, tckimlik, telefon, cinsiyet, veli_adi, veli_telefon, dogumyeri, dogumtarihi, adres, sinif_id, bolum_id, okul_id) 
                               VALUES (:adi, :soyadi, :tckimlik, :telefon, :cinsiyet, :veli_adi, :veli_telefon, :dogumyeri, :dogumtarihi, :adres, :sinif_id, :bolum_id, :okul_id)");
        $stmt->execute([
            ':adi' => $adi,
            ':soyadi' => $soyadi,
            ':tckimlik' => $tckimlik,
            ':telefon' => $telefon,
            ':cinsiyet' => $cinsiyet,
            ':veli_adi' => $veli_adi,
            ':veli_telefon' => $veli_telefon,
            ':dogumyeri' => $dogumyeri,
            ':dogumtarihi' => $dogumtarihi,
            ':adres' => $adres,
            ':sinif_id' => $sinif_id,
            ':bolum_id' => $bolum_id,
            ':okul_id' => $okul_id
        ]);
        
        // Kayıt başarılıysa index.php'ye yönlendir
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
    <title>Yeni Kayıt Ekle</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5 d-flex justify-content-center">
    <div class="col-md-6">
        <h2 class="text-center text-primary mb-4">Yeni Öğrenci Kaydı</h2>
        <form method="post" action="kayit_ekle.php">
            <div class="mb-3">
                <label for="adi" class="form-label">Adı</label>
                <input type="text" class="form-control" name="adi" required>
            </div>
            <div class="mb-3">
                <label for="soyadi" class="form-label">Soyadı</label>
                <input type="text" class="form-control" name="soyadi" required>
            </div>
            <div class="mb-3">
                <label for="tckimlik" class="form-label">TCKimlik</label>
                <input type="text" class="form-control" name="tckimlik" required maxlength="11">
            </div>
            <div class="mb-3">
                <label for="telefon" class="form-label">Telefon</label>
                <input type="text" class="form-control" name="telefon" required>
            </div>
            <div class="mb-3">
                <label for="cinsiyet" class="form-label">Cinsiyet</label>
                <input type="text" class="form-control" name="cinsiyet" required>
            </div>
            <div class="mb-3">
                <label for="veli_adi" class="form-label">Veli Adı</label>
                <input type="text" class="form-control" name="veli_adi" required>
            </div>
            <div class="mb-3">
                <label for="veli_telefon" class="form-label">Veli Telefon</label>
                <input type="text" class="form-control" name="veli_telefon" required>
            </div>
            <div class="mb-3">
                <label for="dogumyeri" class="form-label">Doğum Yeri</label>
                <input type="text" class="form-control" name="dogumyeri" required>
            </div>
            <div class="mb-3">
                <label for="dogumtarihi" class="form-label">Doğum Tarihi</label>
                <input type="date" class="form-control" name="dogumtarihi" required>
            </div>
            <div class="mb-3">
                <label for="adres" class="form-label">Adres</label>
                <textarea class="form-control" name="adres" required></textarea>
            </div>
            <div class="mb-3">
                <label for="sinif_id" class="form-label">Sınıf</label>
                <select class="form-select" name="sinif_id" required>
                    <option value="">Seçiniz</option>
                    <?php foreach ($sınıflar as $sinif): ?>
                        <option value="<?= $sinif['id'] ?>"><?= $sinif['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="bolum_id" class="form-label">Bölüm</label>
                <select class="form-select" name="bolum_id" required>
                    <option value="">Seçiniz</option>
                    <?php foreach ($bolumler as $bolum): ?>
                        <option value="<?= $bolum['id'] ?>"><?= $bolum['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="okul_id" class="form-label">Okul</label>
                <select class="form-select" name="okul_id" required>
                    <option value="">Seçiniz</option>
                    <?php foreach ($okullar as $okul): ?>
                        <option value="<?= $okul['id'] ?>"><?= $okul['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Kaydet</button>
                <a href="index.php" class="btn btn-secondary">İptal</a>
            </div>
        </form>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
