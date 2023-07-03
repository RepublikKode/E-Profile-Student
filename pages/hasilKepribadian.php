<?php 
require '../views/layouts/session.php'; 
?>
<?php
require '../functions/functions.php';
if (!isset($_SESSION["login"])) {
  header('Location: login.php');
}

$kepribadian = $_GET['kepribadian'];

// Cek apakah pengguna berada di halaman hasilKepribadian.php
if (basename($_SERVER['PHP_SELF']) === 'hasilKepribadian.php') {
  // Hapus session "hasilKepribadian" jika pengguna kembali ke halaman ini
  unset($_SESSION["hasilKepribadian"]);
} else {
  // Cek apakah session "hasilKepribadian" sudah ada atau belum
  if (!isset($_SESSION["hasilKepribadian"])) {
      header('Location: ../views/error.php');
      exit();
  }
}

// Daftar kepribadian yang valid
$validKepribadian = ['Dominance', 'Influence', 'Conscientiousness', 'Steadiness', 'Dominance-Influence', 'Dominance-Conscientiousness', 'Dominance-Steadiness', 'Influence-Dominance', 'Influence-Conscientiousness', 'Influence-Steadiness', 'Conscientiousness-Dominance', 'Conscientiousness-Influence', 'Conscientiousness-Steadiness', 'Steadiness-Dominance', 'Steadiness-Influence', 'Steadiness-Conscientiousness'];

// Periksa apakah kepribadian yang diterima valid
if (!in_array($kepribadian, $validKepribadian)) {
  header('Location: ../views/error.php');
  exit();
}

$pribadi = $_GET['kepribadian'];
?>
<?php require '../views/layouts/header.php' ?>
<?php require '../views/layouts/navbar.php' ?>
<div
  class="bg-gradient"
  style="
    background-color: #f2f6f8;
    width: 100%;
    height: max-content;
    display: flex;
    justify-content: center;
    align-items: center;
  "
>
  <div class="container">
    <div
      class="card shadow p-4 my-3"
      style="
        background-color: #ffffff;
        width: 100%;
        max-width: 600px;
        border-radius: 10px;
      "
    >
      <h2 class="fw-bold border-bottom pb-3 mb-4" style="color: #333333">
        Hasil Tes Kepribadian
      </h2>
      <div class="mb-4">
        <h4 class="text-warning"><?= $pribadi; ?></h4>
      </div>
      <?php if($pribadi === 'Dominance') : ?>
      <div>
        <p><?= $getDescP['dominance']; ?></p>
      </div>
      <?php elseif($pribadi === 'Influence') : ?>
      <div>
        <p><?= $getDescP['influence']; ?></p>
      </div>
      <?php elseif($pribadi === 'Conscientiousness') : ?>
      <div>
        <p><?= $getDescP['conscientiousness']; ?></p>
      </div>
      <?php elseif($pribadi === 'Steadiness') : ?>
      <div>
        <p><?= $getDescP['steadiness']; ?></p>
      </div>
      <?php elseif($pribadi === 'Dominance-Influence') : ?>
      <div>
        <p><?= $getDescP['dominance_influence']; ?></p>
      </div>
      <?php elseif($pribadi === 'Dominance-Conscientiousness') : ?>
      <div>
        <p><?= $getDescP['dominance_conscientiousness']; ?></p>
      </div>
      <?php elseif($pribadi === 'Dominance-Steadiness') : ?>
      <div>
        <p><?= $getDescP['dominance_steadiness']; ?></p>
      </div>
      <?php elseif($pribadi === 'Influence-Dominance') : ?>
      <div>
        <p><?= $getDescP['influence_dominance']; ?></p>
      </div>
      <?php elseif($pribadi === 'Influence-Conscientiousness') : ?>
      <div>
        <p><?= $getDescP['influence_conscientiousness']; ?></p>
      </div>
      <?php elseif($pribadi === 'Influence-Steadiness') : ?>
      <div>
        <p><?= $getDescP['influence_steadiness']; ?></p>
      </div>
      <?php elseif($pribadi === 'Conscientiousness-Dominance') : ?>
      <div>
        <p><?= $getDescP['conscientiousness_dominance']; ?></p>
      </div>
      <?php elseif($pribadi === 'Conscientiousness-Influence') : ?>
      <div>
        <p><?= $getDescP['conscientiousness_influence']; ?></p>
      </div>
      <?php elseif($pribadi === 'Conscientiousness-Steadiness') : ?>
      <div>
        <p><?= $getDescP['conscientiousness_steadiness']; ?></p>
      </div>
      <?php elseif($pribadi === 'Steadiness-Dominance') : ?>
      <div>
        <p><?= $getDescP['steadiness_dominance']; ?></p>
      </div>
      <?php elseif($pribadi === 'Steadiness-Influence') : ?>
      <div>
        <p><?= $getDescP['steadiness_influence']; ?></p>
      </div>
      <?php elseif($pribadi === 'Steadiness-Conscientiousness') : ?>
      <div>
        <p><?= $getDescP['steadiness_conscientiousness']; ?></p>
      </div>
      <?php endif; ?>
      <div class="d-flex justify-content-center mt-4">
        <a
          href="../"
          class="btn btn-success me-3"
          style="background-color: #28a745; color: #ffffff"
          >Kembali ke Beranda</a
        >
      </div>
      <div class="d-flex justify-content-center mt-4">
        <img
          src="../assets/cards/learn2.svg"
          alt="Learn"
          style="width: 100%; max-width: 200px; margin-top: 20px"
        />
      </div>
    </div>
  </div>
</div>
<?php require '../views/layouts/footer.php'; ?>