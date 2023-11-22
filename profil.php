<?php
session_start();

// Periksa apakah session username sudah ada
if (!isset($_SESSION['username'])) {
    // Jika tidak ada, arahkan ke halaman home tanpa user
    header("Location: index.html");
    exit();
}

// Mengambil data pengguna dari database jika sudah ada
include 'koneksi.php';
$userId = $_SESSION['user_id'];

$nama_lengkap = $tanggal_lahir = $jenis_kelamin = $nomor_telepon = $email = $berat_badan = $tinggi_badan = '';


$sqldatauser = "SELECT * FROM tb_datauser WHERE user_id = $userId";
$resultdatauser = $conn->query($sqldatauser);

if ($resultdatauser->num_rows > 0) {
    $rowdatauser = $resultdatauser->fetch_assoc();
    $nama_lengkap = $rowdatauser["nama_lengkap"];
    $tanggal_lahir = $rowdatauser["tanggal_lahir"];
    $jenis_kelamin = $rowdatauser["jenis_kelamin"];
    $nomor_telepon = $rowdatauser["nomor_telepon"];
    $email = $rowdatauser["email"];
    $berat_badan = $rowdatauser["berat_badan"];
    $tinggi_badan = $rowdatauser["tinggi_badan"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIETBUDDY</title>
    <link href="https://cdn.jsdelivr.net/npm/css-reset-and-normalize@2.3.6/css/reset-and-normalize.min.css" rel="stylesheet">
    <link rel="stylesheet" href="profil.css">
    <link rel="stylesheet" href="navigasi.css">
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <div class="menu">
                    <img src="img/timbanganKg.png" alt="">
                    <a href="index2.php" class="brand">DIETBUDDY</a>
                </div>
                <div class="login-login"><?php echo $_SESSION['username']; ?></div>
            </div>
        </nav>
    </header>
    <main>
        <div class="Isi">
            <div class="Isi-Judul">PROFIL</div>
            <div class="Form">
              <form action="dataprofil.php" method="post" id="profilForm" enctype="multipart/form-data">
                  <div class="InformasiUmum">
<!-- Informasi Umum -->
<div class="InformasiUmum">
    <div class="Informasi-Judul">
        <div>Informasi Umum</div>
    </div>
    <div class="Form-isi">
        <div class="Form-isi-judul">
            <label for="nama_lengkap">Nama Lengkap</label>
            <div class="Form-isi-isi">
                <input type="text" id="nama_lengkap" name="nama_lengkap" required placeholder="Masukkan Nama Lengkap.."  value="<?php echo $nama_lengkap; ?> " >
            </div>
        </div>
        <div class="Form-isi-judul">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <div class="Form-isi-isi">  
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" required value="<?php echo $tanggal_lahir; ?>">
            </div>
        </div>
        <div class="Form-isi-judul">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <div class="Form-isi-isi-radio">
                <div>
                    <input type="radio" name="jenis_kelamin" value="Laki-laki" checked <?php echo ($jenis_kelamin == 'Laki-laki') ? 'checked' : ''; ?>>
                    <label>Laki-laki</label>
                </div>
                <div>
                    <input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo ($jenis_kelamin == 'Perempuan') ? 'checked' : ''; ?>>
                    <label>Perempuan</label>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Informasi Kontak -->
<div class="InformasiKontak">
    <div class="Informasi-Judul">
        <div>Informasi Kontak</div>
    </div>
    <div class="Form-isi">
        <div class="Form-isi-judul">
            <label for="nomor_telepon">Nomor Telepon</label>
            <div class="Form-isi-isi">
                <input type="text" id="nomor_telepon" name="nomor_telepon" placeholder="Masukkan Nomor Telepon" required value="<?php echo $nomor_telepon; ?>">
            </div>
        </div>
        <div class="Form-isi-judul">
            <label for="email">Email</label>
            <div class="Form-isi-isi">
                <input type="email" id="email" name="email" placeholder="Masukkan Email" required value="<?php echo $email; ?>">
            </div>
        </div>
    </div>
</div>
<!-- Informasi Tambahan -->
<div class="InformasiTambahan">
    <div class="Informasi-Judul">
        <div>Informasi Tambahan</div>
    </div>
    <div class="Form-isi">
        <div class="Form-isi-judul">
            <label for="berat_badan">Berat Badan</label>
            <div class="Form-isi-isi">
                <input type="text" id="berat_badan" name="berat_badan" required placeholder="<?php echo empty($berat_badan) ? 'Masukkan Berat Badan' : $berat_badan; ?>" value="<?php echo $berat_badan; ?>">
            </div>
        </div>
        <div class="Form-isi-judul">
            <label for="tinggi_badan">Tinggi Badan</label>
            <div class="Form-isi-isi">
                <input type="text" id="tinggi_badan" name="tinggi_badan" required placeholder="<?php echo empty($tinggi_badan) ? 'Masukkan Tinggi Badan' : $tinggi_badan; ?>" value="<?php echo $tinggi_badan; ?>">
            </div>
        </div>
    </div>
</div>

                  <div class="Button">
                    <input type="submit" value="Simpan Perubahan">
                  </div>
              </form>
            </div>
          </div>
    </main>
    <footer>
    </footer>
</body>
</html>
