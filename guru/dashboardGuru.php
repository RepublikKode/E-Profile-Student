<?php require '../views/layouts/session.php'; ?>
<?php
require '../functions/functions.php';

if (!isset($_SESSION["login"])) {
    header('Location: ../pages/login.php');
}

if ($_SESSION['level'] === 'siswa') {
    header('Location: ../views/');
}

$getCerdas = query("SELECT kecerdasan FROM users");

?>
<?php require '../views/layouts/header.php'; ?>
<?php require '../views/layouts/navbar.php'; ?>
<div class="container" style="height: max-content;">
    <div class="card shadow-md my-5 p-3">
        <div class="border-bottom">
            <h5>Hai, <?= $_SESSION['fullname']; ?></h5>
        </div>
        <div>
            <p class="text-muted">Ayo cek riwayat tes siswa mu</p>
        </div>
        <div class="d-flex justify-content-center">
            <div class="card p-3 d-flex flex-row flex-wrap gap-2 justify-content-center" style="width: max-content;">
                <a class="card bg-success text-white p-3 text-decoration-none" style="width: 400px;" href="dataSiswaBelajar.php">
                    <h5 class="border-bottom">Hasil Tes Gaya Belajar</h5>
                    <p>Siswa yang melakukan tes : <?= count($getHasil); ?></p>
                </a>
                <a class="card bg-primary text-white p-3 text-decoration-none" style="width: 400px;" href="dataSiswaKepribadian.php">
                    <h5 class="border-bottom">Hasil Tes Kepribadian</h5>
                    <p>Siswa yang melakukan tes : <?= count($getKepribadian); ?></p>
                </a>
                <a class="card bg-secondary text-white p-3 text-decoration-none" style="width: 400px;" href="dataSiswaKecerdasan.php">
                    <h5 class="border-bottom">Hasil Tes Kecerdasan</h5>
                    <p>Siswa yang melakukan tes : <?= count($getCerdas); ?></p>
                </a>
                <a class="card bg-danger text-white p-3 text-decoration-none" style="width: 400px;" href="users.php">
                    <h5 class="border-bottom">Daftar User(siswa)</h5>
                    <p>Daftar Siswa : <?= count($getSiswa); ?></p>
                </a>
                <a class="card bg-warning text-dark p-3 text-decoration-none" style="width: 400px;" href="dataGuru.php">
                    <h5 class="border-bottom">Daftar User(guru)</h5>
                    <p>Daftar Guru : <?= count($getGuru); ?></p>
                </a>
                <a class="card bg-primary text-white p-3 text-decoration-none" style="width: 400px;" href="signup.php">
                    <h5 class="border-bottom">Tambahkan User Siswa</h5>
                </a>
            </div>
        </div>
    </div>
</div>
<?php require '../views/layouts/footer.php'; ?>