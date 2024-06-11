<?php
include_once '../user/connect.php';

$id = $_GET['id']; // Ambil id user dari parameter URL

// Hapus data user dari database
$delete = mysqli_query($mysqli, "DELETE FROM transaksi WHERE id_transaksi = $id") or die(mysqli_error($mysqli));

if($delete) {
    // Redirect kembali ke halaman user.php setelah berhasil menghapus
    header("Location: indexpay.php");
    exit();
} else {
    echo "Gagal menghapus transaksi.";
}
?>