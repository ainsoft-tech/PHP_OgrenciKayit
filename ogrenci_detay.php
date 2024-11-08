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
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Öğrenci Detayı - Öğrenci Kayıt Sistemi</title>
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
                        <h3>Öğrenci Detayı</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="adi" class="form-label">Ad:</label>
                            <input type="text" class="form-control" id="adi" value="<?php echo $ogrenci['adi']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="soyadi" class="form-label">Soyad:</label>
                            <input type="text" class="form-control" id="soyadi" value="<?php echo $ogrenci['soyadi']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="tckimlik" class="form-label">TC Kimlik:</label>
                            <input type="text" class="form-control" id="tckimlik" value="<?php echo $ogrenci['tckimlik']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="telefon" class="form-label">Telefon:</label>
                            <input type="text" class="form-control" id="telefon" value="<?php echo $ogrenci['telefon']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="sinif" class="form-label">Sınıf:</label>
                            <input type="text" class="form-control" id="sinif" value="<?php echo $ogrenci['sinif_adi']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="bolum" class="form-label">Bölüm:</label>
                            <input type="text" class="form-control" id="bolum" value="<?php echo $ogrenci['bolum_adi']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="okul" class="form-label">Okul:</label>
                            <input type="text" class="form-control" id="okul" value="<?php echo $ogrenci['okul_adi']; ?>" readonly>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="index.php" class="btn btn-secondary">Geri Dön</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>