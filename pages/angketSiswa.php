<?php require '../views/layouts/session.php'; ?>
<?php
require '../functions/functions.php';

if (!isset($_SESSION["login"])) {
  header('Location: login.php');
}

$id = $_SESSION['loginId'];

if(isset($_SESSION['loginId'])) {;
  $loginId = $_SESSION['loginId'];
  // Memeriksa apakah loginId ada di tabel kuesioner;
  $query = "SELECT COUNT(*) as count FROM kuesioner WHERE userId = '$loginId'";
  $result = $conn->query($query);
  $row = $result->fetch_assoc();
  $count = $row['count'];
  
  // Jika loginId ada, redirect ke profile.php;
  if($count > 0) {;
    header("Location: profile.php");
    exit;
  };
};


$getUser = query("SELECT * FROM users WHERE id = '$id'")[0];

?>
<?php require '../views/layouts/header.php' ?>
<?php require '../views/layouts/navbar.php' ?>
<div class="container p-5">
  <h1 class="text-center">ANGKET DATA DIRI PESERTA DIDIK</h1>
  <hr />
  <div class="card-text">
    <h3>A. Identitas Peserta Didik</h3>
  </div>
  <div class="card-body">
    <form action="" method="post">
      <input type="hidden" id="userId" name="userId" value="<?= $_SESSION['loginId']; ?>">
      <div class="form-group mb-2">
        <label for="nama" class="m-2">Nama Peserta Didik:</label>
        <input name="nama" type="text" placeholder="Enter your name..." autofocus autocomplete="off" id="nama" class="form-control" required />
      </div>
      <div class="form-group mb-2">
        <label for="tkl" class="m-2">Tempat Kelahiran:</label>
        <input name="tkl" type="text" placeholder="Enter..." autofocus autocomplete="off" id="tkl" class="form-control" required />
      </div>
      <div class="form-group mb-2">
        <label for="ttl" class="m-2">Tanggal Lahir:</label>
        <input name="ttl" type="date" placeholder="Enter..." autofocus autocomplete="off" id="ttl" class="form-control" required />
      </div>
      <div class="form-group mb-2">
        <label class="m-2">Jenis Kelamin: </label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="gender" value="Laki-Laki" />
          <label class="form-check-label" for="genderMale"> Laki-laki </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="gender" value="Perempuan"/>
          <label class="form-check-label" for="genderFemale"> Perempuan </label>
        </div>
      </div>
      <div class="form-group mb-2">
        <label for="namaOrtu" class="m-2">Nama Orang Tua:</label>
        <input name="namaOrtu" type="text" placeholder="Enter..." autofocus autocomplete="off" id="namaOrtu" class="form-control" required />
      </div>
      <div class="form-group mb-2">
        <label for="alamat" class="m-2">Alamat Rumah:</label>
        <input name="alamat" type="text" placeholder="Enter..." autofocus autocomplete="off" id="alamat" class="form-control" required />
      </div>
      <div class="form-group mb-2">
        <label for="nisn" class="m-2">NISN:</label>
        <input name="nisn" type="number" placeholder="Enter your nisn..." autofocus autocomplete="off" id="nisn" class="form-control" required />
      </div>
      <div class="form-group mb-2">
        <label for="nis" class="m-2">NIS:</label>
        <input name="nis" type="number" placeholder="Enter your nis..." autofocus autocomplete="off" id="nis" class="form-control" required />
      </div>
      <div class="form-group mb-2">
        <label for="nomorTelp" class="m-2">Nomor Telepon/HP</label>
        <input name="nomorTelp" type="number" placeholder="Enter your number phone..." autofocus autocomplete="off" id="nomorTelp" class="form-control" required />
      </div>
  </div>
  <br />
  <hr />
  <div class="card-text">
    <h3>B. Nilai Akademik Peserta Didik</h3>
  </div>
  <div class="card-body">
    <div class="form-group mb-2">
      <label for="nilaiTinggi" class="m-2">Nilai Rata-Rata Mata Pelajaran Tertinggi:</label>
      <select name="mapelTinggi" id="mapelTinggi" class="form-select form-select mb-3" required>
        <option selected>Pilih Mata Pelajaran</option>
        <option value="Matematika">Matematika</option>
        <option value="Bahasa Indonesia">Bahasa Indonesia</option>
        <option value="Bahasa Inggris">Bahasa Inggris</option>
        <option value="Ilmu Pengetahuan Alam">Ilmu Pengetahuan Alam</option>
        <option value="Pendidikan Agama">Pendidikan Agama</option>
        <option value="Muatan Lokal">Muatan Lokal</option>
        <option value="Baca Tulis Al-Qur'an(BTA)">Baca Tulis Al-Qur'an(BTA)</option>
        <option value="Seni Budaya">Seni Budaya</option>
        <option value="Pendidikan Kewarganegaraan">Pendidikan Kewarganegaraan</option>
        <option value="Pendidikan Jasmani & Olahraga">Pendidikan Jasmani & Olahraga</option>
        <option value="Prakarya">Prakarya</option>
        <option value="Informatika(TIK)">Informatika(TIK)</option>
        <option value="Ilmu Pengetahuan Sosial">Ilmu Pengetahuan Sosial</option>
        <option value="Lainnya">Lainnya</option>
      </select>
      <input name="nilaiTinggi" type="text" placeholder="Tuliskan berapa nilai nya..." autofocus autocomplete="off" id="nilaiTinggi" class="form-control" required />
    </div>
    <div class="form-group mb-2">
      <label for="nilaiRendah" class="m-2">Nilai Rata-Rata Mata Pelajaran Terendah:</label>
      <select name="mapelRendah" id="mapelRendah" class="form-select form-select mb-3" required>
        <option selected>Pilih Mata Pelajaran</option>
        <option value="Matematika">Matematika</option>
        <option value="Bahasa Indonesia">Bahasa Indonesia</option>
        <option value="Bahasa Inggris">Bahasa Inggris</option>
        <option value="Ilmu Pengetahuan Alam">Ilmu Pengetahuan Alam</option>
        <option value="Pendidikan Agama">Pendidikan Agama</option>
        <option value="Muatan Lokal">Muatan Lokal</option>
        <option value="Baca Tulis Al-Qur'an(BTA)">Baca Tulis Al-Qur'an(BTA)</option>
        <option value="Seni Budaya">Seni Budaya</option>
        <option value="Pendidikan Kewarganegaraan">Pendidikan Kewarganegaraan</option>
        <option value="Pendidikan Jasmani & Olahraga">Pendidikan Jasmani & Olahraga</option>
        <option value="Prakarya">Prakarya</option>
        <option value="Informatika(TIK)">Informatika(TIK)</option>
        <option value="Ilmu Pengetahuan Sosial">Ilmu Pengetahuan Sosial</option>
        <option value="Lainnya">Lainnya</option>
      </select>
      <input name="nilaiRendah" type="text" placeholder="Tulis berapa nilai nya..." autofocus autocomplete="off" id="nilaiRendah" class="form-control" required />
    </div>
    <label for="lomba" class="m-2">Pernah ikut ajang perlombaan akademik?</label>
    <div class="form-floating mb-2">
      <textarea name="lomba" class="form-control" id="lomba" style="height: 100px"></textarea>
      <label for="lomba">Tuliskan secara detail uraian bidang lomba dan tingkat kejuaraan</label>
    </div>
  </div>
  <br />
  <hr />
  <div class="card-text">
    <h3>C. Nilai Non-Akademik Peserta Didik</h3>
  </div>
  <div class="card-body">
    <div class="form-group mb-2">
      <label for="lombaNon" class="m-2">Pernah ikut lomba non-akademik apa aja? <br />
        (contoh: olahraga, seni, dsb)</label>
      <input name="lombaNon" type="text" placeholder="Tulis nama lomba..." autofocus autocomplete="off" id="lombaNon" class="form-control" />
    </div>
    <div class="form-floating mb-2">
      <textarea name="uraian" class="form-control" placeholder="uraian" id="uraian" style="height: 100px"></textarea>
      <label for="uraian">Uraian Lomba</label>
    </div>
    <div class="form-floating mb-2">
      <textarea name="tingkat" class="form-control" placeholder="tingkat" id="tingkat" style="height: 100px"></textarea>
      <label for="tingkat">Tingkat kejuaraan</label>
    </div>
  </div>
  <br />
  <hr />
  <div class="card-text">
    <h3>D. Alasan Memilih Jurusan</h3>
  </div>
  <div class="card-body">
    <div class="form-group d-block mb-2">
      <label for="jurusan" class="m-2">Jurusan:</label>
      <select name="jurusan" id="jurusan" class="form-select form-select mb-3" required>
        <option selected>Pilih Jurusan</option>
        <option value="Pekerjaan Sosial">Pekerjaan Sosial</option>
        <option value="Teknik Furnitur">Teknik Furnitur & Desain Interior</option>
        <option value="Broadcasting">Broadcasting & Film</option>
        <option value="Teknik Jaringan Komputer dan Telekomunikasi">Teknik Jaringan Komputer dan Telekomunikasi</option>
        <option value="Pengembangan Perangkat Lunak dan Gim">Pengembangan Perangkat Lunak dan Gim</option>
        <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
        <option value="Teknik Kimia Industri">Teknik Kimia Industri</option>
        <option value="Animasi">Animasi</option>
      </select>
    </div>
    <div class="form-floating mb-2">
      <textarea name="alasan" class="form-control" placeholder="alasan" id="alasan" style="height: 100px"></textarea>
      <label for="alasan">Alasan Memilih</label>
    </div>
  </div>
  <br />
  <hr />
  <div class="card-text">
    <h3>E. Minat Study Lanjut</h3>
  </div>
  <div class="card-body">
    <div class="form-group d-block mb-2">
      <label for="minat" class="m-2">Minat Study:</label>
      <select name="minat" id="minat" class="form-select form-select mb-3" required>
        <option selected>Pilih Minat Study Lanjut</option>
        <option value="Bekerja">Bekerja</option>
        <option value="Kuliah">Kuliah</option>
        <option value="Wirausaha">Wirausaha</option>
      </select>
    </div>
    <div class="form-floating mb-2">
      <textarea name="alasanMinat" class="form-control" placeholder="alasanMinat" id="alasanMinat" style="height: 100px"></textarea>
      <label for="alasanMinat">Alasan</label>
    </div>
    <div>
      <button id="submitMinat" name="submitAngket" class="btn btn-success">Submit</button>
    </div>
    </form>
  </div>
  <br>
  <hr>
</div>
<?php require '../views/layouts/footer.php'; ?>