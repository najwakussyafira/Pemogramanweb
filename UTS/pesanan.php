<?php
require __DIR__ . '/koneksi.php';
$conn = get_pg_connection();
$result = @pg_query($conn, 'SELECT * FROM public."TB_pesanan" ORDER BY id ASC');
if (!$result) die("Gagal mengambil data: " . pg_last_error($conn));
?>
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<title>Daftar Pesanan | SKY STORE</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
  background-color: #fff6fa;
  font-family: "Poppins", system-ui, sans-serif;
}
.navbar {
  background: linear-gradient(90deg,#ffb3d9,#ffd6eb);
}
.navbar-brand {
  font-weight:700;
  color:#fff !important;
  font-size:1.4rem;
}
.card {
  border:none;
  box-shadow:0 4px 8px rgba(255,182,193,0.3);
  border-radius:1rem;
}
.table thead {
  background-color:#ffe6f1;
  color:#d63384;
}
.btn-primary {
  background-color:#ff80b5;
  border:none;
}
.btn-primary:hover {
  background-color:#ff5c9e;
}
.btn-warning {
  background-color:#ffd6eb;
  border:none;
  color:#d63384;
}
.btn-warning:hover {
  background-color:#ffb3d9;
}
.btn-danger {
  background-color:#ff99c8;
  border:none;
}
.btn-danger:hover {
  background-color:#ff4f9a;
}
h1 {
  color:#d63384;
}
</style>
</head>

<body>
<nav class="navbar navbar-light shadow-sm mb-4">
  <div class="container">
    <a class="navbar-brand" href="#">☁ SKY STORE | Admin Pesanan</a>
  </div>
</nav>

<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4">Daftar Pesanan</h1>
    <a href="create_pesanan.php" class="btn btn-primary">+ Tambah Pesanan</a>
  </div>

  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover align-middle text-center">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Metode</th>
              <th>Produk</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; while($row=pg_fetch_assoc($result)): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= htmlspecialchars($row['Nama']) ?></td>
              <td><?= htmlspecialchars($row['Email']) ?></td>
              <td><?= htmlspecialchars($row['Metode_Pembayaran']) ?></td>
              <td><?= htmlspecialchars($row['Produk']) ?></td>
              <td><?= htmlspecialchars($row['tanggal_pesan'] ?? '-') ?></td>
              <td>
                <a href="edit_pesanan.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <form action="delete_pesanan.php" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus pesanan ini?')">
                  <input type="hidden" name="id" value="<?= $row['id'] ?>">
                  <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
              </td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</body>
</html>
