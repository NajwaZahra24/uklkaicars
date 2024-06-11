<?php
$databaseHost = "localhost";
$databaseName = "car_app";
$databaseUsername = "root";
$databasePassword = "";

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if($mysqli){
    //echo "koneksi db berhasil";
}else{
    //echo "koneksi gagal.<br/>";
}
?>