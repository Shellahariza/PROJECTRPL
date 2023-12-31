<?php
?>

<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>DIETBUDDY</title>
      <link href="
      https://cdn.jsdelivr.net/npm/css-reset-and-normalize@2.3.6/css/reset-and-normalize.min.css
      " rel="stylesheet"
      >
      <link rel="shortcut icon" href="img/FaviconKaki.png" type="image/x-icon"> 
      <link rel="stylesheet" href="diarimakanan.css">
      <script src="scriptOverlay.js"></script>
  </head>
  <body>
    <script src="navigasi.js"></script>
    <main>
    <section class="kotakkiri">
        <div class="kotakkiri-sisakalori">
          <div class="sisakalori-isi">...</div>
          <div class="sisakalori-Judul">Sisa Kalori</div>
        </div>
        <div class="kotakkiri-kaloridikonsumsi">
          <div class="kaloridikonsumsi-isi">...</div>
          <div class="kaloridikonsumsi-judul">Kalori dikomsumsi</div>
        </div>

        <div class="kotakkiri-riwayatmakanan">
          <div class="riwayatmakanan-judul">
            <div class="riwayatmakanan-logo">
              <img src="img/LogoRiwayatMakanan.png" alt="">
              <div>Riwayat Makanan</div>
            </div>
            <div class="riwayatmakanan-tanggal">dd/mm/yy</div>
          </div>
          <div class="riwayatmakanan-isi">
            <div class="riwayatmakanan-pagi">
              <div class="riwayatmakanan-pagi-judul">Pagi</div>
              <div class="riwayatmakanan-pagi-isi">
                <div class="riwayatmakanan-pagi-isi-isi">-</div>
                <div class="riwayatmakanan-pagi-isi-isi">-</div>
                <div class="riwayatmakanan-pagi-isi-isi">-</div>
              </div>
            </div>
            <div class="riwayatmakanan-siang">
              <div class="riwayatmakanan-siang-judul">Siang</div>
              <div class="riwayatmakanan-siang-isi">
                <div class="riwayatmakanan-siang-isi-isi">-</div>
                <div class="riwayatmakanan-siang-isi-isi">-</div>
                <div class="riwayatmakanan-siang-isi-isi">-</div>
              </div>
            </div>
            <div class="riwayatmakanan-malam">
              <div class="riwayatmakanan-malam-judul">Malam</div>
              <div class="riwayatmakanan-malam-isi">
                <div class="riwayatmakanan-malam-isi-isi">-</div>
                <div class="riwayatmakanan-malam-isi-isi">-</div>
                <div class="riwayatmakanan-malam-isi-isi">-</div>
              </div>
            </div >
          </div>
        </div>
      </section>
      <section class="kotakkanan">
        <div class="kotakkanan-child">
          <div>
            <img src="img/LogoPagi.png" alt="">
            <div>Sarapan Pagi</div>
          </div>
          <div class="logoplus-makan-pagi">
            <img src="img/LogoTambah.png" alt=""  onclick="tambahPagi()">
          </div>
        </div>
        <div class="kotakkanan-child">
          <div>
            <img src="img/LogoSiang.png" alt="">
            <div>Makan Siang</div>
          </div>
          <div class="logoplus-makan-siang">
            <img src="img/LogoTambah.png" alt=""  onclick="tambahSiang()">
          </div>
        </div>
        <div class="kotakkanan-child">
          <div>
            <img src="img/LogoMalam.png" alt="">
            <div>Makan Malam</div>
          </div>
          <div class="logoplus-makan-malam">
            <img src="img/LogoTambah.png" alt=""  onclick="tambahMalam()">
          </div>
        </div>
        <div class="kotakkanan-child"> 
          <div>
            <img src="img/LogoCamilan.png" alt="">
            <div>Camilan</div>
          </div>
          <div class="logoplus-makan-camilan">
            <img src="img/LogoTambah.png" alt=""  onclick="tambahCamilan()">
          </div>
        </div>
      </section>
    </main>

    </body>
  </body>
  </html>