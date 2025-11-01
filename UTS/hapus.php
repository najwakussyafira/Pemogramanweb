<?php
include "koneksi.php";
$id = $_GET['id'];

pg_query($conn, "DELETE FROM public.\"TB_pesanan\" WHERE id='$id'");
header("Location: pesanan.php");
?>
