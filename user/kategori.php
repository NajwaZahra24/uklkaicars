<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K'Cars Home</title>
    <link rel="stylesheet" href="katalog.css">

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>
    <?php include "nav.php";
    include ('connect.php');
    
    ?>

    <body>
        <a href="katalog.php">Back</a>
        <section class="catalog">
            <div class="card-container">
                <?php
            $id = $_GET["id"];
                $result = mysqli_query($mysqli, "SELECT * FROM mobil where id_kategori= '$id'") or die(mysqli_error($mysqli));

                while ($data = mysqli_fetch_array($result)) {
                    ?>
                    <div class="card">
                        <img src="../upload/<?php echo $data['pict']; ?>" alt="<?php echo $data['merk']; ?>">
                        <strong>
                            <h3><?php echo $data['merk']; ?></h3>
                        </strong>
                        <p><?php echo $data['deskripsi']; ?></p>
                        <p><strong>Warna:</strong> <?php echo $data['warna']; ?></p>
                        <p><strong>Tahun Rilis:</strong> <?php echo $data['tahun_rilis']; ?></p>
                        <p><strong>Harga Jual:</strong> <?php echo "Rp. " . number_format($data['harga_jual']); ?></p>
                        <a href="transaksi2.php?id=<?php echo $data['id_mobil']; ?>" class="btn">Beli Sekarang</a>
                    </div>
                <?php } ?>
            </div>
        </section>
    </body>

</html>