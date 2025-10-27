<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "prakwebdb";

$connect = mysqli_connect($server, $user, $password, $database);

if (!$connect) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>
