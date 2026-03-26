<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal | Jastip Paketku</title>
  <link rel="stylesheet" href="../css/style.css">

  <style>
  
  </style>
</head>

<body>

<!-- LOGIN AREA -->
<div class="wrapper">
  <form action="../controller/registerController.php" method="POST" class="login-container">
    <h2>Daftar Akunmu Yuk!</h2>


    <div class="input-group"><input type="text" name="username" placeholder="Username" required></div>
    <div class="input-group"><input type="password" name="password" placeholder="Password" required></div>

    <button type="submit">daftar</button>
  </form>

  <div class="image-box">
    <img src="../css/chibi.png" alt="Ilustrasi Login">
  </div>
</div>

<!-- HERO 1 -->
<div class="hero">
  <img src="../css/box.png" alt="">
  <h2>Hallo Selamat Datang</h2>
  <p>Tempat paling simple buat nitip belanjaan apa aja. Cukup klik, titip, santai, biar kami yang urus sisanya!. 
    Layanan penitipan barang yang aman, cepat, dan terjangkau. 
    Titipkan kebutuhanmu, kami antarkan dengan penuh perhatian.</p>
</div>

<!-- HERO 2 -->
<div class="hero">
  <img src="../css/box.png" alt="">
  <h2>Siapa Kami?</h2>
  <p>Jastip Paketku adalah layanan jasa titip terpercaya di area Flores, NTT. 
    Kami melayani pengantaran dan penitipan barang untuk wilayah Ende, Mbay, Bajawa, hingga Maumere. 
    Dengan proses yang mudah dan cepat, kami siap membantu kebutuhan belanja dan pengirimanmu kapan saja.</p> </div></p>
</div>

<!-- HERO 3 -->
<div class="hero">
  <img src="../css/box.png" alt="">
  <h2>Alamat & Kontak</h2>
  <p>Flores, Nusa Tenggara Timur Layanan meliputi Ende, Mbay, Bajawa, dan Maumere.</p>
</div>

<!-- === CONTACT + ADUAN FORM === -->
<div class="contact-section">

  <!-- MAP -->
  <iframe
    src="https://www.google.com/maps/embed?pb=!1m18..."
    loading="lazy"></iframe>

  <!-- FORM ADUAN -->
  <form class="aduan-form">
    <h2>Kirim Aduan / Pesan</h2>

    <div class="input-group">
      <label>Nama</label>
      <input type="text" placeholder="Nama kamu" required>
    </div>

    <div class="input-group">
      <label>Nomor Telepon</label>
      <input type="number" placeholder="Nomor WhatsApp" required>
    </div>

    <div class="input-group">
      <label>Aduan / Pesan</label>
      <input type="text" placeholder="Tulis pesan kamu" required>
    </div>

    <button type="submit">Kirim</button>
  </form>

</div>

</body>
</html>
