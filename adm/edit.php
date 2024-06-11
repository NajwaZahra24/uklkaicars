<?php
include("../user/connect.php");

//kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: index.php');
}
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM user WHERE id_user=$id");

while($user_data = mysqli_fetch_array($result))
{
    $name = $user_data['name'];
    $email = $user_data['email'];
    $username = $user_data['username'];
    $password = $user_data['password'];
    $level=$user_data['level'];
}

?>
<body>
    <form method="POST" action="update.php">
    <link rel="stylesheet" href="edit.css">
    <header>
        <h3>Formulir Edit User</h3>
    </header>

    
        <table>
            <tr>
                <td>name</td>
                <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input type="text" name="email" value="<?php echo $email; ?>"></td>
            </tr>
            <tr>
                <td>username</td>
                <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="text" name="password" value="<?php echo $password; ?>"></td>
            </tr>
            <tr>
                <td>level</td>
                <td>
                <select name="level" id="level" required>
                <option disabled selected> <?php echo $level; ?></option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
                </td>
            </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
            <td><input type="submit" name="simpan" value="Simpan"></td>
        </tr>
        </table>
    </form>
</body>