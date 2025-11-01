<?php
include "koneksi.php";

$id = $_GET['id'];
$data = pg_query($conn, "SELECT * FROM public.\"TB_pesanan\" WHERE id='$id'");
$row = pg_fetch_assoc($data);

if(isset($_POST['update'])){
    $nama   = $_POST['Nama'];
    $email  = $_POST['Email'];
    $metode = $_POST['Metode_Pembayaran'];
    $produk = $_POST['Produk'];

    pg_query($conn, "UPDATE public.\"TB_pesanan\"
    SET \"Nama\"='$nama', \"Email\"='$email', \"Metode_Pembayaran\"='$metode', \"Produk\"='$produk'
    WHERE id='$id'");

    header("Location: pesanan.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<title>Edit Pesanan</title>

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
<h4 class="text-center text-danger">Edit Data Pesanan</h4><hr>

<form method="post">
<input class="form-control mb-2" type="text" name="Nama" value="<?= $row['Nama']; ?>" required>
<input class="form-control mb-2" type="email" name="Email" value="<?= $row['Email']; ?>" required>

<select class="form-select mb-2" name="Metode_Pembayaran" required>
  <option <?= ($row['Metode_Pembayaran']=="Dana" ? "selected":""); ?>>Dana</option>
  <option <?= ($row['Metode_Pembayaran']=="Gopay" ? "selected":""); ?>>Gopay</option>
  <option <?= ($row['Metode_Pembayaran']=="Bank Transfer" ? "selected":""); ?>>Bank Transfer</option>
</select>

<input class="form-control mb-3" type="text" name="Produk" value="<?= $row['Produk']; ?>" required>

<button class="btn btn-danger w-100" type="submit" name="update">Update</button>
<a href="pesanan.php" class="btn btn-secondary w-100 mt-2">Kembali</a>
</form>
</div>

</body>
</html>

