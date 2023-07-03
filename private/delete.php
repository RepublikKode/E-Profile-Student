<?php 
require '../functions/functions.php';

if (!isset($_SESSION["login"])) {
    header('Location: ../pages/login.php');
}

if($_SESSION['level'] === 'siswa') {
    header('Location: ../views/error.php');
}

$id = $_GET['id'];
$query = "DELETE FROM users WHERE id = '$id'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "<script>
    alert('sukses');
    window.location.href = '../views/users.php';
    </script>";
} else {
  // Terjadi kesalahan saat mengubah pengguna
  echo "Terjadi kesalahan saat mengubah pengguna.";
}

?>