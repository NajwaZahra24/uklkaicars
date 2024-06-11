<?php
include("../user/connect.php");

// Cek apakah tombol simpan sudah diklik atau belum
if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $merk = $_POST['merk'];
    $warna = $_POST['warna'];
    $id_kategori = $_POST['id_kategori'];
    $tahun_rilis = $_POST['tahun_rilis'];
    $stok = $_POST['stok'];
    $harga_jual = $_POST['harga_jual'];
    $deskripsi = $_POST['deskripsi'];
    $pict = "";

    // Cek apakah file gambar diunggah
    if (isset($_FILES["pict"]) && $_FILES["pict"]["error"] == 0) {
        $target_dir = "../uploads/pict/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $target_file = $target_dir . basename($_FILES["pict"]["name"]);
        if (move_uploaded_file($_FILES["pict"]["tmp_name"], $target_file)) {
            // File uploaded successfully, save the file path to the database
            $pict = 'uploads/pict/' . basename($_FILES["pict"]["name"]);
        } else {
            die("Gagal mengunggah file.");
        }
    }

    // Escaping input values
    $id = mysqli_real_escape_string($mysqli, $id);
    $merk = mysqli_real_escape_string($mysqli, $merk);
    $warna = mysqli_real_escape_string($mysqli, $warna);
    $id_kategori = mysqli_real_escape_string($mysqli, $id_kategori);
    $tahun_rilis = mysqli_real_escape_string($mysqli, $tahun_rilis);
    $stok = mysqli_real_escape_string($mysqli, $stok);
    $harga_jual = mysqli_real_escape_string($mysqli, $harga_jual);
    $deskripsi = mysqli_real_escape_string($mysqli, $deskripsi);

    // Buat query update
    if ($pict != "") {
        // Jika ingin menambahkan gambar baru, tambahkan UPDATE
        $query = "UPDATE mobil SET merk='$merk', warna='$warna', tahun_rilis='$tahun_rilis', stok='$stok', harga_jual='$harga_jual', deskripsi='$deskripsi', pict='$pict' WHERE id_mobil='$id'";
    } else {
        // Jika tidak ada gambar yang diunggah, jangan ubah kolom gambar
        $query = "UPDATE mobil SET merk='$merk', warna='$warna', tahun_rilis='$tahun_rilis', stok='$stok', harga_jual='$harga_jual', deskripsi='$deskripsi' WHERE id_mobil='$id'";
    }

    // Debugging statement
    echo $query;
    // Eksekusi query
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        header('Location: indexmbl.php');
    } else {
        die("Gagal memperbarui data: " . mysqli_error($mysqli));
    }
} else {
    die("Akses dilarang...");
}
?>
