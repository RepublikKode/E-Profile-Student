<?php require '../views/layouts/session.php'; ?>
<?php

if (!isset($_SESSION["login"])) {
    header('Location: ../pages/login.php');
}

require '../functions/functions.php';
$id = $_GET['id'];

$getUser = query("SELECT * FROM users WHERE id = '$id'")[0];

// var_dump($getUser);

?>
<?php require '../views/layouts/header.php'; ?>
<?php require '../views/layouts/navbar.php'; ?>
<div class="container" style="width: 100%; height: max-content;">
    <div class="card my-5 shadow-sm border-3 border border-success" style="width: 100%; height: max-content;">
        <div class="d-flex justify-content-center flex-column gap-3">
            <h5 class="text-center my-3 fw-bold h3">Profile</h5>
            <div class="d-flex justify-content-center">
                <img src="../assets/cards/profile.svg" alt="profile" width="200" class="img-fluid bg-white">
            </div>
            <div class="d-flex justify-content-center mb-5">
                <form action="" method="post" class="d-flex flex-column gap-3">
                    <input type="hidden" name="id" id="id" value="<?= $getUser['id']; ?>">
                    <input class="p-2 shadow-sm rounded border-2 border" type="text" name="fullnameInput" id="fullnameInput" value="<?= $getUser['fullname']; ?>">
                    <input class="p-2 shadow-sm rounded border-2 border" type="text" name="usernameInput" id="usernameInput" value="<?= $getUser['username']; ?>">
                    <button class="btn btn-primary" id="editProfile" name="editProfile">Edit Profile</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../views/src/js/script.js"></script>
<?php require '../views/layouts/footer.php'; ?>