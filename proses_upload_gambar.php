<?php
$targetDirectory = "documents/";
if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

$allowed = array('jpg','jpeg','png','gif');

if ($_FILES['files']['name'][0]) {
    $totalFiles = count($_FILES['files']['name']);

    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = $_FILES['files']['name'][$i];
        $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (in_array($ext, $allowed)) {
            $targetFile = $targetDirectory . $fileName;
            if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $targetFile)) {
                echo "File $fileName berhasil diunggah.<br>";
            } else {
                echo "Gagal mengunggah file $fileName.<br>";
            }
        } else {
            echo "File $fileName ditolak (bukan gambar).<br>";
        }
    }
} else {
    echo "Tidak ada file yang diunggah.";
}
?>
