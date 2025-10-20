<?php
include "koneksi.php";

$query = 'SELECT "Nama", "Email", "Metode_Pembayaran", "Produk", "tanggal_pesan" FROM public."TB_pesanan"';
$result = pg_query($conn, $query);
?>

<!DOCTYPE html>

<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>SKY STORE | Data Pesanan</title>
</head>
<body>
  <h2>Data Pesanan SKY STORE</h2>

  <table border="1" cellpadding="8" cellspacing="0">
    <tr>
      <th>Nama</th>
      <th>Email</th>
      <th>Metode Pembayaran</th>
      <th>Produk</th>
      <th>Tanggal Pesan</th>
    </tr>

<?php
if ($result && pg_num_rows($result) > 0) {
    while ($row = pg_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['Nama']}</td>
                <td>{$row['Email']}</td>
                <td>{$row['Metode_Pembayaran']}</td>
                <td>{$row['Produk']}</td>
                <td>{$row['tanggal_pesan']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='5'>Belum ada pesanan</td></tr>";
}

pg_close($conn);
?>


  </table>

</body>
</html>
