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
        <a href="addmbl.php">ADD MOBIL</a>
        <a href="index.php">USER/ADMIN</a>
        <a href="indexkategori.php">KATEGORI</a>
        <a href="indexpay.php">TRANSAKSI</a>
    </nav>
    <center>
        <h1>MOBIL DATA</h1>
    </center>

    <table border="1" class="table">
        <tr>
            <th>Nomor</th>
            <th>Merk</th>
            <th>Warna</th>
            <th>Kategori</th>
            <th>Tahun rilis</th>
            <th>Stok</th>
            <th>Harga Jual</th>
            <th>Deskripsi</th>
            <th>Pict</th>
            <th>Action</th>
        </tr>
        <?php
        // Select table users dari database
        $query_mysqli = mysqli_query($mysqli, "SELECT mobil.merk, mobil.warna, mobil.tahun_rilis, mobil.stok, mobil.harga_jual, mobil.deskripsi, mobil.pict, kategori_mobil.nama FROM mobil JOIN kategori_mobil ON mobil.id_kategori=kategori_mobil.id_kategori;") or die(mysqli_error($mysqli));
        $nomor = 1;

        while ($data = mysqli_fetch_array($query_mysqli)) {
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['merk']; ?></td>
                <td><?php echo $data['warna']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['tahun_rilis']; ?></td>
                <td><?php echo $data['stok']; ?></td>
                <td><?php echo $data['harga_jual']; ?></td>
                <td><?php echo $data['deskripsi']; ?></td>
                <td><img src="<?php echo $data['pict']; ?>" width="200" height="200"></td>
                <td>
                    <center><a href='editmbl.php?id=<?php echo $data['id_mobil']; ?>' class="action-btn">Edit</a>
                        <a href='deletembl.php?id=<?php echo $data['id_mobil']; ?>' class="action-btn">Delete</a>
                    </center>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>

</html>