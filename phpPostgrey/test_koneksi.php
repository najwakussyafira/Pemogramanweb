<?php
require 'koneksi.php';

try {
  $conn = get_pg_connection();
  $result = pg_version($conn);
  echo "Koneksi OK. Versi server: " . htmlspecialchars($result['server']);
} catch (Throwable $e) {
  echo "Koneksi gagal: " . $e->getMessage();
}
?>

