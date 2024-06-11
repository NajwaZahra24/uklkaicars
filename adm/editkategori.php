<?php
include ("../user/connect.php");

//kalau tidak ada id di query string
if (!isset($_GET['id'])) {
    header('Location: indexkategori.php');
}
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM kategori_mobil WHERE id_kategori=$id");

while ($user_data = mysqli_fetch_array($result)) {
    $nama = $user_data['nama'];
}

?>

<body>
    <form method="POST" action="updatekategori.php">
        <link rel="stylesheet" href="edit.css">
        <header>
            <h3>EDIT KATEGORI</h3>
        </header>

        <table>
            <tr>
                <td>nama</td>
                <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                <td><input type="submit" name="simpan" value="Simpan"></td>
            </tr>
        </table>
        
    </form>
</body>