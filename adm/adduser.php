<!DOCTYPE html>
<html>
    <head>
    </head>
    <link rel="stylesheet" href="../user/register.css">
</head>
<body>
    <form action="adduser.php" method="post">
    <h2>ADD USER</h2>
            <label for="name">Name:</label>
            <input type="text" name="name" required><br>    

            <label for="email">E-mail:</label>
            <input type="text" name="email" required><br>
    
            <label for="username">Username:</label>
            <input type="text" name="username" required><br>
    
            <label for="password">Password:</label>
            <input type="password" name="password" required><br>

            <button type="submit" name="submit" class="button">ADD USER</button>
        </form>
    </body>

<?php
    if(isset($_POST ['submit'])) {
        $name = $_POST ['name'];
        $email = $_POST ['email'];
        $username = $_POST ['username'];
        $password = $_POST ['password'];
        $level = 'user';

        include_once("../user/connect.php");

        $result = mysqli_query($mysqli, "INSERT INTO user(name, email, username, password, level) 
        VALUES ('$name', '$email', '$username', '$password', 'user')");
        header("location:../admin/index.php");
}
?>
</html>