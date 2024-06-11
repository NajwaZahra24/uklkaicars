<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../user/register.css">
</head>
<body>
    <form action="" method="post">
        <h2>ADD KATEGORI</h2>
        <label for="name">Nama:</label>
        <input type="text" name="nama" required><br>
        <button type="submit" name="submit" class="button">ADD KATEGORI</button>
    </form>

<?php
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];

    include_once("../user/connect.php");
    if ($stmt = $mysqli->prepare("INSERT INTO kategori_mobil(nama) VALUES (?)")) {
        $stmt->bind_param("s", $nama);
        $stmt->execute();
        $stmt->close();
        header("Location: indexkategori.php");
        exit();
    } else {
        echo "Error: " . $mysqli->error;
    }

    $mysqli->close();
}
?>
</body>
</html>
