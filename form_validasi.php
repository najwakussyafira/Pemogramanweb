<!-- … bagian head sama seperti langkah 9 … -->
<body>
  <h1>Form Input dengan Validasi</h1>
  <form id="myForm">
    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama">
    <span id="nama-error" style="color: red;"></span><br>

    <label for="email">Email:</label>
    <input type="text" id="email" name="email">
    <span id="email-error" style="color: red;"></span><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <span id="password-error" style="color: red;"></span><br>

    <input type="submit" value="Submit">
  </form>

  <div id="hasil" style="margin-top:10px;"></div>

  <script>
    $(function () {
      $("#myForm").on("submit", function (e) {
        e.preventDefault();

        var ok = true;
        var pwd = $("#password").val();

        if ($("#nama").val() === "") { $("#nama-error").text("Nama harus diisi."); ok = false; } else { $("#nama-error").text(""); }
        if ($("#email").val() === "") { $("#email-error").text("Email harus diisi."); ok = false; } else { $("#email-error").text(""); }
        if (pwd.length < 8) { $("#password-error").text("Password minimal 8 karakter."); ok = false; } else { $("#password-error").text(""); }

        if (!ok) return;

        $.ajax({
          url: "/dasarWeb/proses_validasi.php",
          type: "POST",
          data: $(this).serialize(),
          success: function (res) { $("#hasil").html(res); }
        });
      });
    });
  </script>
</body>
</html>


