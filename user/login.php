<?php
session_start(); 
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_or_username = $_POST['email_or_username'];
    $password = $_POST['password']; 
    $email_or_username = mysqli_real_escape_string($mysqli, $email_or_username);
    $password = mysqli_real_escape_string($mysqli, $password);
    $login = mysqli_query($mysqli, "SELECT * FROM user WHERE username='$email_or_username' OR email='$email_or_username'");
    $cek = mysqli_num_rows($login);

    if ($cek > 0) {
        $data = mysqli_fetch_assoc($login);
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        if ($password == $data['password']) {
            $_SESSION['username'] = $data['username'];
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['level'] = $data['level'];

            if ($data['level'] == "admin") {
                header("Location: ../adm/index.php");
                exit();
            } else if ($data['level'] == "user") {
                header("Location: ../user/beranda.php");
                exit();
            } else {
                header("Location: index.php");
                exit();
            }
        } else {
            echo 'Password mismatch';
            header("Location: login.php?pesan=gagal");
            exit();
        }
    } else {
        echo 'User not found';
        header("Location: login.php?pesan=gagal");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
    <title>Login</title>
    <script>
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('pesan') && urlParams.get('pesan') === 'gagal') {
                alert('Login gagal! Silakan periksa email/username dan password Anda.');
            }
        }
    </script>
</head>

<body>
    <form action="login.php" method="post">
    <link rel="stylesheet" type="text/css" href="login.css">
        <h2>LOGIN</h2>
        <label for="email_or_username">Username or Email:</label>
        <input type="text" id="username" name="email_or_username" placeholder="Username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Password" required><br>

        <button type="submit">Login</button>

        <div class="regist">
            <a href="register.php">Register</a>
        </div>
    </form>
</body>

</html>
