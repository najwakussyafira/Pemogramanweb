<?php
// proses_checkout.php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  exit('Method not allowed');
}

$nama       = trim($_POST['nama'] ?? '');
$email      = trim($_POST['email'] ?? '');
$pembayaran = trim($_POST['pembayaran'] ?? '');
$produk     = trim($_POST['produk'] ?? '');

if ($nama === '' || $email === '' || $pembayaran === '' || $produk === '') {
  exit('Form belum lengkap.');
}

// INSERT; kolom tanggal_pesan biarkan default NOW() di DB (lihat langkah 3)
$sql = 'INSERT INTO public."TB_pesanan"
        ("Nama","Email","Metode_Pembayaran","Produk")
        VALUES ($1,$2,$3,$4)';

$res = pg_query_params($conn, $sql, [$nama, $email, $pembayaran, $produk]);

if ($res) {
  // selesai -> ke halaman terima kasih
  header('Location: terimakasih.html');
  exit;
} else {
  // kalau gagal, tampilkan error dari PG
  echo 'Gagal menyimpan: ' . htmlspecialchars(pg_last_error($conn));
}
