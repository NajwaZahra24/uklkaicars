<?php

include("../user/connect.php");

//cek apakah tombol simpan sudah di klik atau belum
if(isset($_POST['simpan'])){

    $id = $_POST['id'];
    $nama_cust = $_POST['nama_cust'];
    $alamat = $_POST['alamat'];
    $merk = $_POST['merk'];
    $tgl_transaksi = $_POST['tgl_transaksi'];
    $jumlah = $_POST['jumlah'];
    $total_harga = $_POST['total_harga'];
    $metode_pembayaran = $_POST['metode_pembayaran'];

  //buat query update
  $result = mysqli_query($mysqli, 
  "UPDATE transaksi 
  SET nama_cust='$nama_cust', alamat='$alamat', merk= '$merk', tgl_transaksi='$tgl_transaksi', jumlah='$jumlah', total_harga='$total_harga', metode_pembayaran = '$metode_pembayaran'
  WHERE id_transaksi=$id");
  header('Location: indexpay.php');
} else {
  die("Akses dilarang...");
}
?>