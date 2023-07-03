<?php
session_start();
require '../functions/functions.php';
if (!isset($_SESSION["login"])) {
  header('Location: login.php');
}
?>
<?php require '../views/layouts/header.php'; ?>
<?php require '../views/layouts/navbar.php'; ?>
<style>
  body {
    line-height: 1.6;
    background-image: linear-gradient(120deg, #e0c3fc 0%, #8ec5fc 100%);
  }

  /* Style the question container */
  .bg-white {
    padding: 20px;
  }

  .form-check-input[type="radio"] {
    cursor: pointer;
  }

  .btn-success {
    background-image: linear-gradient(to right, #434343 0%, black 100%);
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  .btn-success:hover {
    background-image: linear-gradient(to top, #09203f 0%, #537895 100%);
  }
</style>
<div style="width: 100%; height: max-content; background-image: linear-gradient(120deg, #e0c3fc 0%, #8ec5fc 100%); ">
  <div class="container d-flex justify-content-center my-5 flex-column gap-3" style="max-width: 625px;">
    <div class="banner d-flex justify-content-center">
      <img src="../assets/banner/banner-soal.png" class="rounded-4 shadow-sm" width="100%">
    </div>
    <form action="" method="post" class="d-flex flex-column my-3 gap-3">
      <?php foreach ($getSoal as $index => $gs) : ?>
        <div class="d-flex flex-column shadow-md rounded p-3 bg-white shadow-lg" style="width: 100%;">
          <div class="mb-3">
            <p class="mb-0 flex-fill border-0" id="soal" name="soal" style="width: 100%; height: max-content; resize: none;" readonly><?= $gs['soal']; ?></p>
          </div>
          <div>
            <div class="form-check">
              <input type="radio" required class="form-check-input checkbox-group" name="checkboxGroup[<?= $index; ?>]" data-question="<?= $index; ?>" id="checkboxA<?= $index; ?>" value="opsi_satu">
              <label class="form-check-label" for="checkboxA<?= $index; ?>">A. <?= $gs['opsi_satu']; ?></label>
            </div>
            <div class="form-check">
              <input type="radio" required class="form-check-input checkbox-group" name="checkboxGroup[<?= $index; ?>]" data-question="<?= $index; ?>" id="checkboxB<?= $index; ?>" value="opsi_dua">
              <label class="form-check-label" for="checkboxB<?= $index; ?>">B. <?= $gs['opsi_dua']; ?></label>
            </div>
            <div class="form-check">
              <input type="radio" required class="form-check-input checkbox-group" name="checkboxGroup[<?= $index; ?>]" data-question="<?= $index; ?>" id="checkboxC<?= $index; ?>" value="opsi_tiga">
              <label class="form-check-label" for="checkboxC<?= $index; ?>">C. <?= $gs['opsi_tiga']; ?></label>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <button id="submitBelajar" name="submitBelajar" class="btn btn-success my-5">Submit</button>
    </form>
  </div>
</div>
</div>
<div class="mt-3"></div>
<div class="d-flex justify-content-end m-3">
  <img src="../assets/banner/start.svg" width="10%">
</div>
</div>
<script src="../views/src/js/script.js"></script>
<?php require '../views/layouts/footer.php'; ?>