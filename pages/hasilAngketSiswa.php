<?php require '../views/layouts/session.php'; ?>
<?php
require '../functions/functions.php';

$id = $_SESSION['loginId'];

// Memeriksa apakah $id tidak ada di kolom userId dari tabel kuesioner
$query = "SELECT userId FROM kuesioner WHERE userId = '$id'";
$result = $conn->query($query);

// Jika $id tidak ada di tabel kuesioner, redirect ke angketSiswa.php
if ($result->num_rows === 0) {
  header("Location: angketSiswa.php");
  exit;
}

// Memeriksa apakah gayaBelajar, kepribadian, atau kecerdasan masih NULL
$query = "SELECT gayaBelajar, kepribadian, kecerdasan FROM users WHERE id = '$id'";
$result = $conn->query($query);

// Jika nilai gayaBelajar, kepribadian, atau kecerdasan NULL, redirect ke halaman yang sesuai
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $gayaBelajar = $row['gayaBelajar'];
  $kepribadian = $row['kepribadian'];
  $kecerdasan = $row['kecerdasan'];

  if ($gayaBelajar === NULL) {
    header("Location: gayaBelajar.php");
    exit;
  } elseif ($kepribadian === NULL) {
    header("Location: kepribadian.php");
    exit;
  } elseif ($kecerdasan === NULL) {
    header("Location: minatBelajar.php");
    exit;
  }
}




$getAngket = query("SELECT * FROM kuesioner WHERE userId = $id")[0];
$getUser = query("SELECT * FROM users WHERE id = '$id'")[0];

?>
<?php require '../views/layouts/header.php' ?>
<?php require '../views/layouts/navbar.php' ?>
<style>
  body {
    background-color: #3f3a2c;
  }

  .container {
    background: linear-gradient(to right, #e3e0ce, #bcaa90);
    padding: 30px;
    border-radius: 10px;
    margin-top: 50px;
  }

  .card {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 20px;
    background-color: #492828;
    color: #ffffff;
    border-radius: 10px;
  }

  .card-text {
    flex: 0 0 auto;
    margin-right: 20px;
  }

  .card-body {
    flex: 1 1 auto;
  }

  .info-identitas {
    padding: 10px;
    border-radius: 10px;
    background-color: #ffffff;
    color: #000000;
  }

  .accordion-item {
    background-color: #ffffff;
    border-radius: 10px;
    margin-bottom: 20px;
  }

  .accordion-button {
    background-color: #492828;
    color: #ffffff;
  }

  .accordion-button:not(.collapsed) {
    background-color: #6e6998;
  }

  .accordion-body {
    background-color: #f2f2f2;
    border-top: 1px solid #cccccc;
    color: #000000;
  }
</style>
<div class="container p-5">
  <h1 class="text-center">ANGKET DATA DIRI PESERTA DIDIK <i class="fa-solid fa-graduation-cap"></i></h1>
  <br>
  <div class="card">
    <div class="card-text m-2">
      <h3 class="text-center mt-2">Identitas Peserta Didik</h3>
    </div>
    <div class="card-body p-4">
      <div class="info-identitas p-3">
        <p>Nama Peserta Didik: <?= $getAngket['nama']; ?></p>
        <p>Tempat Kelahiran: <?= $getAngket['tkl']; ?></p>
        <p>Tanggal Lahir: <?= $getAngket['ttl'] ?></p>
        <p>Jenis Kelamin: <?= $getAngket['gender']; ?></p>
        <p>Nama Orang Tua: <?= $getAngket['namaOrtu']; ?></p>
        <p>Alamat Rumah: <?= $getAngket['alamat']; ?></p>
        <p>NISN: <?= $getAngket['nisn']; ?></p>
        <p>NIS: <?= $getAngket['nis']; ?></p>
        <p>Nomor Telepon/HP: <?= $getAngket['nomorTelp']; ?></p>
        <p>Nilai Akademik dan Non-Akademik Peserta Didik:</p>
        <p>
          <button style="background-color: #8f5959;" class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Lihat Detail <i class="fa-solid fa-book"></i></button>
        </p>
        <div class="row">
          <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseExample1">
              <div style="background-color: #d1dae0;" class="card card-body text-dark">
                <strong>Nilai Akademik Peserta Didik.</strong>
                <ul>
                  <li>Mata Pelajaran Tertinggi: <?= $getAngket['mapelTinggi']; ?></li>
                  <li>Nilai Rata-Rata Mata Pelajaran Tertinggi: <?= $getAngket['nilaiTinggi']; ?></li>
                  <li>Mata Pelajaran Terendah: <?= $getAngket['mapelRendah']; ?></li>
                  <li>Nilai Rata-Rata Mata Pelajaran Terendah: <?= $getAngket['nilaiRendah']; ?></li>
                  <li>Ajang perlombaan akademik yang diikuti: <?= $getAngket['lomba']; ?></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseExample2">
              <div style="background-color: #d1dae0;" class="card card-body text-dark">
                <strong>Nilai Non-Akademik Peserta Didik.</strong>
                <ul>
                  <li>Peserta didik pernah mengikuti lomba non-akademik: <?= $getAngket['lombaNon']; ?></li>
                  <li>Uraian Lomba: <?= $getAngket['uraian']; ?></li>
                  <li>Tingkat Kejuaraan: <?= $getAngket['tingkat']; ?></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Alasan Memilih Jurusan <i style="margin-left: 5px;" class="fa-solid fa-pencil"></i></button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <strong>(<?= $getAngket['jurusan']; ?>)</strong> (<?= $getAngket['alasan']; ?>).
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Minat Study lanjut <i class="fa-solid fa-user-graduate" style="margin-left: 5px;"></i>
        </button>

      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          Peserta didik memilih <strong>(<?= $getAngket['minat']; ?>)</strong> karena (<?= $getAngket['alasanMinat']; ?>)
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Profile Siswa <i class="fa-solid fa-user" style="margin-left: 5px;"></i></button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <strong>Gaya Belajar :</strong>
          <p><?= $getUser['gayaBelajar']; ?></p>
          <strong>Kepribadian :</strong>
          <p><?= $getUser['kepribadian']; ?></p>
          <strong>Kecerdasan :</strong>
          <p><?= $getUser['kecerdasan']; ?></p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>