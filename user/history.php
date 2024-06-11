<?php
session_start();
include '../user/connect.php';

$id_user = $_SESSION["id_user"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="katalog.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

</head>

<body style="background-color: #E1F7F5; font-family: 'Poppins', sans-serif; padding: 20px;">
    <?php include "nav.php"; ?>
    <div style="max-width: 1200px; margin: auto;">
        <div
            style="background-color: #fff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); overflow: hidden; padding: 20px; margin-bottom: 20px;">
        </div>
        <div style="display: flex; flex-wrap: wrap; justify-content: space-around; gap: 20px;">
            <?php
            $query_mysqli = mysqli_query($mysqli, "SELECT * FROM transaksi WHERE id_user = '$id_user'") or die(mysqli_error($mysqli));
            $nomor = 1;

            while ($data = mysqli_fetch_array($query_mysqli)) {
                ?>
                <div
                    style="background-color: #fff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); overflow: hidden; width: calc(40% - 35px); margin: 70px 0; padding: 50px; transition: transform 0.3s, box-shadow 0.3s;">
                    <center>
                        <h1 style="color: #003C43; margin-bottom: 20px;">Riwayat Transaksi</h1>
                    </center>
                    <p style="margin: 5px 0;"><strong>No: </strong><?php echo $nomor++; ?></p>
                    <p style="margin: 5px 0;"><strong>Tanggal Transaksi: </strong><?php echo $data['tgl_transaksi']; ?></p>
                    <p style="margin: 5px 0;"><strong>Alamat: </strong><?php echo $data['alamat']; ?></p>
                    <p style="margin: 5px 0;"><strong>Jumlah: </strong><?php echo $data['jumlah']; ?></p>
                    <p style="margin: 5px 0;"><strong>Total Harga:
                        </strong><?php echo "Rp" . number_format($data['total_harga']); ?></p>
                    <p style="margin: 5px 0;"><strong>Metode Pembayaran: </strong><?php echo $data['metode_pembayaran']; ?>
                    </p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</body>

</html>