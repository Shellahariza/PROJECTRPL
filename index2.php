<?php
session_start();

// Periksa apakah session username sudah ada
if (!isset($_SESSION['username'])) {
    // Jika tidak ada, arahkan ke halaman home tanpa user
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIETBUDDY</title>
    <link href="
    https://cdn.jsdelivr.net/npm/css-reset-and-normalize@2.3.6/css/reset-and-normalize.min.css
    " rel="stylesheet"
    > 
    <link rel="stylesheet" href="index2.css">
    <link rel="stylesheet" href="navigasi.css">
    <link rel="stylesheet" href="overlayProfil.css">
    <link rel="stylesheet" href="updateBMIOverlay.css">
    <script src="scriptOverlay.js"></script>
</head>
<body>
  <header>
  <nav>
      <div class="container">
       <div class="menu">
       <img src="img/timbanganKg.png" alt="">
        <a href="index2.html" class="brand">DIETBUDDY</a>
        
        </div>
        <div class="menu-tiga-menu">
          <div class="menu-link">
            <a href="index2.html" class="beranda">Beranda</a>
          </div>
          <div class="menu-link">
            <a href="diarimakanan.html" class="diari">Diari Makanan</a>
          </div>
        </div>
        <div class="login" onclick="openOverlayProfil()">LOGIN</div>
      </div>
    </nav>
  </header>
  <div class="overlay-Profil" id="overlay-Profil"></div>
  <main>
    <section class="sec1">
      
      <div class="sobatdietmu">
        <div class="sobatdietmu-judul">Sobat Dietmu</div>
        <p>Teman setia untuk diet journeymu! Kamu bisa kontrol kalori harian, catat asupan makananmu dengan meals diary, dan konsultasi dengan ahli gizi terbaik.
        </p>
      </div>
      <div class="totalkalori">
        <div class="totalkalori-judul">Total Kalori Harian :  </div>
        <div class="isi">... Kalori</div>
      </div>
    </section>
    <section class="sec2">
        <div class="sec2-child">
          <div class="bmi-judul">BMI</div>
          <div class="isi">...</div>
        </div>
        <div class="sec2-child">
          <div class="kalorimaksperday-judul">Kalori Maks/hari</div>
          <div class="isi">...</div>
        </div>
        <div class="sec2-child">
          <div class="asupankalori-judul">Asupan Kalori Sebelumnya</div>
          <div class="isi">...</div>
        </div>
    </section>
  </main>

  </body>
</body>
</html>