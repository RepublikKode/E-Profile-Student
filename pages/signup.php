<?php
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
                    alert('Selamat datang! Anda login sebagai $role.');
                  </script>";
        }
    } else {
        echo mysqli_error($conn);
    }
}
?>


?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="signup.css" />

<head>
    <meta charset="UTF-8">
    <title>Form Sign up</title>
</head>

<body>
    <div class="center">
        <h1>Register</h1>
        <form action="" method="post">
        <div class="txt_field">
                <input name="fullname" id="fullname" type="text" required>
                <span></span>
                <label for="fullname">Fullname</label>
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
                <label for="password2">Confirm Password</label>
            </div>
            <div class="your-role">
                <select class="roles" id="level" name="level" style="font-size: 16px; padding: 5px 130px; margin-bottom: 20px; " required>
                    <option value="siswa">Siswa</option>
                    <option value="guru">Guru</option>
                </select>
                <div class="error-message" id="roleError"></div>
            </div>
            <input type="submit" value="Login" name="register">
            <div class="signup_link">
                <a href="login.php">Login your account</a>
            </div>
        </form>
    </div>
</body>

</html>