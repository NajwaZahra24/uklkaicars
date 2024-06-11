<?php
include_once '../user/connect.php';

$id = $_GET['id'];

$delete = mysqli_query($mysqli, "DELETE FROM kategori_mobil WHERE id_kategori = $id") or die(mysqli_error($mysqli));

if($delete) {
    header("Location: indexkategori.php");
    exit();
} else {
    echo "Gagal menghapus kategori.";
}
?>