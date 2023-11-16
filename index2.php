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
    <script src="scriptOverlayProfil.js"></script>
</head>
<body>
  <header>
    <nav>
      <div class="container">
       <div class="menu">
        <a href="#" class="brand">DIETBUDDY</a>
        <div class="menu-tiga-menu">
          <div class="menu-link">
            <a href="#" class="beranda">Beranda</a>
          </div>
          <div class="menu-link">
            <a href="artikel.html" class="artikel">Artikel</a>
          </div>
          <div class="menu-link">
            <a href="diarimakanan.html" class="diari">Diari Makanan</a>
          </div>
        </div>
        </div>
        <a href="profil.php" class="login"><?php echo $_SESSION['username']; ?></a>
      </div>
    </nav>  
  </header>
  <div class="overlay">

<div class="layar">
    <div>
        <div class="container-all">
            <div class="navigasi">
                <div class="container-nav">
                    <img src="img/Logo Profil.png" alt="logo profil" class="logo-profil">
                    <h1 class="profil-h1">Profil</h1>
                    <img src="img/Vector 5.png" alt="logo silang" class="logo-silang">
                  </div>
              </div>
          </div>  
      </div>
      <div class="main">
          <section>
              <div class="container-profil">
                  <div class="container-kelola-logo-nama">
                      <div class="kelola">
                          <p>Kelola</p>
                      </div>
                      <div class="profil-lingkaran-nama">
                          <img src="img/profile-circle.png" alt="profil-circle" class="profil-circle">
                          <div class="nama-nomor">
              <h1 class="nama">....</h1>
              <h3 class="nomor">+62.....</h3>
        </div>  
      </div>
    </div>
    <div class="container-umur-bb-tb">
      <div class="logo-umur">
          <img src="img/sort.png" alt="sort logo" class="icon-sort">
          <h1 class="h1-umur">... Tahun</h1>
      </div>
      <div class="logo-bb">
          <img src="img/sort.png" alt="sort logo" class="icon-sort">
          <h1 class="h1-umur">... Kg</h1>
      </div>
      <div class="logo-tb">
          <img src="img/sort.png" alt="sort logo" class="icon-sort">
          <h1 class="h1-umur">... Cm</h1>
      </div>
  </div>
</div>
    <div class="container-bmi">
        <div class="container-kelola-logo-bmi">
            <div class="kelola-bmi">
                <p>Kelola</p>
              </div>
              <div class="logo-timbangan-nama">
            <img src="img/weight-scale.png" alt="weight-scale" class="weight-scale">
            <h1 class="bmi">BMI</h1>
          </div>
          <div class="indeks-keterangan">
              <h1 class="indeks">..</h1>
              <h2 class="keterangan">...</h2>
          </div>
          <div class="bb-sekarang-target">
              <div class="bb-doang">
                  <h3 class="bb-angka">..Kg</h3>
                  <h3 class="bb-skrg-trgt">NOW</h3>
              </div>
              <div class="bb-target">
                  <h3 class="bb-angka">..Kg</h3>
                  <h3 class="bb-skrg-trgt">TARGET</h3>
              </div>
          </div>
      </div>
  </div>
</section>
</div>
</div>
</div>
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