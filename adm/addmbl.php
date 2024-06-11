
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addmobil.css">
    <title>Form Add Mobil</title>
</head>
<body>
    <div class="form-container">
        <h2>Form Add Mobil</h2>
        <form action="addmbl.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="merk">Merk:</label>
                <input type="text" id="merk" name="merk" required>
            </div>
            <div class="form-group">
                <label for="warna">Warna:</label>
                <input type="text" id="warna" name="warna" required>
            </div>
            <div class="form-group">
                <label for="id_kategori">Kategori:</label>
                <select id="id_kategori" name="id_kategori" required>
                    <?php
                    include '../user/connect.php';
                    $query = "SELECT id_kategori, nama FROM kategori_mobil";
                    $result = mysqli_query($mysqli, $query);
                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $data['id_kategori'] . "'>" . $data['nama'];
                        "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tahun_rilis">Tahun Rilis:</label>
                <input type="text" id="tahun_rilis" name="tahun_rilis" required>
            </div>
            <div class="form-group">
                <label for="stok">Stok:</label>
                <input type="number" id="stok" name="stok" required>
            </div>
            <div class="form-group">
                <label for="harga_jual">Harga Jual:</label>
                <input type="text" id="harga_jual" name="harga_jual" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" id="deskripsi" name="deskripsi" required>
            </div>
            <div class="form-group">
                <label for="pict">Picture</label>
                <input type="file" id="pict" name="pict" required>
            </div>
            <button type="submit" name="submit" class="btn">Submit</button>
        </form>
    </div>

    <?php

    if (isset($_POST['submit'])) {
        $merk = $_POST['merk'];
        $warna = $_POST['warna'];
        $id_kategori = $_POST['id_kategori'];
        $tahun_rilis = $_POST['tahun_rilis'];
        $stok = $_POST['stok'];
        $harga_jual = $_POST['harga_jual'];
        $deskripsi = $_POST['deskripsi'];
        header("location:indexmbl.php");

    if (isset($_FILES['pict']) && $_FILES['pict']['error'] === UPLOAD_ERR_OK) {
    $target_dir = "";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $target_file = $target_dir . basename($_FILES["pict"]["name"]);
    if (move_uploaded_file($_FILES["pict"]["tmp_name"], $target_file)) {
        $pict = '' . basename($_FILES["pict"]["name"]);

        include_once("../user/connect.php");

        $result = mysqli_query($mysqli, "INSERT INTO mobil (merk, warna, tahun_rilis, stok, harga_jual, deskripsi, pict, id_kategori) 
        VALUES ('$merk', '$warna', '$tahun_rilis', '$stok', '$harga_jual', '$deskripsi', '$pict', '$id_kategori')");
        
        if ($result) {
            echo "Data mobil berhasil disimpan.";
        } else {
            echo "Terjadi kesalahan saat menyimpan data mobil: " . mysqli_error($mysqli);
        }
    } else {
        echo "Terjadi kesalahan saat mengunggah file.";
    }
} else {
    echo "Tidak ada file yang diunggah atau terjadi kesalahan saat mengunggah.";
}

    }
    ?>
</body>
</html>
