<?php require '../views/layouts/session.php'; ?>
<?php 
require '../functions/functions.php'; 

if (!isset($_SESSION["login"])) {
  header('Location: login.php');
}

$userId = $_SESSION['loginId'];


if(isset($_SESSION['loginId'])) {
  $loginId = $_SESSION['loginId'];
  
  // Memeriksa apakah kolom kecerdasan masih NULL
  $query = "SELECT kecerdasan FROM users WHERE id = '$loginId'";
  $result = $conn->query($query);
  
  if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $kecerdasan = $row['kecerdasan'];
    
    // Jika kolom kecerdasan tidak bernilai NULL, redirect ke profile.php
    if($kecerdasan !== null) {
      header("Location: profile.php");
      exit;
    }
    
    // Jika kolom kecerdasan masih bernilai NULL dan tombol submitMinat diklik
    if(isset($_POST['submitMinat'])) {

      $_SESSION['submitMinat'] = true;
  // Tombol "submitMinat" telah diklik

  // Mendapatkan nilai jawaban dari kolom A sampai H
  $jawabanA = isset($_POST['jawabanA']) ? $_POST['jawabanA'] : array();
  $jawabanB = isset($_POST['jawabanB']) ? $_POST['jawabanB'] : array();
  $jawabanC = isset($_POST['jawabanC']) ? $_POST['jawabanC'] : array();
  $jawabanD = isset($_POST['jawabanD']) ? $_POST['jawabanD'] : array();
  $jawabanE = isset($_POST['jawabanE']) ? $_POST['jawabanE'] : array();
  $jawabanF = isset($_POST['jawabanF']) ? $_POST['jawabanF'] : array();
  $jawabanG = isset($_POST['jawabanG']) ? $_POST['jawabanG'] : array();
  $jawabanH = isset($_POST['jawabanH']) ? $_POST['jawabanH'] : array();

  // Menentukan kecerdasan pengguna
  $kecerdasan = determineUserIntelligence($jawabanA, $jawabanB, $jawabanC, $jawabanD, $jawabanE, $jawabanF, $jawabanG, $jawabanH);

      // Jalankan fungsi updateUserIntelligence
      if (updateUserIntelligence($userId, $kecerdasan)) {
        $_SESSION['kecerdasan'] = $kecerdasan;
        echo "
        <script>
            alert('Anda berhasil tes kecerdasan');
            window.location.href = 'hasilMinatBelajar.php';
        </script>
        ";
      } else {
        echo "
        <script>
            alert('Gagal');
            window.location.href = 'profile.php';
        </script>
        ";
      }
    }
  }
}





?>
<?php require '../views/layouts/header.php'; ?>
<?php require '../views/layouts/navbar.php'; ?>
<div
style="
background-color: #21D4FD;
background-image: linear-gradient(19deg, #21D4FD 0%, #B721FF 100%);
width: 100%;
height: max-content;
"
>
    <div class="container d-flex justify-content-center">
        <form action="" method="post">
            <input type="hidden" id="userId" name="userId" value="<?= $_SESSION['loginId']; ?>">
                <?php include '../private/getSoal.php'; ?>
            <button class="my-3 btn btn-success" id="submitMinat" name="submitMinat">Submit</button>
        </form>
    </div>
<?php require '../views/layouts/footer.php'; ?>
</div>