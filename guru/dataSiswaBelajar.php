<?php require '../views/layouts/session.php' ?>
<?php
require '../functions/functions.php';

if (!isset($_SESSION["login"])) {
  header('Location: ../pages/login.php');
}

if ($_SESSION['level'] === 'siswa') {
  header('Location: ../views/error.php');
}

// Pagination
$jumlahDataHalaman = 10;
$jumlahData = count(query("SELECT * FROM hasil_gaya_belajar"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataHalaman * $halamanAktif) - $jumlahDataHalaman;

// Ambil data dari tabel
$siswa = query("SELECT * FROM hasil_gaya_belajar LIMIT $awalData, $jumlahDataHalaman");

if (isset($_POST['findBelajar'])) {
  $siswa = findBelajar($_POST["cariBelajar"]);
}

?>
<?php require '../views/layouts/header.php'; ?>
<?php require '../views/layouts/navbar.php'; ?>
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
      <input id="cariBelajar" name="cariBelajar" type="seacrh" class="w-100 rounded-start border-1 border shadow-sm px-1" placeholder="Cari" style="outline: none;">
      <button id="findBelajar" name="findBelajar" class="btn btn-primary rounded-0">Cari</button>
    </form>
    <div class="overflow-auto">
      <table class="table caption-top text-center" style="font-size: 1.2vh;">
        <caption>List of users(<?= count($siswa); ?>)</caption>
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Fullname</th>
            <th scope="col">Username</th>
            <th scope="col">Tipe Belajar</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($siswa as $gh) : ?>
            <tr>
              <th scope="row"><?= $gh['id']; ?></th>
              <td><?= $gh['user']; ?></td>
              <td><?= $gh['unik'] ?></td>
              <td><?= $gh['gaya_belajar']; ?></td>
              <td>
                <a href="siswaGayaBelajar.php?id=<?= $gh['id']; ?>" class="btn btn-warning" style="width: 5em;">Detail</a>
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