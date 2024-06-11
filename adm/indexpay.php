<?php
session_start();
include '../user/connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ayam.css">
    <title>Admin Page</title>
</head>

<body>
    <nav>
        <a href="../user/logout.php">Log Out</a>
        <a href="index.php">USER/ADMIN</a>
        <a href="indexkategori.php">KATEGORI</a>
        <a href="indexmbl.php">MOBIL</a>
    </nav>
    <center>
        <h1>DATA TRANSAKSI</h1>
    </center>

    <table border="1" class="table">
        <tr>
            <th>Nomor</th>
            <th>Tgl transaksi</th>
            <th>Alamat</th>
            <th>jumlah</th>
            <th>Total harga</th>
            <th>Metode Pembayaran</th>
        </tr>
        <?php
        // Select table users dari database
        $query_mysqli = mysqli_query($mysqli, "SELECT * FROM transaksi") or die(mysqli_error($mysqli));
        $nomor = 1;

        while ($data = mysqli_fetch_array($query_mysqli)) {
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['tgl_transaksi']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td><?php echo $data['jumlah']; ?></td>
                <td><?php echo $data['total_harga']; ?></td>
                <td><?php echo $data['metode_pembayaran']; ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>

</html>