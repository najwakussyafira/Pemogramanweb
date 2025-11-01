<?php
include "koneksi.php";

if(isset($_POST['simpan'])){
    $nama   = $_POST['Nama'];
    $email  = $_POST['Email'];
    $metode = $_POST['Metode_Pembayaran'];
    $produk = $_POST['Produk'];

    pg_query($conn, "INSERT INTO public.\"TB_pesanan\"
    (\"Nama\",\"Email\",\"Metode_Pembayaran\",\"Produk\",\"tanggal_pesan\")
    VALUES ('$nama','$email','$metode','$produk',NOW())");

    header("Location: pesanan.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<title>Tambah Pesanan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
  background:#ffe6f1;
}
.card{
  max-width:450px;
  margin:auto;
  margin-top:50px;
}
</style>
</head>
<body>

<div class="card shadow p-4">
<h4 class="text-center text-danger">Tambah Data Pesanan</h4><hr>

<form method="post">
<input class="form-control mb-2" type="text" name="Nama" placeholder="Nama" required>
<input class="form-control mb-2" type="email" name="Email" placeholder="Email" required>

<select class="form-select mb-2" name="Metode_Pembayaran" required>
<option value="">Pilih Pembayaran</option>
<option>Dana</option>
<option>Gopay</option>
<option>Bank Transfer</option>
</select>

<input class="form-control mb-3" type="text" name="Produk" placeholder="Produk" required>

<button class="btn btn-danger w-100" type="submit" name="simpan">Simpan</button>
<a href="pesanan.php" class="btn btn-secondary w-100 mt-2">Kembali</a>
</form>
</div>

</body>
</html>

