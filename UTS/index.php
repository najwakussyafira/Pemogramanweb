<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SKY STORE | APK Premium</title>
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to bottom, #ffe6f1, #fff5f9);
      color: #333;
    }

    header {
      background: linear-gradient(to right, #ff80b5, #ffb3cf);
      color: white;
      text-align: center;
      padding: 25px 10px;
      position: relative;
      box-shadow: 0 4px 10px rgba(255, 128, 181, 0.3);
    }

    header h1 {
      font-size: 2.3em;
      margin: 0;
    }

    header p {
      margin: 5px 0 0;
      font-size: 1em;
    }

    .pin-icon {
      position: absolute;
      right: 20px;
      top: 20px;
      font-size: 28px;
    }

    .container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
      gap: 20px;
      padding: 30px;
    }

    .product {
      background: white;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(255, 128, 181, 0.2);
      overflow: hidden;
      text-align: center;
      transition: transform 0.2s;
    }

    .product:hover {
      transform: scale(1.03);
    }

    .product img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      background-color: #ffeaf3;
    }

    .product h3 {
      margin: 15px 0 5px;
      color: #e75480;
    }

    .product p {
      padding: 0 15px 10px;
      color: #555;
      font-size: 14px;
    }

    .btn {
      display: inline-block;
      background-color: #ff80b5;
      color: white;
      padding: 10px 20px;
      margin-bottom: 15px;
      border-radius: 8px;
      text-decoration: none;
      transition: background-color 0.3s;
    }

    .btn:hover {
      background-color: #e75480;
    }

    footer {
      text-align: center;
      background: linear-gradient(to right, #ff80b5, #ffb3cf);
      color: white;
      padding: 15px 0;
      margin-top: 40px;
      position: relative;
    }

    .cloud {
      position: absolute;
      top: -40px;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      opacity: 0.9;
    }
  </style>
</head>
<body>
  <header>
    <span class="pin-icon">📍</span>
    <h1>☁️ SKY STORE ☁️</h1>
    <p>Tempat beli APK Premium Murah Bikin Happy</p>
  </header>

  <div class="container">
    <div class="product">
      <img src="img/Spotify.png" alt="Spotify Premium">
      <h3>Spotify Premium</h3>
      <p>Nikmati musik tanpa batas, tanpa iklan, dan download offline!</p>
      <form action="checkout.html" method="get">
        <input type="hidden" name="produk" value="Spotify Premium">
        <button type="submit" class="btn">Beli Sekarang</button>
      </form>
    </div>

    <div class="product">
      <img src="img/netflix.jpg" alt="Netflix Premium">
      <h3>Netflix Premium</h3>
      <p>Tonton film & serial favoritmu kualitas HD tanpa batas!</p>
      <form action="checkout.html" method="get">
        <input type="hidden" name="produk" value="Netflix Premium">
        <button type="submit" class="btn">Beli Sekarang</button>
      </form>
    </div>

    <div class="product">
      <img src="img/canva.png" alt="Canva Pro">
      <h3>Canva Pro</h3>
      <p>Desain profesional dengan fitur lengkap Canva Pro.</p>
      <form action="checkout.html" method="get">
        <input type="hidden" name="produk" value="Canva Pro">
        <button type="submit" class="btn">Beli Sekarang</button>
      </form>
    </div>

    <div class="product">
     <img src="img/capcut.png" alt="CapCut Premium">
      <h3>CapCut Premium</h3>
      <p>Edit video tanpa watermark dengan fitur eksklusif!</p>
      <form action="checkout.html" method="get">
        <input type="hidden" name="produk" value="CapCut Premium">
        <button type="submit" class="btn">Beli Sekarang</button>
      </form>
    </div>
  </div>

  <footer>
    <img src="https://cdn-icons-png.flaticon.com/512/414/414927.png" alt="Cloud" class="cloud">
    <p>© 2025 SKY STORE | Premium Apps in the Cloud</p>
  </footer>
</body>
</html>
