<?php require 'layouts/session.php' ?>
<?php require 'layouts/header.php'; ?>
<?php require 'layouts/navbar.php'; ?>
<div style="background-color: #fff; width: 100%; height: max-content;">
    <div class="d-flex justify-content-center mt-5">
        <h5 class="display-5 fw-medium" style="font-size: 4vh;">Silahkan Pilih Salah Satu</h5>
    </div>
    <div class="container d-flex justify-content-center align-items-center flex-wrap gap-5 border-bottom">
        <div class="card border-2 overflow-hidden border-dark my-5 shadow-md" style="width: 500px; height: max-content;">
            <div class="border-bottom border-dark shadow-md">
                <img src="../assets/cards/learn.svg" alt="personal" width="450" class="img-fluid">
            </div>
            <div class="p-3">
                <h5>Tes Gaya Belajar</h5>
            </div>
            <div class="p-3">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo repellat nesciunt error, animi reiciendis qui sit, rerum iste labore dolorum optio quidem, dignissimos distinctio</p>
            </div>
            <div class="p-3">
            <a class="btn btn-primary" href="../pages/gayaBelajar.php">Tes Sekarang</a>
            </div>
        </div>
        <div class="card border-2 overflow-hidden border-dark my-5 shadow-md" style="width: 500px;">
            <div class="border-bottom border-dark shadow-md">
                <img src="../assets/cards/personal.svg" alt="personal" width="500" class="img-fluid">
            </div>
            <div class="p-3">
                <h5>Tes Kepribadian</h5>
            </div>
            <div class="p-3">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo repellat nesciunt error, animi reiciendis qui sit, rerum iste labore dolorum optio quidem, dignissimos distinctio</p>
            </div>
            <div class="p-3">
                <a class="btn btn-primary" href="../pages/kepribadian.php">Tes Sekarang</a>
            </div>
        </div>
    </div>
</div>
<script src="src/js/script.js"></script>
<?php require 'layouts/footer.php'; ?>
