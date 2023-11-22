<?php
// Koneksi ke database
include 'koneksi.php';

// Mulai sesi
session_start();

// Cek apakah pengguna sudah login
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    // Mendapatkan nilai dataUser dari database
    $sqldatauser = "SELECT BMI FROM tb_datauser WHERE user_id = $userId";
    $resultdatauser= $conn->query($sqldatauser);

    if ($resultdatauser->num_rows > 0) {
        $rowdatauser = $resultdatauser->fetch_assoc();
        $BMI = number_format($rowdatauser["BMI"], 1); // Display only one digit after the decimal point
    } else {
        $BMI = "0";
    }
} else {
    // Jika pengguna belum login, lakukan tindakan sesuai kebutuhan
    $username = "Guest";
    $BMI = "0";
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
    <script src="scriptOverlay.js"></script>
</head>
<body>
<script src="navigasi.js"></script>
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
          <div class="isi"><?php echo $BMI; ?></div>
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