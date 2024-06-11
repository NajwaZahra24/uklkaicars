<?php

include("../user/connect.php");

//cek apakah tombol simpan sudah di klik atau belum
if(isset($_POST['simpan'])){

  $id = $_POST['id'];
  $name = $_POST['nama'];

  //buat query update
  $result = mysqli_query($mysqli, 
  "UPDATE kategori_mobil 
  SET nama='$nama'
  WHERE id_kategori=$id");
  header('Location: indexkategori.php');
} else {
  die("Akses dilarang...");
}
?>