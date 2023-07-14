<?php require '../views/layouts/session.php'; ?>
<?php
require '../functions/functions.php';
if (!isset($_SESSION["login"])) {
    header('Location: login.php');
    exit();
}

$gayaBelajar = isset($_GET['gaya_belajar']) ? $_GET['gaya_belajar'] : '';

// Daftar gaya belajar yang valid
$validGayaBelajar = ['visual', 'auditori', 'kinestetik', 'visual auditori', 'visual kinestetik', 'auditori visual', 'auditori kinestetik', 'kinestetik visual', 'kinestetik auditori', 'visual auditori kinestetik'];

// Periksa apakah gaya belajar yang diterima valid
if (!in_array($gayaBelajar, $validGayaBelajar)) {
    header('Location: ../views/');
    exit();
}

$gayaBelajar = isset($_GET['gaya_belajar']) ? $_GET['gaya_belajar'] : '';
?>
<?php require '../views/layouts/header.php'; ?>
<?php require '../views/layouts/navbar.php'; ?>
<div class="bg-gradient" style="background-color: #F2F6F8; width: 100%; height: 100vh; display: flex; justify-content: center; align-items: center;">
    <div class="container">
        <div class="card shadow p-4 my-3" style="background-color: #FFFFFF; width: 100%; max-width: 600px; border-radius: 10px;">
            <h2 class="fw-bold border-bottom pb-3 mb-4" style="color: #333333;">Hasil Tes Gaya Belajar</h2>
            <div class="mb-4">
                <?php if ($gayaBelajar !== '') : ?>
                    <h4 class="text-warning"><?= $gayaBelajar; ?></h4>
                <?php else : ?>
                    <h4 class="text-warning">Tidak ada data yang ditemukan</h4>
                <?php endif; ?>
            </div>
            <?php if ($gayaBelajar === 'visual') : ?>
                <div>
                    <p style="color: #555555; font-size: 16px; line-height: 1.6"><?= $getDesc['visual'] ?></p>
                </div>
            <?php elseif ($gayaBelajar === 'auditori') : ?>
                <div>
                    <p style="color: #555555; font-size: 16px; line-height: 1.6"><?= $getDesc['auditori'] ?></p>
                </div>
            <?php elseif ($gayaBelajar === 'kinestetik') : ?>
                <div>
                    <p style="color: #555555; font-size: 16px; line-height: 1.6"><?= $getDesc['kinestetik'] ?></p>
                </div>
            <?php elseif ($gayaBelajar === 'visual auditori') : ?>
                <div>
                    <p style="color: #555555; font-size: 16px; line-height: 1.6"><?= $getDesc['visual_auditori'] ?></p>
                </div>
            <?php elseif ($gayaBelajar === 'visual kinestetik') : ?>
                <div>
                    <p style="color: #555555; font-size: 16px; line-height: 1.6"><?= $getDesc['visual_kinestetik']; ?></p>
                </div>
            <?php elseif ($gayaBelajar === 'auditori visual') : ?>
                <div>
                    <p style="color: #555555; font-size: 16px; line-height: 1.6"><?= $getDesc['auditori_visual']; ?></p>
                </div>
            <?php elseif ($gayaBelajar === 'auditori kinestetik') : ?>
                <div>
                    <p style="color: #555555; font-size: 16px; line-height: 1.6"><?= $getDesc['auditori_kinestetik']; ?></p>
                </div>
            <?php elseif ($gayaBelajar === 'kinestetik visual') : ?>
                <div>
                    <p style="color: #555555; font-size: 16px; line-height: 1.6"><?= $getDesc['kinestetik_visual']; ?></p>
                </div>
            <?php elseif ($gayaBelajar === 'kinestetik auditori') : ?>
                <div>
                    <p style="color: #555555; font-size: 16px; line-height: 1.6"><?= $getDesc['kinestetik_auditori']; ?></p>
                </div>
            <?php elseif ($gayaBelajar === 'visual auditori kinestetik') : ?>
                <div>
                    <p style="color: #555555; font-size: 16px; line-height: 1.6"><?= $getDesc['visual_auditori_kinestetik']; ?></p>
                </div>
            <?php endif; ?>
            <div class="d-flex justify-content-center mt-4">
                <a href="../" class="btn btn-success me-3" style="background-color: #28A745; color: #FFFFFF;">Kembali ke Beranda</a>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <img src="../assets/cards/learn2.svg" alt="Learn" style="width: 100%; max-width: 200px; margin-top: 20px;">
            </div>
        </div>
    </div>
</div>
<?php require '../views/layouts/footer.php'; ?>
