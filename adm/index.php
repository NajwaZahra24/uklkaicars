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
        <a href="adduser.php">ADD USER</a>
        <a href="indexmbl.php">MOBIL</a>
        <a href="indexpay.php">TRANSAKSI</a>
        <a href="indexkategori.php">KATEGORI</a>
    </nav>

    <center><h1>USER DATA</h1></center>

    <table border="1" class="table">
        <tr>
            <th>Nomor</th>
            <th>Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Password</th>
            <th>Level</th>
            <th>Action</th>
        </tr>
        <?php
        $query_mysqli = mysqli_query($mysqli, "SELECT * FROM user") or die(mysqli_error($mysqli));
        $nomor = 1;

        while ($data = mysqli_fetch_array($query_mysqli)) {
        ?>
            <tr>
                <td><?php echo $nomor++; ?></td>    
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo $data['password']; ?></td>
                <td><?php echo $data['level']; ?></td>
                <td>
                    <center>
                        <a href='edit.php?id=<?php echo $data['id_user']; ?>' class="action-btn">Edit</a>
                        <a href='delete.php?id=<?php echo $data['id_user']; ?>' class="action-btn">Delete</a>
                    </center>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
