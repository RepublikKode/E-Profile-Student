<?php require '../views/layouts/session.php' ?>
<?php 
require '../functions/functions.php'; 

if (!isset($_SESSION["login"])) {
  header('Location: ../pages/login.php');
}

if($_SESSION['level'] === 'siswa') {
  header('Location: ../views/error.php');
}


?>
<?php require '../views/layouts/header.php'; ?>
<?php require '../views/layouts/navbar.php'; ?>
<?php

// Pagination
$jumlahDataHalaman = 10;
$jumlahData = count(query("SELECT * FROM hasil_kepribadian"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataHalaman * $halamanAktif) - $jumlahDataHalaman;

// Ambil data dari tabel
$getKepribadian = query("SELECT * FROM hasil_kepribadian LIMIT $awalData, $jumlahDataHalaman");

if (isset($_POST['findPribadi'])) {
  $getKepribadian = findPribadi($_POST["cariPribadi"]);
}

?>

<style>
  .pagination-box {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 5px;
  }

  .pagination-box a {
    margin: 0 5px;
    text-decoration: none;
    color: #333;
    font-weight: bold;
  }

  .pagination-box a:hover {
    color: #666;
  }
</style>
<div class="container" style="width: 100%; height: max-content; min-height: 70vh;">
  <div class="card my-5 p-3 shadow-md">
  <form action="" method="post" class="d-flex flex-row">
      <input id="cariPribadi" name="cariPribadi" type="seacrh" class="w-100 rounded-start border-1 border shadow-sm px-1" placeholder="Cari" style="outline: none;">
      <button id="findPribadi" name="findPribadi" class="btn btn-primary rounded-0">Cari</button>
    </form>
    <div class="overflow-auto">
      <table class="table caption-top text-center" style="font-size: 1vh;">
        <caption>List of users(<?= count($getKepribadian); ?>)</caption>
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Fullname</th>
            <th scope="col">Username</th>
            <th scope="col">Tipe Kepribadian</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($getKepribadian as $gk) : ?>
            <tr>
              <th scope="row"><?= $gk['id']; ?></th>
              <td><?= $gk['user']; ?></td>
              <td><?= $gk['unik']; ?></td>
              <td><?= $gk['kepribadian']; ?></td>
              <td>
                <a href="siswaKepribadian.php?id=<?= $gk['id']; ?>" class="btn btn-warning" style="font-size: 1vh;">Cek Kepribadian</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <div class="pagination-box">
        <?php if ($halamanAktif > 1) : ?>
          <a href="?halaman=<?= $halamanAktif - 1; ?>">&lt;</a>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
          <?php if ($i == $halamanAktif) : ?>
            <a style="color: salmon; font-weight: bold;" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
          <?php else : ?>
            <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
          <?php endif; ?>
        <?php endfor; ?>
        <?php if ($halamanAktif < $jumlahHalaman) : ?>
          <a href="?halaman=<?= $halamanAktif + 1; ?>">&gt;</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php require '../views/layouts/footer.php'; ?>