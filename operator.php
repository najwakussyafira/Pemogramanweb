<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali   = $a * $b;
$hasilBagi   = $a / $b;
$sisaBagi    = $a % $b;
$pangkat     = $a ** $b;

echo "Hasil Penjumlahan: $a + $b = $hasilTambah <br>";
echo "Hasil Pengurangan: $a - $b = $hasilKurang <br>";
echo "Hasil Perkalian: $a * $b = $hasilKali <br>";
echo "Hasil Pembagian: $a / $b = $hasilBagi <br>";
echo "Sisa Bagi: $a % $b = $sisaBagi <br>";
echo "Pangkat: $a ** $b = $pangkat <br>";

$hasilSama           = $a == $b;
$hasilTidakSama      = $a != $b;
$hasilLebihKecil     = $a < $b;
$hasilLebihBesar     = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "<h3>Operator Perbandingan</h3>";
echo "$a == $b : " . ($hasilSama ? 'true' : 'false') . "<br>";
echo "$a != $b : " . ($hasilTidakSama ? 'true' : 'false') . "<br>";
echo "$a < $b  : " . ($hasilLebihKecil ? 'true' : 'false') . "<br>";
echo "$a > $b  : " . ($hasilLebihBesar ? 'true' : 'false') . "<br>";
echo "$a <= $b : " . ($hasilLebihKecilSama ? 'true' : 'false') . "<br>";
echo "$a >= $b : " . ($hasilLebihBesarSama ? 'true' : 'false') . "<br>";

$hasilAnd  = ($a && $b);   // true jika keduanya true
$hasilOr   = ($a || $b);   // true jika salah satu true
$hasilNotA = (!$a);        // negasi dari a
$hasilNotB = (!$b);        // negasi dari b

echo "<h3>Operator Logika</h3>";
echo "$a && $b : " . ($hasilAnd ? 'true' : 'false') . "<br>";
echo "$a || $b : " . ($hasilOr ? 'true' : 'false') . "<br>";
echo "!$a      : " . ($hasilNotA ? 'true' : 'false') . "<br>";
echo "!$b      : " . ($hasilNotB ? 'true' : 'false') . "<br>";

echo "<h3>Operator Penugasan</h3>";
echo "Nilai awal: a = $a, b = $b <br>";

$a += $b;  echo "\$a += \$b  → a = $a <br>";
$a -= $b;  echo "\$a -= \$b  → a = $a <br>";
$a *= $b;  echo "\$a *= \$b  → a = $a <br>";
$a /= $b;  echo "\$a /= \$b  → a = $a <br>";
$a %= $b;  echo "\$a %= \$b  → a = $a <br>";

$hasilIdentik      = ($a === $b);
$hasilTidakIdentik = ($a !== $b);

echo "<h3>Operator Identik</h3>";
echo "a (int) = $a, b (int) = $b <br>";
echo "\$a === \$b : " . ($hasilIdentik ? 'true' : 'false') . "<br>";
echo "\$a !== \$b : " . ($hasilTidakIdentik ? 'true' : 'false') . "<br>";

// Contoh tambahan: nilai sama tapi tipe beda
$c = "10"; // string
echo "a (int) = $a, c (string) = \"$c\" <br>";
echo "\$a ==  \$c : " . (($a == $c) ? 'true' : 'false') . " (sama nilai) <br>";
echo "\$a === \$c : " . (($a === $c) ? 'true' : 'false') . " (beda tipe) <br>";

echo "<h3>Persentase Kursi Kosong</h3>";

$totalKursi   = 45;
$kursiTerisi  = 28;

$kursiKosong  = $totalKursi - $kursiTerisi;
$persenKosong = ($kursiKosong / $totalKursi) * 100;

echo "Total kursi   : $totalKursi <br>";
echo "Kursi terisi  : $kursiTerisi <br>";
echo "Kursi kosong  : $kursiKosong <br>";
echo "Persentase kosong : " . number_format($persenKosong, 2) . "%<br>";
?>