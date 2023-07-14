<?php require 'layouts/session.php'; ?>
<?php require '../functions/functions.php'; ?>
<?php require 'layouts/header.php'; ?>
<?php require 'layouts/navbar.php'; ?>
<title>Minat Bakat</title>
<div style="background-color: #fff; width: 100%; height: max-content; ">
    <div class="d-flex justify-content-center mt-5">
        <h5 class="display-5 fw-medium" style="font-size: 4vh;">Silahkan Pilih Salah Satu</h5>
    </div>
    <div class="container-fluid d-flex justify-content-center align-items-center flex-wrap gap-5">
        <?php foreach( $getMenu as $gm ) : ?>
        <div class="card border-2 overflow-hidden border-dark shadow-md" style="width: 500px; min-height: max-content; height: 500px;">
            <div class="border-bottom border-dark shadow-md">
                <img src="../assets/cards/<?= $gm['gambar']; ?>" alt="personal" class="img-fluid bg-primary w-100" style="height: 200px;">
            </div>
            <div class="p-3">
                <h5><?= $gm['menu']; ?></h5>
            </div>
            <div class="p-3">
                <p><?= $gm['desc']; ?></p>
            </div>
            <div class="p-3 mb-3">
            <a class="btn btn-primary" href="../pages/<?= $gm['link']; ?>">Tes Sekarang</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<script src="src/js/script.js"></script>
<?php require 'layouts/footer.php'; ?>