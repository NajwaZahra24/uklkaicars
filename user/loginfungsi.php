<?php
session_start(); // Memulai sesi
include 'connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Melindungi dari SQL Injection
$username = mysqli_real_escape_string($mysqli, $username);
$password = mysqli_real_escape_string($mysqli, $password);

$login = mysqli_query($mysqli, "SELECT * FROM user WHERE username='$username'");
$cek = mysqli_num_rows($login);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);
    // Memverifikasi kata sandi
    if (password_verify($password, $data['password'])) {
        // Cek jika user sebagai admin
        if ($data['level'] == "admin") {
            $_SESSION['username'] = $username;
            $_SESSION['level'] = "admin";
            header("location:../admin/index.php");
        } else if ($data['level'] == "user") {
            $_SESSION['username'] = $username;
            $_SESSION['level'] = "user";
            header("location:../user/index.php");
        } else {
            header("location:index.php");
        }
    } else {
        header("location:index.php?pesan=gagal");
    }
} else {
    header("location:index.php?pesan=gagal");
}
?>
