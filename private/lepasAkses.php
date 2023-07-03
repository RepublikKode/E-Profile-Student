<?php 
session_start();
require '../functions/functions.php';

if (!isset($_SESSION["login"])) {
  header('Location: ../pages/login.php');
}

if($_SESSION['level'] === 'siswa') {
  header('Location: ../views/error.php');
}

$id = $_GET['id'];

// Mengupdate level pengguna menjadi "guru" berdasarkan id
$query = "UPDATE users SET level = 'siswa' WHERE id = '$id'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "<script>
    alert('user telah diberi akses sebagai Siswa');
    window.location.href = '../guru/users.php';
    </script>";
} else {
  // Terjadi kesalahan saat mengubah pengguna
  echo "Terjadi kesalahan saat mengubah pengguna.";
}



?>