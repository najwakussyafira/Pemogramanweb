<?php
$nilaiNumerik = 92;

if ($nilaiNumerik >= 90 && $nilaiNumerik <= 100) {
	echo "Nilai huruf: A";
} elseif ($nilaiNumerik >= 80 && $nilaiNumerik < 90) {
	echo "Nilai huruf: B";
} elseif ($nilaiNumerik >= 70 && $nilaiNumerik < 80) {
	echo "Nilai huruf: C";
} elseif ($nilaiNumerik < 70) {
	echo "Nilai huruf: D";
}
echo "<hr><h3>While – Atlet capai target jarak</h3>";
$jarakSaatIni      = 0;    
$jarakTarget       = 500;  
$peningkatanHarian = 30;   
$hari              = 0;

while ($jarakSaatIni < $jarakTarget) {
    $jarakSaatIni += $peningkatanHarian;
    $hari++;
}
echo "Atlet tersebut memerlukan $hari hari untuk mencapai jarak 500 kilmeter.<br>";
echo "Total jarak tercapai: {$jarakSaatIni} km"; 

echo "<hr><h3>For – Hitung jumlah buah panen</h3>";
$jumlahLahan      = 10;
$tanamanPerLahan  = 5;
$buahPerTanaman   = 10;
$jumlahBuah       = 0;

for ($i = 1; $i <= $jumlahLahan; $i++) {
    $jumlahBuah += ($tanamanPerLahan * $buahPerTanaman);
}

echo "Jumlah buah yang akan dipanen adalah: $jumlahBuah";

echo "<hr><h3>Langkah Foreach – Total skor ujian</h3>";
$skorUjian = [85, 92, 78, 96, 88];
$totalSkor = 0;

foreach ($skorUjian as $skor) {
    $totalSkor += $skor;
}

echo "Total skor ujian adalah: $totalSkor";

echo "<hr><h3>Foreach + continue – Kelulusan</h3>";

$nilaiSiswa = [85, 92, 58, 64, 90, 55, 88, 79, 70, 96];

foreach ($nilaiSiswa as $nilai) {
    if ($nilai < 60) {
        echo "Nilai: $nilai (Tidak lulus) <br>";
        continue; 
    }
    echo "Nilai: $nilai (Lulus) <br>";
}
echo "<hr><h3>Langkah 22 (Soal 4.6)</h3>";

$nilai = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];

sort($nilai);
$buangTerendah  = array_slice($nilai, 0, 2);
$buangTertinggi = array_slice($nilai, -2);

array_shift($nilai); 
array_shift($nilai); 
array_pop($nilai);   
array_pop($nilai);   

$total = array_sum($nilai);
$rata  = $total / count($nilai);

echo "Dibuang terendah: [" . implode(", ", $buangTerendah) . "]<br>";
echo "Dibuang tertinggi: [" . implode(", ", $buangTertinggi) . "]<br>";
echo "Nilai dihitung: [" . implode(", ", $nilai) . "]<br>";
echo "Total: $total<br>";
echo "Rata-rata: " . number_format($rata, 2) . "<br>";

echo "<hr><h3>Langkah 24 (Soal 4.7)</h3>";

$harga = 120000;
$diskon = ($harga > 100000) ? 0.20 * $harga : 0;
$bayar  = $harga - $diskon;

echo "Harga awal: Rp " . number_format($harga, 0, ',', '.') . "<br>";
echo "Diskon: Rp " . number_format($diskon, 0, ',', '.') . "<br>";
echo "Harga bayar: Rp " . number_format($bayar, 0, ',', '.') . "<br>";

echo "<hr><h3>Langkah 26 (Soal 4.8)</h3>";

$poin = [120, 80, 90, 150, 70];

$totalSkor = array_sum($poin);
$hadiah = ($totalSkor > 500) ? "YA" : "TIDAK";

echo "Total skor pemain adalah: $totalSkor<br>";
echo "Apakah pemain mendapatkan hadiah tambahan? ($hadiah)<br>";
?>


