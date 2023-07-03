<?php require '../views/layouts/session.php' ?>
<?php
require '../functions/functions.php';
$id = $_GET['id'];
$getDetailSiswa = query("SELECT * FROM hasil_kepribadian WHERE id = '$id'")[0];

if (!isset($_SESSION["login"])) {
    header('Location: ../pages/login.php');
  }

if($_SESSION['level'] === 'siswa') {
    header('Location: ../views/error.php');
  }

?>
<?php require '../views/layouts/header.php'; ?>
<?php require '../views/layouts/navbar.php'; ?>

<div class="container" id="top">
    <div class="card my-5 shadow-md border-success container d-flex flex-column" style="width: 100%; height: max-content;">
        <div class="card my-3 overflow-hidden d-flex flex-row align-items-center shadow-md">
            <div class="p-3">
                <img src="../assets/cards/profile.svg" alt="profile-card" width="80" class="img-fluid bg-white">
            </div>
            <div class="border p-1 flex-fill" style="width: 100%;">
                <p class="h5 d-flex mt-3"><?= $getDetailSiswa['user']; ?> - <?= $getDetailSiswa['kepribadian']; ?></p>
                <hr>
                <p class="text-muted"><?= $getDetailSiswa['level']; ?></p>
            </div>
        </div>
        <div class="d-flex flex-row flex-wrap">
            <div class="card p-3 mb-3" style="width: 100%;">
                <h6>Hasil Tes Gaya Belajar</h6>
                <div class="d-flex flex-column gap-3">
                    <?php foreach ($getPribadi as $index => $gp) : ?>
                        <div class="bg-warning text-dark p-2 rounded">
                            <?= $gp['id']; ?> . <?= $gp['soal']; ?>
                        </div>
                        <ul class="d-flex flex-column gap-3">
                            <li class="bg-primary text-white p-2 rounded"><?= $gp['opsi_satu']; ?></li>
                            <li class="bg-primary text-white p-2 rounded"><?= $gp['opsi_dua']; ?></li>
                            <li class="bg-primary text-white p-2 rounded"><?= $gp['opsi_tiga']; ?></li>
                            <li class="bg-primary text-white p-2 rounded"><?= $gp['opsi_empat']; ?></li>
                        </ul>
                        <div class="bg-success text-white p-2 rounded">
                            <?= $getDetailSiswa['soal_' . ($index + 1)]; ?>
                        </div>
                        <hr>
                    <?php endforeach; ?>
                    <a href="#top" class="btn btn-secondary">Back to Top</a>
                </div>
            </div>
        </div>
    </div>
</div>