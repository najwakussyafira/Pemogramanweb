<?php
require __DIR__ . '/koneksi.php';

$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama   = trim($_POST['Nama'] ?? '');
    $email  = trim($_POST['Email'] ?? '');
    $metode = trim($_POST['Metode_Pembayaran'] ?? '');
    $produk = trim($_POST['Produk'] ?? '');

    if ($nama && $email && $metode && $produk) {
        try {
            qparams(
                'INSERT INTO public."TB_pesanan" ("Nama","Email","Metode_Pembayaran","Produk") VALUES ($1,$2,$3,$4)',
                [$nama, $email, $metode, $produk]
            );
            header('Location: pesanan.php');
            exit;
        } catch (Throwable $e) {
            $err = $e->getMessage();
        }
    } else {
        $err = "Semua field wajib diisi.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Pesanan</title>

<!-- ✅ BOOTSTRAP CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- (opsional) sentuhan pink tipis -->
<style>
  body{background:#fff6fa;font-family:system-ui,Arial}
  .card{
    border:1px solid #ffd6e8; border-radius:16px;
    box-shadow:0 8px 20px rgba(255,128,181,.12);
  }
  .btn-primary{background:#ff80b5;border:none}
  .btn-primary:hover{background:#ff5c9e}
</style>
</head>
<body class="bg-light">

<div class="container py-5">
  <div class="card mx-auto p-4" style="max-width:700px">
    <h2 class="h4 mb-3 text-center" style="color:#d63384">Tambah Pesanan</h2>

    <?php if($err): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($err) ?></div>
    <?php endif; ?>

    <form method="post">
      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="Nama" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="Email" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Metode Pembayaran</label>
        <select name="Metode_Pembayaran" class="form-select" required>
          <option value="">Pilih</option>
          <option value="Dana">Dana</option>
          <option value="Gopay">Gopay</option>
          <option value="Bank Transfer">Bank Transfer</option>
        </select>
      </div>

      <div class="mb-4">
        <label class="form-label">Produk</label>
        <input type="text" name="Produk" class="form-control" required>
      </div>

      <div class="d-flex gap-2 justify-content-end">
        <button class="btn btn-primary" type="submit">Simpan</button>
        <a class="btn btn-secondary" href="pesanan.php">Kembali</a>
      </div>
    </form>
  </div>
</div>

</body>
</html>
