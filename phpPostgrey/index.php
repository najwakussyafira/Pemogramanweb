<?php
require __DIR__ . '/koneksi.php';
$res = q('SELECT id, nim, nama, email, jurusan, to_char(created_at, \'YYYY-MM-DD HH24:MI\') AS created_at
          FROM public.mahasiswa
          ORDER BY id ASC');

$rows = pg_fetch_all($res) ?: [];
?>

<!doctype html>
<html lang="id">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <meta charset="utf-8">
  <title>CRUD Mahasiswa (PHP + PostgreSQL)</title>
  <style>
    body {
      font-family: system-ui, Segoe UI, Roboto, Arial, sans-serif;
      max-width: 100%;
      margin: 0;
      padding: 0 12px
    }
    .navbar-custom {
      background-color: #ffffff; /* putih bersih */
      border-bottom: 2px solid #e5e7eb; /* garis bawah tipis */
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
    }

    .navbar-brand {
      font-size: 1.9rem;        /* besar */
      font-weight: 500;         /* tebal */
      color: #000 !important;   /* warna hitam */
      letter-spacing: 0.5px;    /* jarak antar huruf */
    }
    table {
      border-collapse: collapse;
      width: 100%
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 8px
    }

    th {
      background: #f6f6f6;
      text-align: left
    }

    a.btn {
      padding: 6px 10px;
      border: 1px solid #999;
      border-radius: 6px;
      text-decoration: none
    }
    .btn-add {
    background-color: #0d6efd;
    color: #fff;
    border: none;
    }
    .btn-add:hover {
    background-color: #0b5ed7;
    color: #fff;
    }
    .btn-edit {
    background-color: #ffc107;
    color: #000;
    border: none;
    }
    .btn-edit:hover {
    background-color: #e0a800;
    color: #000;
    }
    .btn-delete {
    background-color: #dc3545;
    color: #fff;
    border: none;
    }
    .btn-delete:hover {
    background-color: #bb2d3b;
    color: #fff;
    }
    .row-actions a {
      margin-right: 8px
    }
  </style>
</head>

<body>
  <nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand">Data Mahasiswa</a>
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>

  <p><a class="btn btn-add" href="create.php">+ Tambah Mahasiswa</a></p>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
        <th>Dibuat</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!$rows): ?>
      <tr>
        <td colspan="7">Belum ada data.</td>
      </tr>
      <?php else: foreach ($rows as $r): ?>
      <tr>
        <td><?= htmlspecialchars($r['id']) ?></td>
        <td><?= htmlspecialchars($r['nim']) ?></td>
        <td><?= htmlspecialchars($r['nama']) ?></td>
        <td><?= htmlspecialchars($r['email']) ?></td>
        <td><?= htmlspecialchars($r['jurusan']?? '', ENT_QUOTES, 'UTF-8') ?></td> 
        <td><?= htmlspecialchars($r['created_at']) ?></td>
        <td class="row-actions">
        <a class="btn btn-edit" href="edit.php?id=<?= urlencode($r['id']) ?>">Ubah</a>
<a href="#" class="btn btn-delete" onclick="if(confirm('Hapus data ini?')) { 
    document.getElementById('deleteForm<?= $r['id'] ?>').submit(); 
}">Hapus</a>

          <form id="deleteForm<?= $r['id'] ?>" action="delete.php" method="post" style="display:none;">
            <input type="hidden" name="id" value="<?= htmlspecialchars($r['id']) ?>">
          </form>

        </td>
      </tr>
      <?php endforeach; endif; ?>
    </tbody>
  </table>
</body>

</html>