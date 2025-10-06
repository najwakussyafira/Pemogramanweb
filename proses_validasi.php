<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama     = $_POST["nama"]     ?? "";
  $email    = $_POST["email"]    ?? "";
  $password = $_POST["password"] ?? "";
  $errors   = [];

  if ($nama === "")  $errors[] = "Nama harus diisi.";
  if ($email === "") $errors[] = "Email harus diisi.";
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Format email tidak valid.";
  if (strlen($password) < 8) $errors[] = "Password minimal 8 karakter.";

  if ($errors) {
    foreach ($errors as $e) echo $e . "<br>";
  } else {
    echo "Data valid. Nama = $nama, Email = $email";
  }
}
