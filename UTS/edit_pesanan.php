<?php
require __DIR__ . '/koneksi.php';
$conn = get_pg_connection();

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: pesanan.php');
    exit;
}

$data = pg_query($conn, "SELECT * FROM public.\"TB_pesanan\" WHERE id = '$id'");
$row = pg_fetch_assoc($data);

$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama   = trim($_POST['Nama'] ?? '');
    $email  = trim($_POST['Email'] ?? '');
    $metode = trim($_POST['Metode_Pembayaran'] ?? '');
    $produk = trim($_POST['Produk'] ?? '');

    if ($nama && $email && $metode && $produk) {
        try {
            pg_query($conn, "UPDATE public.\"TB_pesanan\"
                SET \"Nama\" = '$nama',
                    \"Email\" = '$email',
                    \"Metode_Pembayaran\" = '$metode',
                    \"Produk\" = '$produk'
                WHERE id = '$id'");
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
<title>Edit Pesanan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
  body { background:#fff6fa; font-family:system-ui, Arial; }
  .card {
    border:1px solid #ffd6e8;
    border-radius:16px;
    box-shadow:0 8px 20px rgba(255,128,181,.12);
    background:#fff;
  }
  .btn-primary { background-color:#ff80b5; border:none; }
  .btn-primary:hover { background-color:#ff5c9e; }
</style>
</head>

<body class="bg-light">
<div class="container py-5">
  <div class="card mx-auto p-4" style="max-width:700px">
    <h2 class="h4 mb-3 text-center" style="color:#d63384;">Edit Pesanan</h2>

    <?php if($err): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($err) ?></div>
    <?php endif; ?>

    <form method="post">
      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="Nama" class="form-control" required
               value="<?= htmlspecialchars($row['Nama']) ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="Email" class="form-control" required
               value="<?= htmlspecialchars($row['Email']) ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">Metode Pembayaran</label>
        <select name="Metode_Pembayaran" class="form-select" required>
          <option value="">Pilih</option>
          <option value="Dana" <?= $row['Metode_Pembayaran']=='Dana'?'selected':'' ?>>Dana</option>
          <option value="Gopay" <?= $row['Metode_Pembayaran']=='Gopay'?'selected':'' ?>>Gopay</option>
          <option value="Bank Transfer" <?= $row['Metode_Pembayaran']=='Bank Transfer'?'selected':'' ?>>Bank Transfer</option>
        </select>
      </div>

      <div class="mb-4">
        <label class="form-label">Produk</label>
        <input type="text" name="Produk" class="form-control" required
               value="<?= htmlspecialchars($row['Produk']) ?>">
      </div>

      <div class="d-flex gap-2 justify-content-end">
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="pesanan.php" class="btn btn-secondary">Kembali</a>
      </div>
    </form>
  </div>
</div>
</body>
</html>
