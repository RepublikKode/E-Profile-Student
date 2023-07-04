<?php
session_start();
require '../functions/functions.php';
if(isset($_SESSION["login"])) {
  header('Location: ../views/beranda.php');
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            $_SESSION["loginId"] = $row['id'];
            $_SESSION["login"] = true;
            $_SESSION["level"] = $row['level'];
            $_SESSION["fullname"] = $row["fullname"];
            $_SESSION["username"] = $row["username"];


            echo '<script>
                    alert("Selamat datang, ' . $username . '!"); 
                    window.location.href = "../";
                </script>';
            exit;
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="../views/src/css/login.css"/>
<head>
    <meta charset="UTF-8">
    <title>Form login</title>
    <!-- SweetAlert link -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <div class="center">
        <h1>Login</h1>
        <form action="" method="post">
        <?php if (isset($error)) :?>
        <p style="color: red; font-style:italic;">username/password salah</p>
        <?php endif; ?>
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
            <input name="login" type="submit" value="Login">
            <div class="signup_link">
            Not a member?<a href="signup.php">Signup</a>
        </div>
    </form>
    </div>
</html>
