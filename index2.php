<?php
// Veritabanı bağlantısı
    include 'config/db.php';
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Öğrenci Kayıt Sistemi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Optional: Bootstrap Icons for modern icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body>


<!-- Sınıf Ekle Modal -->
<div class="modal fade" id="sinifEkleModal" tabindex="-1" aria-labelledby="sinifEkleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sinifEkleModalLabel">Yeni Sınıf Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="sinif_ekle.php">
                    <div class="mb-3">
                        <label for="sinifName" class="form-label">Sınıf Adı</label>
                        <input type="text" class="form-control" name="sinifName" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Okul Ekle Modal -->
<div class="modal fade" id="okulEkleModal" tabindex="-1" aria-labelledby="okulEkleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="okulEkleModalLabel">Yeni Okul Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="okul_ekle.php">
                    <div class="mb-3">
                        <label for="okulName" class="form-label">Okul Adı</label>
                        <input type="text" class="form-control" name="okulName" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Bölüm Ekle Modal -->
<div class="modal fade" id="bolumEkleModal" tabindex="-1" aria-labelledby="bolumEkleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bolumEkleModalLabel">Yeni Bölüm Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="bolum_ekle.php">
                    <div class="mb-3">
                        <label for="bolumName" class="form-label">Bölüm Adı</label>
                        <input type="text" class="form-control" name="bolumName" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Header -->
<header class="bg-dark text-white py-1 nav-link">
    <div class="container d-flex justify-content-between align-items-center">
        <p class="nav-link mb-0"><span><a href="http://aliihsannaslı.com.tr" class="nav-link text-white"><i class="bi bi-globe2"></i> aliihsannaslı.com.tr</a></span></p>
        <p class="nav-link mb-0"><span><a href="https://wa.me/05517451968" class="nav-link text-white"><i class="bi bi-telephone"></i> +90 551 745 1968</span></a></p>
    </div>
</header>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Öğrenci Kayıt Sistemi</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Ana Sayfa</a></li>
                
                <li>
			<a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#sinifEkleModal">Sınıf</a>
		</li>
                <li class="nav-item">
    			<a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#okulEkleModal">Okul</a>
		</li>

                <li class="nav-item">
    			<a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#bolumEkleModal">Bölüm</a>
		</li>

                <li class="nav-item"><a class="nav-link" href="#">Hakkımızda</a></li>
                <li class="nav-item"><a class="nav-link" href="#">İletişim</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Öğrenci Tablosu -->
<main class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="text-primary">Öğrenci Listesi</h3>
        <a href="kayit_ekle.php" class="btn btn-success"><i class="bi bi-plus-circle"></i> Yeni Kayıt</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th scope="col">Ad</th>
                    <th scope="col">Soyad</th>
                    <th scope="col">TCKimlik</th>
                    <th scope="col">Telefon</th>
                    <th scope="col">Sınıf</th>
                    <th scope="col">Bölüm</th>
                    <th scope="col">Okul</th>
                    <th scope="col">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php
                

                // Öğrenci verilerini, sınıf, bölüm, okul isimleriyle beraber çekme sorgusu
                $stmt = $pdo->prepare("
                    SELECT ogrenci.*, sinif.name AS sinif_adi, bolum.name AS bolum_adi, okul.name AS okul_adi
                    FROM ogrenci
                    LEFT JOIN sinif ON ogrenci.sinif_id = sinif.id
                    LEFT JOIN bolum ON ogrenci.bolum_id = bolum.id
                    LEFT JOIN okul ON ogrenci.okul_id = okul.id
                ");
                $stmt->execute();
                $ogrenciler = $stmt->fetchAll();

                // Öğrenci verilerini tabloya ekleyin
                foreach ($ogrenciler as $ogrenci) {
                    echo "<tr>
                            <td>{$ogrenci['adi']}</td>
                            <td>{$ogrenci['soyadi']}</td>
                            <td>{$ogrenci['tckimlik']}</td>
                            <td>{$ogrenci['telefon']}</td>
                            <td>{$ogrenci['sinif_adi']}</td>
                            <td>{$ogrenci['bolum_adi']}</td>
                            <td>{$ogrenci['okul_adi']}</td>
                            <td>
                                <a href='#' class='btn btn-info btn-sm'><i class='bi bi-info-circle'></i> Detay</a>
                                <a href='#' class='btn btn-warning btn-sm'><i class='bi bi-pencil-square'></i> Edit</a>
                                <a href='#' class='btn btn-danger btn-sm'><i class='bi bi-trash'></i> Sil</a>
                            </td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="text-end mt-2 text-secondary">Kayıt Sayısı: <span class="badge bg-primary"><?php echo count($ogrenciler); ?></span></div>
</main>



<!-- Footer -->
<footer class="bg-bright text-white py-4">

<div class="container-fluid mt-3">
    
    <div class="row">
        <div class="col-sm-4 p-3 bg-secondary text-white">.col</div>
        <div class="col-sm-4 p-3 bg-secondary text-white">.col</div>
        <div class="col-sm-4 p-3 bg-secondary text-white">.col</div>
    
    </div>
    
</div>

</footer>

<!-- Sayfanın başına dön butonu -->
<a href="#" class="position-fixed bottom-0 end-0 p-3" style="z-index: 100;">
    <i class="bi bi-arrow-up-circle-fill text-primary" style="font-size: 2.5rem;"></i>
</a>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
