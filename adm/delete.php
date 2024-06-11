<?php
session_start();
include '../user/connect.php';

$id = $_GET['id']; 

mysqli_begin_transaction($mysqli);

try {
    // $delete_mobil = mysqli_query($mysqli, "DELETE FROM mobil WHERE id_transaksi IN (SELECT id_transaksi FROM transaksi WHERE id_user = $id)");
    // if (!$delete_mobil) {
    //     throw new Exception("Failed to delete mobil records: " . mysqli_error($mysqli));
    // }

    $delete_transactions = mysqli_query($mysqli, "DELETE FROM transaksi WHERE id_user = $id");
    if (!$delete_transactions) {
        throw new Exception("Failed to delete transactions: " . mysqli_error($mysqli));
    }

    $delete_user = mysqli_query($mysqli, "DELETE FROM user WHERE id_user = $id");
    if (!$delete_user) {
        throw new Exception("Failed to delete user: " . mysqli_error($mysqli));
    }

    mysqli_commit($mysqli);

    header("Location: index.php");
    exit();
} catch (Exception $e) {
    mysqli_rollback($mysqli);
    echo $e->getMessage();
}
?>
