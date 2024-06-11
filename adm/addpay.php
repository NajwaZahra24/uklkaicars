<?php
include_once("../user/connect.php");

$mobil_query = mysqli_query($mysqli, "SELECT merk FROM mobil");
$mobil_options = '';
while ($row = mysqli_fetch_assoc($mobil_query)) {
    $mobil_options .= '<option value="' . $row['merk'] . '">' . $row['merk'] . '</option>';
}

if(isset($_POST['submit'])) {
    $nama_cust = $_POST['nama_cust'];
    $alamat = $_POST['alamat'];
    $merk = $_POST['merk'];
    $tgl_transaksi = $_POST['tgl_transaksi'];
    $total_harga = $_POST['total_harga'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $result = mysqli_query($mysqli, "INSERT INTO transaksi(nama_cust, alamat, merk, tgl_transaksi, total_harga, metode_pembayaran) 
    VALUES ('$nama_cust', '$alamat', '$merk', '$tgl_transaksi', '$total_harga', '$metode_pembayaran')");
    header("location:../admin/indexpay.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="transaksi.css">
</head>
<body>
    <div class="form-container">
        <h2>Form Transaksi</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="form-group">
                <label for="nama_cust">Nama Customer:</label>
                <input type="text" id="nama_cust" name="nama_cust" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="merk">Merk:</label>
                <select id="merk" name="merk" required>
                    <?php echo $mobil_options; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tgl_transaksi">Tanggal Transaksi:</label>
                <input type="date" id="tgl_transaksi" name="tgl_transaksi" required>
            </div>
            <div class="form-group">
                <label for="total_harga">Total Harga:</label>
                <input type="text" id="total_harga" name="total_harga" required>
            </div>
            <div class="form-group">
                <label for="metode_pembayaran">Metode transaksi</label>
                <select id="metode_pembayaran" name="metode_pembayaran" required>
                    <option value="BCA">BCA</option>
                    <option value="BRI">BRI</option>
                    <option value="MANDIRI">MANDIRI</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn">Submit</button>
        </form>
    </div>
</body>
</html>
