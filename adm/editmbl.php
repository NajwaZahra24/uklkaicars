<?php
include ("../user/connect.php");

// Kalau tidak ada id di query string
if (!isset($_GET['id'])) {
    header('Location: indexmbl.php');
}
$id = $_GET['id'];

// Fetech mobil data based on id
$result = mysqli_query($mysqli, "SELECT * FROM mobil WHERE id_mobil=$id");

// Check if data exists
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $merk = $row['merk'];
    $warna = $row['warna'];
    $id_kategori = $row['id_kategori'];
    $tahun_rilis = $row['tahun_rilis'];
    $stok = $row['stok'];
    $harga_jual = $row['harga_jual'];
    $deskripsi = $row['deskripsi'];
    $pict = $row['pict'];
} else {
    // Redirect if no data found
    header('Location: indexmbl.php');
    exit();
}
?>

<body>
    <form method="POST" action="updatembl.php" enctype="multipart/form-data">
        <link rel="stylesheet" href="edit.css">
        <table>
            <header>
                <h3>Formulir Edit Mobil</h3>
            </header>
            <tr>
                <td>Merk</td>
                <td><input type="text" name="merk" value="<?php echo $merk; ?>"></td>
            </tr>
            <tr>
                <td>Warna</td>
                <td><input type="text" name="warna" value="<?php echo $warna; ?>"></td>
            </tr>
            <tr>
                <td>Tahun rilis</td>
                <td><input type="text" name="tahun_rilis" value="<?php echo $tahun_rilis; ?>"></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><input type="text" name="stok" value="<?php echo $stok; ?>"></td>
            </tr>
            <tr>
                <td>Harga jual</td>
                <td><input type="text" name="harga_jual" value="<?php echo $harga_jual; ?>"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsi" value="<?php echo $deskripsi; ?>"></td>
            </tr>
            <tr>
                <td>Foto Mobil</td>
                <td><input type="file" name="foto" enctype="multipart/form-data"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                <td><input type="submit" name="simpan" value="Simpan"></td>
            </tr>
        </table>
    </form>
</body>