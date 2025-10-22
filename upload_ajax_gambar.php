<?php
if (isset($_FILES['file'])) {
    $extensions = array("jpg", "jpeg", "png", "gif");
    $totalFiles = count($_FILES['file']['name']);

    for ($i = 0; $i < $totalFiles; $i++) {
        $file_name = $_FILES['file']['name'][$i];
        $file_size = $_FILES['file']['size'][$i];
        $file_tmp  = $_FILES['file']['tmp_name'][$i];
        $file_ext  = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (!in_array($file_ext, $extensions)) {
            echo "File $file_name ditolak (bukan gambar).<br>";
        } elseif ($file_size > 2097152) {
            echo "File $file_name melebihi 2 MB.<br>";
        } else {
            move_uploaded_file($file_tmp, "documents/" . $file_name);
            echo "File $file_name berhasil diunggah.<br>";
        }
    }
}
?>
