<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST['input'] ?? '';
    $safe = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    $email = $_POST['email'] ?? '';

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailMsg = "Email valid: " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    } else {
        $emailMsg = "Email tidak valid!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Input Aman</title>
</head>
<body>
  <h3>Demo Input Aman (Langkah 1–6)</h3>

  <form method="post" action="">
    <label>Input (boleh HTML/script):</label><br>
    <textarea name="input" rows="4" cols="50" placeholder="Coba &lt;b&gt;bold&lt;/b&gt; atau &lt;script&gt;alert(1)&lt;/script&gt;"></textarea><br><br>

    <label>Email:</label><br>
    <input type="text" name="email" placeholder="nama@domain.com"><br><br>

    <button type="submit">Kirim</button>
  </form>

  <?php if (isset($safe)): ?>
    <hr>
    <p><strong>Output aman:</strong> <?php echo $safe; ?></p>
    <p><?php echo $emailMsg; ?></p>
  <?php endif; ?>
</body>
</html>


