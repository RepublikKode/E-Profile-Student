<?php require '../views/layouts/session.php'; ?>
<?php

if (!isset($_SESSION["login"])) {
    header('Location: ../pages/login.php');
}

require '../functions/functions.php';

?>
<?php require '../views/layouts/header.php'; ?>
<?php require '../views/layouts/navbar.php'; ?>
<div class="container" style="width: 100%; height: max-content;">
    <div class="card my-5 shadow-sm border-3 border border-success" style="width: 100%; height: max-content;">
        <div class="d-flex justify-content-center flex-column gap-3">
            <h5 class="text-center my-3 fw-bold h3">Profile</h5>
            <div class="d-flex justify-content-center mb-5">
                <form action="" method="post" class="d-flex flex-column gap-3" enctype="multipart/form-data">
                    <div class="d-flex justify-content-center align-items-center">
                        <?php if (isset($_SESSION['login'])) : ?>
                            <img src="../assets/profile/<?= $_SESSION['gambarLogin']; ?>" alt="profile" width="250" height="250" class="img-fluid bg-white rounded-circle border border-2 border-success" style="height: 150px; width: 150px;">
                        <?php endif; ?>
                    </div>
                    <input type="hidden" name="id" id="id" value="<?= $_SESSION['loginId']; ?>">
                    <input type="hidden" name="gambarLama" id="GambarLama" value="<?= $_SESSION['gambarLogin'] ?>">
                    <input class="form-control form-control-md" id="gambarInput" name="gambarInput" type="file">
                    <input class="p-2 shadow-sm rounded border-2 border" type="text" name="fullnameInput" id="fullnameInput" value="<?= $_SESSION['fullname']; ?>">
                    <input class="p-2 shadow-sm rounded border-2 border" type="text" name="usernameInput" id="usernameInput" value="<?= $_SESSION['username']; ?>">
                    <button class="btn btn-primary" id="editProfile" name="editProfile">Edit Profile</button>
                    <table class="table border-1 text-center">
                        <thead>
                            <th>Jenis Kecerdasan</th>
                        </thead>
                        <tbody>
                            <td><a href="hasilAngketSiswa.php?id=<?= $_SESSION['loginId']; ?>" class="btn btn-primary">Lihat Angket</a></td>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../views/src/js/script.js"></script>
<?php require '../views/layouts/footer.php'; ?>