<?php

include("../user/connect.php");

//cek apakah tombol simpan sudah di klik atau belum
if(isset($_POST['simpan'])){

  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $level = $_POST['level'];

  //buat query update
  $result = mysqli_query($mysqli, 
  "UPDATE user 
  SET name='$name',  email='$email', username= '$username', password='$password', level='$level'
  WHERE id_user=$id");
  header('Location: index.php');
} else {
  die("Akses dilarang...");
}
?>