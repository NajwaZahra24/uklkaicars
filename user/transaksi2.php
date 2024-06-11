<?php
include_once ("../user/connect.php");

session_start();
$id_user = $_SESSION["id_user"];

$mobil_query = mysqli_query($mysqli, "SELECT * FROM mobil");
$id = $_GET["id"];
$mobil_options = '';
while ($row = mysqli_fetch_assoc($mobil_query)) {

    $duar = null;
    if ($id == $row["id_mobil"]) {
        $duar = " selected";
    }
    $mobil_options .= '<option value="' . $row['id_mobil'] . '"' . $duar . '>' . $row['merk'] . '</option>';
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
        <form action="" method="post">
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="id_mobil">Merk:</label>
                <select id="id_mobil" name="id_mobil" required>
                    <?php echo $mobil_options; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tgl_transaksi">Tanggal Transaksi:</label>
                <input type="date" id="tgl_transaksi" name="tgl_transaksi" required>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah:</label>
                <input type="number" id="jumlah" name="jumlah" required>
            </div>
            <div class="form-group">
                <label for="metode_pembayaran">Metode pembayaran:</label>
                <select id="metode_pembayaran" name="metode_pembayaran" required>
                    <option value="" disabled selected>Pilih metode pembayaran</option>
                    <option value="BCA">BCA</option>
                    <option value="BRI">BRI</option>
                    <option value="BTN">BTN</option>
                    <option value="BNI">BNI</option>
                    <option value="MANDIRI">MANDIRI</option>
                    <option value="BANK MEGA">BANK MEGA</option>
                </select>
            </div>

            <button type="submit" name="submit" class="btn">Submit</button>
        </form>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $alamat = $_POST['alamat'];
        $id_mobil = $_POST['id_mobil'];
        $tgl_transaksi = $_POST['tgl_transaksi'];
        $jumlah = $_POST['jumlah'];
        $metode_pembayaran = $_POST['metode_pembayaran'];

        $mobil_result = mysqli_query($mysqli, "SELECT harga_jual FROM mobil WHERE id_mobil = '$id_mobil'");
        $mobil_data = mysqli_fetch_assoc($mobil_result);
        $harga_jual = $mobil_data['harga_jual'];
        $total_harga = $harga_jual * $jumlah;

        $result = mysqli_query($mysqli, "INSERT INTO transaksi (id_user,alamat, id_mobil, tgl_transaksi, jumlah, total_harga, metode_pembayaran) 
        VALUES ('$id_user','$alamat', '$id_mobil', '$tgl_transaksi', '$jumlah', '$total_harga', '$metode_pembayaran')");

        if ($result) {
            header("location:history.php");
        } else {
            echo "Error: " . mysqli_error($mysqli);
        }
    }
    ?>
</body>

</html>