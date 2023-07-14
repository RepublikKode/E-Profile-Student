<?php require '../views/layouts/session.php' ?>
<?php

require '../functions/functions.php';

if (!isset($_SESSION["login"])) {
  header('Location: ../pages/login.php');
}

if ($_SESSION['level'] === 'siswa') {
  header('Location: ../');
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

$id = $_SESSION['loginId'];

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
      <div class="input-group">
        <select id="filterOption" name="filterOption" class="form-select rounded-start shadow-sm" style="outline: none;" onchange="filterTable()">
          <option selected>Filter</option>
          <option value="visual">Visual</option>
          <option value="auditori">Auditori</option>
          <option value="kinestetik">Kinestetik</option>
          <option value="visual auditori">Visual-Auditori</option>
          <option value="visual kinestetik">Visual-Kinestetik</option>
          <option value="auditori visual">Auditori-Visual</option>
          <option value="auditori kinestetik">Auditori-Kinestetik</option>
          <option value="kinestetik visual">Kinestetik-Visual</option>
          <option value="kinestetik auditori">Kinestetik-Auditori</option>
          <option value="visual kinestik auditori">Visual-Kinestetik-Auditori</option>
          <option value="dominance">Dominance</option>
          <option value="influence">Influence</option>
          <option value="steadiness">Steadiness</option>
          <option value="conscientiousness">Conscientiousness</option>
          <option value="dominance-influence">Dominance-Influence</option>
          <option value="dominance-conscientiousness">Dominance-Conscientiousness</option>
          <option value="dominance-steadiness">Dominance-Steadiness</option>
          <option value="influence-steadiness">Influence-Steadiness</option>
          <option value="influence-conscientiousness">Influence-Conscientiousness</option>
          <option value="steadiness-conscientiousness">Steadiness-Conscientiousness</option>
          <option value="kecerdasan linguistik">Kecerdasan Linguistik</option>
          <option value="kecerdasan matematis">Kecerdasan Matematis</option>
          <option value="kecerdasan spasial">Kecerdasan Spasial</option>
          <option value="kecerdasan kinestetik">Kecerdasan Kinestetik</option>
          <option value="kecerdasan musikal">Kecerdasan Musikal</option>
          <option value="kecerdasan interpersonal">Kecerdasan Interpersonal</option>
          <option value="kecerdasan intrapersonal">Kecerdasan Intrapersonal</option>
          <option value="kecerdasan naturalis">Kecerdasan Naturalis</option>
        </select>
        <input id="cariUser" name="cariUser" type="search" class="form-control rounded-end shadow-sm px-1" placeholder="Cari" style="outline: none;">
        <button id="findUser" name="findUser" class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
      </div>
    </form>

    <div class="overflow-auto table-responsive">
      <table id="data-table" class="table caption-top text-center" style="font-size: 1.5vh;">
        <caption>List of users(<?= count($getSiswa); ?>)</caption>
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Fullname</th>
            <th scope="col">Username</th>
            <th scope="col">Gaya Belajar</th>
            <th scope="col">Kepribadian</th>
            <th scope="col">Kecerdasan</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($getSiswa as $gs) : ?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <td><?= $gs['fullname']; ?></td>
              <td><?= $gs['username']; ?></td>
              <td><?= $gs['gayaBelajar']; ?></td>
              <td><?= $gs['kepribadian']; ?></td>
              <td><?= $gs['kecerdasan']; ?></td>
              <td><?= $gs['level']; ?></td>
              <td class="d-flex flex-row flex-wrap gap-2 justify-content-center">
                <a style="width: 15vh; height: 5vh;" href="../private/aksesGuru.php?id=<?= $gs['id']; ?>" class="btn btn-primary" onclick="return confirm('Yakin?')">Beri Akses</a>
                <a style="width: 15vh; height: 5vh;" href="../private/delete.php?id=<?= $gs['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">Hapus Akun</a>
                <a style="width: 15vh; height: 5vh;" href="angketSiswa.php?id=<?= $gs['id'] ?>" class="btn btn-warning">Detail Angket</a>
              </td>
            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
      <div class="pagination-box">
        <?php if ($halamanAktif > 1) : ?>
          <a href="?halaman=<?= $halamanAktif - 1; ?>"><i class="fas fa-chevron-left"></i></a>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
          <?php if ($i == $halamanAktif) : ?>
            <a style="color: salmon; font-weight: bold;" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
          <?php else : ?>
            <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
          <?php endif; ?>
        <?php endfor; ?>
        <?php if ($halamanAktif < $jumlahHalaman) : ?>
          <a href="?halaman=<?= $halamanAktif + 1; ?>"><i class="fas fa-chevron-right"></i></a>
        <?php endif; ?>
      </div>
      <a href="dataExcel.php" class="btn btn-success mt-3">Download Excel</a>
    </div>
  </div>
</div>
<?php require '../views/../views/layouts/footer.php'; ?>
<script>
  function filterTable() {
    var filterOption = document.getElementsByName("filterOption")[0];
    var selectedOption = filterOption.value;
    var table = document.getElementById("data-table");
    var rows = table.getElementsByTagName("tr");

    for (var i = 0; i < rows.length; i++) {
      var cells = rows[i].getElementsByTagName("td");
      var display = false;

      for (var j = 0; j < cells.length; j++) {
        var cell = cells[j];

        if (
          cell.innerHTML.toLowerCase().includes(selectedOption) ||
          selectedOption === "filter"
        ) {
          display = true;
          break;
        }
      }

      if (display) {
        rows[i].style.display = "";
      } else {
        rows[i].style.display = "none";
      }
    }

    // Tampilkan juga elemen <th>
    var headerRow = table.getElementsByTagName("thead")[0].getElementsByTagName("tr")[0];
    headerRow.style.display = "";
  }
</script>