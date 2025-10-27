<?php
$conn = mysqli_connect("localhost", "root", "", "prakwebdb");

$sql = "CREATE TABLE user (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
)";
if (mysqli_query($conn, $sql)) {
    echo "Tabel user berhasil dibuat.";
} else {
    echo "Error membuat tabel: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
