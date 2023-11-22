<?php
// Koneksi ke database
include 'koneksi.php';


// Mulai sesi
session_start();

// Cek apakah pengguna sudah login
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newBeratBadan = $_POST['berat_badan'];
        $newTinggiBadan = $_POST['tinggi_badan'];
        $BMI = $newBeratBadan / (($newTinggiBadan / 100) * ($newTinggiBadan / 100));

        $sqlJK = "SELECT jenis_kelamin FROM tb_datauser WHERE user_id = $userId";
        $resultJK = $conn->query($sqlJK);
        $rowJK = $resultJK->fetch_assoc();
        $jeniskelamin = $rowJK['jenis_kelamin'];
        $jenis_kelamin_pertama = substr($jeniskelamin, 0, 1);
        $keteranganBMI = klasifikasi($BMI, $jenis_kelamin_pertama);
        
        $target_BMI = targetBMI($BMI, $jenis_kelamin_pertama, $newTinggiBadan, $newBeratBadan);
        // Check if user data exists
        $check_query = "SELECT * FROM tb_datauser WHERE user_id = $userId";
        $result = $conn->query($check_query);

        if ($result->num_rows > 0) {
            // User data exists, perform UPDATE
            $updateDataUser = "UPDATE tb_datauser SET berat_badan = $newBeratBadan, tinggi_badan = $newTinggiBadan, BMI = $BMI, keterangan_bmi = '$keteranganBMI', target_BMI = $target_BMI WHERE user_id = $userId";
        } else {
            // User data doesn't exist, perform INSERT
            $updateDataUser = "INSERT INTO tb_datauser (user_id, berat_badan, tinggi_badan, BMI, keterangan_bmi, target_BMI) VALUES ($userId, $newBeratBadan, $newTinggiBadan, $BMI, '$keteranganBMI', $target_BMI)";
        }

        if ($conn->query($updateDataUser) === TRUE) {
            echo "Data berhasil diupdate atau disimpan.";
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            echo "Error: " . $updateDataUser . "<br>" . $conn->error;
        }
    }

    // Mendapatkan informasi pengguna dari database
    $sqlUser = "SELECT username FROM tb_user WHERE id = $userId";
    $resultUser = $conn->query($sqlUser);

    if ($resultUser->num_rows > 0) {
        $rowUser = $resultUser->fetch_assoc();
        $username = $rowUser["username"];
    } else {
        $username = "Username tidak ditemukan";
    }

    // Mendapatkan nilai dataUser dari database
    $sqldatauser = "SELECT BMI, keterangan_bmi, nama_lengkap, nomor_telepon, umur, berat_badan, tinggi_badan, target_berat_badan, target_BMI FROM tb_datauser WHERE user_id = $userId";
    $resultdatauser= $conn->query($sqldatauser);

    if ($resultdatauser->num_rows > 0) {
        $rowdatauser = $resultdatauser->fetch_assoc();
        $BMI = number_format($rowdatauser["BMI"], 1); // Display only one digit after the decimal point
        $nama_lengkap = $rowdatauser["nama_lengkap"];
        $nomor_telepon = $rowdatauser["nomor_telepon"];
        $Umur = $rowdatauser["umur"];
        $BeratBadan = number_format($rowdatauser["berat_badan"], 0); // Display only one digit after the decimal point
        $TinggiBadan = number_format($rowdatauser["tinggi_badan"], 0); // Display only one digit after the decimal point
        $KeteranganBMI = $rowdatauser["keterangan_bmi"];
        $TargetBMI = number_format($rowdatauser["target_BMI"], 0); // Display only one digit after the decimal point
    } else {
        $BMI = "0.0";
        $nama_lengkap = "";
        $nomor_telepon = "-";
        $Umur = "-";
        $BeratBadan = "0.0";
        $TinggiBadan = "0.0";
        $KeteranganBMI = "-";
        $TargetBMI = "0.0";
    }
} else {
    // Jika pengguna belum login, lakukan tindakan sesuai kebutuhan
    $username = "Guest";
    $BMI = "Silakan login untuk melihat BMI";
}
function klasifikasi($hasil, $jeniskelamin) {

    switch ($jeniskelamin) {
        case 'L':
            if ($hasil <= 17) {
                return "Kurus";
            } else if ($hasil > 17 && $hasil <= 23) {
                return "Normal";
            } else if ($hasil > 23 && $hasil <= 27) {
                return "Kegemukan";
            } else {
                return "Obesitas";
            }
        case 'P':
            if ($hasil <= 18) {
                return "Kurus";
            } else if ($hasil > 18 && $hasil <= 25) {
                return "Normal";
            } else if ($hasil > 25 && $hasil <= 27) {
                return "Kegemukan";
            } else {
                return "Obesitas";
            }
        default:
            return "-";
    }
}
function targetBMI($BMI, $jenis_kelamin, $tinggi_badan, $berat_badan) {

    switch ($jenis_kelamin) {
        case 'L':
            $targetMin = 18;
            $targetMax = 23;
            if ($BMI < $targetMin) {
                $hasil = $targetMin - $BMI;
                return ($hasil * ($tinggi_badan / 100) * ($tinggi_badan / 100)) + $berat_badan;
            } else if ($BMI >= $targetMin && $BMI <= $targetMax) {
                return 0;
            } else {
                $BMI = $BMI - $targetMax;
                return $berat_badan - ($BMI * ($tinggi_badan / 100) * ($tinggi_badan / 100));
            }
        case 'P':
            $targetMin = 19;
            $targetMax = 25;
            if ($BMI < $targetMin) {
                $hasil = $targetMin - $BMI;
                return ($hasil * ($tinggi_badan / 100) * ($tinggi_badan / 100)) + $berat_badan;
            } else if ($BMI >= $targetMin && $BMI <= $targetMax) {
                return 0;
            } else {
                $BMI = $BMI - $targetMax;   
                return $berat_badan - ($BMI * ($tinggi_badan / 100) * ($tinggi_badan / 100));
            }
        default:
            return 0;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navigasi.css">
    <link rel="stylesheet" href="overlayProfil.css">
    <link rel="stylesheet" href="updateBMIOverlay.css">
</head>
<body>
<header>
    <nav>
        <div class="container">
            <div class="menu">
                <img src="img/timbanganKg.png" alt="">
                <a href="index2.php" class="brand">DIETBUDDY</a>
                
            </div>
            <div class="menu-tiga-menu">
                <div class="menu-link">
                    <a href="index2.php" class="beranda">Beranda</a>
                </div>
                <div class="menu-link">
                    <a href="diarimakanan.html" class="diari">Diari Makanan</a>
                </div>
            </div>
            <div class="login" onclick="openOverlayProfil()"><?php echo $username; ?></div>
          </div>
      <div class="overlay">
          
          <div class="layar">  
              <div>  
                  <div class="container-all">  
                      <div class="navigasi">  
                          <div class="container-nav">  
                              <img src="img/Logo Profil.png" alt="logo profil" class="logo-profil">  
                              <h1 class="profil-h1">Profil</h1>  
                              <img src="img/Vector 5.png" alt="logo silang" class="logo-silang" onclick="closeOverlayProfil()">  
                            </div>  
                        </div>  
                    </div>  
                </div>  
                <div class="main">  
                    <section>  
                        <div class="container-profil">  
                            <div class="container-kelola-logo-nama">  
                                <div class="kelola" >  
                                    <p onclick="UbahProfil()">Kelola</p>  
                                </div>  
                                <div class="profil-lingkaran-nama">  
                                    <img src="img/profile-circle.png" alt="profil-circle" class="profil-circle">  
                                    <div class="nama-nomor">  
                                        <h1 class="nama"><?php echo strlen($nama_lengkap) > 15 ? substr($nama_lengkap, 0, 15) . '...' : $nama_lengkap; ?></h1>  
                                        <h3 class="nomor"><?php echo strlen($nomor_telepon) > 15 ? substr($nomor_telepon, 0, 15) . '...' : $nomor_telepon; ?></h3>  
                               </div>  
                            </div>  
                        </div>  
                        <div class="container-umur-bb-tb">  
                            <div class="logo-umur">  
                                <img src="img/sort.png" alt="sort logo" class="icon-sort">  
                                <h1 ><?php echo $Umur," Tahun"; ?></h1>  
                            </div>  
                            <div class="logo-bb">  
                                <img src="img/sort.png" alt="sort logo" class="icon-sort">  
                               <h1 ><?php echo $BeratBadan," Kg"; ?></h1>  
                           </div>  
                           <div class="logo-tb">  
                               <img src="img/sort.png" alt="sort logo" class="icon-sort">  
                               <h1 ><?php echo $TinggiBadan," Cm"; ?></h1>  
                            </div>  
                        </div>  
                    </div>  
                    <div class="container-bmi">  
                       <div class="container-kelola-logo-bmi">  
                        <div class="container-kelola">

                            <div class="kelola-bmi">  
                                <p onclick="openOverlayBMI()">Kelola</p>  
                            </div>  
                            <div class="logo-timbangan-nama">  
                                <img src="img/weight-scale.png" alt="weight-scale" class="weight-scale">  
                                <h1 class="bmi-isi">BMI</h1>  
                            </div>  
                        </div>
                            <div class="indeks-keterangan">  
                                <h1 class="indeks"><?php echo $BMI; ?></h1>  
                                <h2 class="keterangan"><?php echo $KeteranganBMI; ?></h2>  
                            </div>  
                            <div class="bb-sekarang-target">  
                                <div class="bb-doang">  
                                    <h3 class="bb-angka"><?php echo $BeratBadan," Kg"; ?></h3>  
                                    <h3 class="bb-skrg-trgt">NOW</h3>  
                                </div>  
                                <div class="bb-target">  
                                   <h3 class="bb-angka"><?php echo $TargetBMI," Kg"; ?></h3>  
                                   <h3 class="bb-skrg-trgt">TARGET</h3>  
                                </div>  
                            </div>  
                       </div>  
                   </div>  
                </section>  
            </div>  
        </div> 
    </div>
    
    <div class="overlay-containerBMI" id="overlay-Profil">

        <div class="BMI">
            
            <div class="kotakbesar"> 
                <div class="BMI-silang" onclick="closeOverlayBMI()"> 
                    <img src="img/LogoSilang.png" alt=""></div> 
                    <div class="form"> 
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="inputan1"> 
                                <label for="berat_badan">Berat Badan Terbaru</label> 
                                <div class="input12">
                                    <input type="text" name="berat_badan" id ="berat_badan" placeholder="Update BB" value="<?php echo $BeratBadan; ?>" required> 
                                        <p>Kg</p>  
                                </div>
                            </div>            
                            <div class="inputan2"> 
                                <label for="tinggi_badan">Tinggi Badan Terbaru</label> 
                                <div class="input12">
                                        <input type="text" name="tinggi_badan" id ="tinggi_badan" placeholder= "Update TB" value="<?php echo $TinggiBadan; ?>"required> 
                                        <p>Cm</p> 
                                </div> 
                            </div> 
                            <div class="button"> 
                                <input type="submit" value="OK"></input> 
                            </div>
                        </form> 
                </div> 
            </div>
        </div>
    </div>
</nav>
</header>
    
</body>
</html>