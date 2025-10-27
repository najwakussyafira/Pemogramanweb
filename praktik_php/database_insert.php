<?php
$conn = mysqli_connect("localhost", "root", "", "prakwebdb");

$sql = "INSERT INTO user (id, username, password)
        VALUES (1, 'admin', MD5('123'))";

if (mysqli_query($conn, $sql)) {
    echo "Data berhasil dimasukkan ke tabel user.";
} else {
    echo "Error memasukkan data: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
