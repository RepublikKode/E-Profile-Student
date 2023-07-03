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
$jumlahData = count(query("SELECT * FROM users"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataHalaman * $halamanAktif) - $jumlahDataHalaman;

// Ambil data dari tabel
$getSiswa = query("SELECT * FROM users WHERE level = 'siswa' LIMIT $awalData, $jumlahDataHalaman");

if (isset($_POST['findUser'])) {
  $getSiswa = findUser($_POST["cariUser"]);
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
      <input id="cariUser" name="cariUser" type="seacrh" class="w-100 rounded-start border-1 border shadow-sm px-1" placeholder="Cari" style="outline: none;">
      <button id="findUser" name="findUser" class="btn btn-primary rounded-0">Cari</button>
    </form>
    <div class="overflow-auto table-responsive  ">
      <table class="table caption-top text-center" style="font-size: 2vh;">
        <caption>List of users(<?= count($getKepribadian); ?>)</caption>
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Fullname</th>
            <th scope="col">Username</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($getSiswa as $gs) : ?>
            <tr>
              <th scope="row"><?= $gs['id']; ?></th>
              <td><?= $gs['fullname']; ?></td>
              <td><?= $gs['username']; ?></td>
              <td><?= $gs['level']; ?></td>
              <td class="d-flex flex-row flex-wrap gap-2 justify-content-center">
                <a href="../private/aksesGuru.php?id=<?= $gs['id']; ?>" class="btn btn-primary" style="width: 15vh; height: 4vh;" onclick="return confirm('Yakin?')">Beri Akses</a>
                <a href="../private/delete.php?id=<?= $gs['id']; ?>" class="btn btn-danger" style="width: 15vh; height: 4vh;" onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">Hapus Akun</a>
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
<?php require '../views/../views/layouts/footer.php'; ?>