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
</head>
<body>
    <nav>
    <a href="../user/logout.php">Log Out</a>
        <a href="addkategori.php">ADD KATEGORI</a>
        <a href="index.php">USER DATA</a>
        <a href="indexpay.php">TRANSAKSI</a>
        <a href="indexmbl.php">MOBIL</a>
    </nav>

    <center><h1>USER DATA</h1></center>

    <table border="1" class="table">
        <tr>
            <th>Nomor</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        <?php
        $query_mysqli = mysqli_query($mysqli, "SELECT * FROM kategori_mobil") or die(mysqli_error($mysqli));
        $nomor = 1;

        while ($data = mysqli_fetch_array($query_mysqli)) {
        ?>
            <tr>
                <td><?php echo $nomor++; ?></td>    
                <td><?php echo $data['nama']; ?></td>
                <td>
                    <center>
                        <a href='editkategori.php?id=<?php echo $data['id_kategori']; ?>' class="action-btn">Edit</a>
                        <a href='deletekategori.php?id=<?php echo $data['id_kategori']; ?>' class="action-btn">Delete</a>
                    </center>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
