<?php
session_start();
require '../functions/functions.php';
if (!isset($_SESSION["login"])) {
  header('Location: login.php');
  
}

if(isset($_SESSION['loginId'])) {
  $loginId = $_SESSION['loginId'];

  // Memeriksa apakah kepribadian masih NULL
  $query = "SELECT kepribadian FROM users WHERE id = '$loginId' AND kepribadian IS NOT NULL";
  $result = $conn->query($query);

  // Jika ada hasil yang ditemukan, redirect ke profile.php
  if($result->num_rows > 0) {
    header("Location: profile.php");
    exit;
  }
}

?>
<?php require '../views/layouts/header.php'; ?>
<?php require '../views/layouts/navbar.php'; ?>
<style>
  body {
    line-height: 1.6;
    background: #1e3c72;
    background: -webkit-linear-gradient(to right, #2a5298, #1e3c72);
    background: linear-gradient(to right, #2a5298, #1e3c72);
  }

  .form-check-input[type="radio"] {
    cursor: pointer;
  }

  .btn-success {
    background: #1e130c;
    background: -webkit-linear-gradient(to right, #9a8478, #1e130c);
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  .btn-success:hover {
    background-image: linear-gradient(135deg, #3B2667 10%, #BC78EC 100%);
  }
</style>
<div class="bg-white" style="width: 100%; height: max-content; background: #1e3c72;
    background: -webkit-linear-gradient(to right, #2a5298, #1e3c72);
    background: linear-gradient(to right, #2a5298, #1e3c72);">
  <div class="container d-flex justify-content-center my-5 flex-column gap-3" style="max-width: 625px;">
    <div class="banner d-flex justify-content-center">
      <img src="../assets/banner/banner-2.png" class="rounded-3 shadow-sm" width="100%">
    </div>
    <form action="" method="post" class="d-flex flex-column my-3 gap-3">
      <?php foreach ($getPribadi as $index => $gp) : ?>
        <div class="d-flex flex-column bg-white shadow-lg rounded p-3" style="width: 100%;">
          <div class="mb-3">
            <textarea class="mb-0 flex-fill border-0" id="soal" name="soal" style="width: 100%; height: max-content; resize: none;" readonly><?= $gp['soal']; ?></textarea>
          </div>
          <div>
            <div class="form-check">
              <input type="radio" required class="form-check-input checkbox-group" name="checkboxGroup[<?= $index; ?>]" data-question="<?= $index; ?>" id="checkboxA<?= $index; ?>" value="opsi_satu">
              <label class="form-check-label" for="checkboxA<?= $index; ?>">A. <?= $gp['opsi_satu']; ?></label>
            </div>
            <div class="form-check">
              <input type="radio" required class="form-check-input checkbox-group" name="checkboxGroup[<?= $index; ?>]" data-question="<?= $index; ?>" id="checkboxB<?= $index; ?>" value="opsi_dua">
              <label class="form-check-label" for="checkboxB<?= $index; ?>">B. <?= $gp['opsi_dua']; ?></label>
            </div>
            <div class="form-check">
              <input type="radio" required class="form-check-input checkbox-group" name="checkboxGroup[<?= $index; ?>]" data-question="<?= $index; ?>" id="checkboxC<?= $index; ?>" value="opsi_tiga">
              <label class="form-check-label" for="checkboxC<?= $index; ?>">C. <?= $gp['opsi_tiga']; ?></label>
            </div>
            <div class="form-check">
              <input type="radio" required class="form-check-input checkbox-group" name="checkboxGroup[<?= $index; ?>]" data-question="<?= $index; ?>" id="checkboxD<?= $index; ?>" value="opsi_empat">
              <label Dlass="form-check-label" for="checkboxD<?= $index; ?>">D. <?= $gp['opsi_empat']; ?></label>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <button id="submitKepribadian" name="submitKepribadian" class="btn btn-success my-5">Submit</button>
    </form>
  </div>
</div>
</div>
<div class="mt-3"></div>
<div class="d-flex justify-content-end m-3">
  <img src="../assets/banner/end.svg" width="10%">
</div>
</div>
<!-- <script src="../views/src/js/script.js"></script> -->
<?php require '../views/layouts/footer.php'; ?>