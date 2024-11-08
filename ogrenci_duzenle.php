<?php
// Veritabanı bağlantısı
include 'config/db.php';

// Öğrenci ID'sini al
$ogrenciId = $_GET['id'];

// Öğrenci verilerini çek
$stmt = $pdo->prepare("
    SELECT ogrenci.*, sinif.name AS sinif_adi, bolum.name AS bolum_adi, okul.name AS okul_adi
    FROM ogrenci
    LEFT JOIN sinif ON ogrenci.sinif_id = sinif.id
    LEFT JOIN bolum ON ogrenci.bolum_id = bolum.id
    LEFT JOIN okul ON ogrenci.okul_id = okul.id
    WHERE ogrenci.id = :id
");
$stmt->bindParam(':id', $ogrenciId);
$stmt->execute();
$ogrenci = $stmt->fetch(PDO::FETCH_ASSOC);

// Formu işleme
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adi = $_POST['adi'];
    $soyadi = $_POST['soyadi'];
    $tckimlik = $_POST['tckimlik'];
    $telefon = $_POST['telefon'];
    $sinifId = $_POST['sinif_id'];
    $bolumId = $_POST['bolum_id'];
    $okulId = $_POST['okul_id'];

    $stmt = $pdo->prepare("
        UPDATE ogrenci
        SET adi = :adi, soyadi = :soyadi, tckimlik = :tckimlik, telefon = :telefon, sinif_id = :sinif_id, bolum_id = :bolum_id, okul_id = :okul_id
        WHERE id = :id
    ");
    $stmt->bindParam(':adi', $adi);
    $stmt->bindParam(':soyadi', $soyadi);
    $stmt->bindParam(':tckimlik', $tckimlik);
    $stmt->bindParam(':telefon', $telefon);
    $stmt->bindParam(':sinif_id', $sinifId);
    $stmt->bindParam(':bolum_id', $bolumId);
    $stmt->bindParam(':okul_id', $okulId);
    $stmt->bindParam(':id', $ogrenciId);

    if ($stmt->execute()) {
        header('Location: index.php');
        exit;
    } else {
        echo "Bir hata oluştu. Lütfen tekrar deneyin.";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Öğrenci Düzenle - Öğrenci Kayıt Sistemi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional: Bootstrap Icons for modern icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3>Öğrenci Düzenle</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="ogrenci_duzenle.php?id=<?php echo $ogrenciId; ?>">
                            <div class="mb-3">
                                <label for="adi" class="form-label">Ad:</label>
                                <input type="text" class="form-control" id="adi" name="adi" value="<?php echo $ogrenci['adi']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="soyadi" class="form-label">Soyad:</label>
                                <input type="text" class="form-control" id="soyadi" name="soyadi" value="<?php echo $ogrenci['soyadi']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="tckimlik" class="form-label">TC Kimlik:</label>
                                <input type="text" class="form-control" id="tckimlik" name="tckimlik" value="<?php echo $ogrenci['tckimlik']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="telefon" class="form-label">Telefon:</label>
                                <input type="text" class="form-control" id="telefon" name="telefon" value="<?php echo $ogrenci['telefon']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="sinif_id" class="form-label">Sınıf:</label>
                                <select class="form-select" id="sinif_id" name="sinif_id" required>
                                    <option value="<?php echo $ogrenci['sinif_id']; ?>"><?php echo $ogrenci['sinif_adi']; ?></option>
                                    <!-- Sınıf seçeneklerini buraya ekleyin -->
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="bolum_id" class="form-label">Bölüm:</label>
                                <select class="form-select" id="bolum_id" name="bolum_id" required>
                                    <option value="<?php echo $ogrenci['bolum_id']; ?>"><?php echo $ogrenci['bolum_adi']; ?></option>
                                    <!-- Bölüm seçeneklerini buraya ekleyin -->
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="okul_id" class="form-label">Okul:</label>
                                <select class="form-select" id="okul_id" name="okul_id" required>
                                    <option value="<?php echo $ogrenci['okul_id']; ?>"><?php echo $ogrenci['okul_adi']; ?></option>
                                    <!-- Okul seçeneklerini buraya ekleyin -->
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Kaydet</button>
                            <a href="index.php" class="btn btn-secondary">Vazgeç</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>