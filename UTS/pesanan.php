<?php
include "koneksi.php";

$query = pg_query($conn, "SELECT * FROM public.\"TB_pesanan\" ORDER BY id ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { padding: 30px 30px 30px 0; 
        }
        .navbar-brand { font-weight: 800; font-size: 1.25rem; }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border:1px solid #999;
        }
        th, td {
            padding: 10px;
            text-align:center;
        }
        th {
            background: #ff80b5;
            color:white;
        }
        .btn-add {
            background:#28a745;
            padding:8px 15px;
            color:white;
            border-radius:5px;
            text-decoration:none;
        }
        .btn-edit {
            background:#ffc107;
            padding:5px 10px;
            color:white;
            border-radius:5px;
            text-decoration:none;
        }
        .btn-delete {
            background:#dc3545;
            padding:5px 10px;
            color:white;
            border-radius:5px;
            text-decoration:none;
        }
    </style>
</head>
<body>
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid px-3">
    <a class="navbar-brand fw-bold" href="#">DATA PESANAN SKY STORE</a>
  </div>
</nav>

</nav>
<br>


<a href="tambah.php" class="btn-add">+ Tambah Pesanan</a>
<br><br>

<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Metode Pembayaran</th>
        <th>Produk</th>
        <th>Tanggal Pesan</th>
        <th>Aksi</th>
    </tr>

    <?php
    while($row = pg_fetch_assoc($query)) {
    ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['Nama']; ?></td>
        <td><?php echo $row['Email']; ?></td>
        <td><?php echo $row['Metode_Pembayaran']; ?></td>
        <td><?php echo $row['Produk']; ?></td>
        <td><?php echo $row['tanggal_pesan']; ?></td>

        <td>
            <a class="btn-edit" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>

            <a class="btn-delete"
               href="hapus.php?id=<?php echo $row['id']; ?>"
               onclick="return confirm('Yakin ingin menghapus pesanan ini?');">
               Hapus
            </a>
        </td>
    </tr>
    <?php } ?>

</table>

</body>
</html>
