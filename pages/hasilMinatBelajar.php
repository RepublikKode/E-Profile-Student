<?php
require '../views/layouts/session.php';
?>
<?php
require '../functions/functions.php';
if (!isset($_SESSION["login"])) {
    header('Location: login.php');
    exit();
}

if (!isset($_SESSION["submitMinat"])) {
    header('Location: ../views/');
    exit();
}
?>
<?php require '../views/layouts/header.php' ?>
<?php require '../views/layouts/navbar.php' ?>
<div class="bg-gradient" style="
    background-color: #f2f6f8;
    width: 100%;
    height: max-content;
    display: flex;
    flex-direction: column;
  ">
    <div class="container">
        <div class="card shadow p-4 my-3" style="
        background-color: #ffffff;
        width: 100%;
        max-width: 600px;
        border-radius: 10px;
      ">
            <h2 class="fw-bold border-bottom mb-4" style="color: #333333;">
                Hasil Tes Kecerdasan
            </h2>
            <div class="mb-4">
                <h4 class="text-warning"><?= $_SESSION['kecerdasan']; ?></h4>
            </div>
            <?php if ($_SESSION['kecerdasan'] == 'Kecerdasan Linguistik') : ?>
                <div>
                    <p><?= $getDescM['kecerdasan_linguistik']; ?></p>
                </div>
            <?php elseif ($_SESSION['kecerdasan'] == 'Kecerdasan Matematis') : ?>
                <div>
                    <p><?= $getDescM['kecerdasan_matematis']; ?></p>
                </div>
            <?php elseif ($_SESSION['kecerdasan'] == 'Kecerdasan Spasial') : ?>
                <div>
                    <p><?= $getDescM['kecerdasan_spasial']; ?></p>
                </div>
            <?php elseif ($_SESSION['kecerdasan'] == 'Kecerdasan Kinestetik') : ?>
                <div>
                    <p><?= $getDescM['kecerdasan_kinestik']; ?></p>
                </div>
            <?php elseif ($_SESSION['kecerdasan'] == 'Kecerdasan Musikal') : ?>
                <div>
                    <p><?= $getDescM['kecerdasan_musikal']; ?></p>
                </div>
            <?php elseif ($_SESSION['kecerdasan'] == 'Kecerdasan Interpersonal') : ?>
                <div>
                    <p><?= $getDescM['kecerdasan_interpersonal']; ?></p>
                </div>
            <?php elseif ($_SESSION['kecerdasan'] == 'Kecerdasan Intrapersonal') : ?>
                <div>
                    <p><?= $getDescM['kecerdasan_intrapersonal']; ?></p>
                </div>
            <?php elseif ($_SESSION['kecerdasan'] == 'Kecerdasan Naturalis') : ?>
                <div>
                    <p><?= $getDescM['kecerdasan_naturalis']; ?></p>
                </div>
            <?php endif; ?>
            <div class="d-flex justify-content-center mt-4">
                <a href="../" class="btn btn-success me-3" style="background-color: #28a745; color: #ffffff">Kembali ke Beranda</a>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <img src="../assets/cards/smart.svg" alt="smart" style="width: 100%; max-width: 200px; margin-top: 20px" />
            </div>
        </div>
    </div>
    <?php require '../views/layouts/footer.php'; ?>
</div>