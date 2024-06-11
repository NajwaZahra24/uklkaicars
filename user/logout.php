<?php
session_start();
unset($_SESSION['id_user']);
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['username']);
unset($_SESSION['password']);

session_destroy();

echo "
<script>
    alert('Log out Successfully');
    document.location = 'index.php';
</script>";
?>      The closing ?> tag should be omitted from files containing only PHP.