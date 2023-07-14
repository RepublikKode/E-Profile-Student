<?php
session_start();
require '../functions/functions.php';

// Ketika tombol button register ditekan
if (isset($_POST["register"])) {
    $result = register($_POST);
    if ($result > 0) {
        $level = $_POST['level'];
        $roles = array(
            'siswa' => 'Siswa',
            'guru' => 'Guru'
        );
        $role = $roles[$level] ?? '';

        if ($role !== '') {
            echo "<script>
                    alert('User baru berhasil ditambahkan!');
                    window.href.location = 'dashboardGuru.php';
                  </script>";
        }
    } else {
        echo mysqli_error($conn);
    }
}

if ($_SESSION['level'] === 'siswa') {
    header('Location: ../views/');
}

?>

<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../views/src/css/signup.css" />
    <title>Form Sign up</title>
</head>
<body>
    <div class="container">
        <div class="center">
            <h1>Registrasi</h1>
            <form action="" method="post">
            <div class="txt_field">
                    <input name="fullname" id="fullname" type="text" required>
                    <span></span>
                    <label for="fullname">Nama Lengkap</label>
                </div>
                <div class="txt_field">
                    <input name="username" id="username" type="text" required>
                    <span></span>
                    <label for="username">Username</label>
                </div>
                <div class="txt_field">
                    <input name="password" id="password" type="password" required>
                    <span></span>
                    <label for="password">Password</label>
                </div>
                <div class="txt_field">
                    <input name="password2" id="password2" type="password" required>
                    <span></span>
                    <label for="password2">Konfirmasi Password</label>
                </div>
                <div class="your-role">
                    <select class="roles" id="level" name="level" style="font-size: 16px; padding: 5px 130px; margin-bottom: 20px; " required>
                        <option value="siswa">Siswa</option>
                        <option value="guru">Guru</option>
                    </select>
                    <div class="error-message" id="roleError"></div>
                </div>
                <input type="submit" value="Buat Akun" name="register">
                <a href="dashboardGuru.php" style="text-decoration: none; text-align: center;">Batal</a>
            </form>
        </div>
    </div>
</body>

</html>