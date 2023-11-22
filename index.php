<?php
session_start();

// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "db_rpl";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memproses formulir login saat dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Melakukan query ke database untuk memeriksa kecocokan username dan password
    $query = "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Login berhasil
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id']; // Simpan user_id ke dalam session
        $_SESSION['username'] = $username; // Simpan username ke dalam session
        header("Location: index2.php");
        exit();
    } else {
        // Login gagal
        $_SESSION['login_error'] = "Username atau password salah";
        header("Location: index.php");
        exit();
    }
}

// Menutup koneksi database
$conn->close();
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
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="navigasi.css">
    <link rel="stylesheet" href="login.css">
    <script src="scriptlogin.js"></script>
</head>
<body>
  
  <header>
    <nav>
      <div class="container">
       <div class="menu">
        <img src="img/timbanganKg.png" alt="">
        <a href="" class="brand">DIETBUDDY</a>
        
        </div>
        <div class="menu-tiga-menu">
          <div class="menu-link">
            <a href="" class="beranda">Beranda</a>
          </div>
          <div class="menu-link">
            <div  class="diari">Diari Makanan</div>
          </div>
        </div>
        <div class="login" onclick="openOverlayProfil()">LOGIN</div>
      </div>
    </nav> 
  </header>
  </div>
  <div class="overlay">
    <div class="kotakbesar">
      <div class="silang">
        <img src="img/LogoSilang.png" alt="">
      </div>
        <div class="sec1">
            <p>LOGIN</p>
        </div>
        <div class="form">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="inputan1">
                    <div class="icon-user-wrapper"> 
                        <img src="img/LogoUserLogin.png" alt="">
                    </div>
                    <div>
                      <input type="text" name="username" placeholder="Username" required>
                    </div>
                </div>           
                <div class="inputan2">
                    <div class="icon-user-wrapper"> 
                        <img src="img/LogoPasswordLogin.png" alt="">
                    </div>
                    <div>
                      <input type="password" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="sec2">
          <a href="registrasi.php">Buat akun</a>
          <a href="">Lupa kata sandi?</a>
          <div>
              <input type="submit" value="Login">
          </div>
            </form>
        </div>
        
      </div>
      
    </div>
  </div>
  <main>
    <div class="sobatdietmu-image">
      <div class="sobatdietmu">
        <div class="sobatdietmu-judul">Sobat Dietmu</div>
        <p class="sobatdietmu-p">Teman setia untuk diet journeymu! Kamu bisa kontrol kalori harian, catat asupan makananmu dengan meals diary, dan konsultasi dengan ahli gizi terbaik.
        </p>
      </div>
    </div>
    
  </main>
  
</body>
<!-- Add this after the <body> tag -->
<?php
  if(isset($_SESSION['login_error'])) {
    echo '<div class="notifikasi active">
            <div class="notifikasi-kotak">
              <img src="img/warning.png" alt="">
              <div>' . $_SESSION['login_error'] . '</div>
            </div>
          </div>';
    unset($_SESSION['login_error']);
  }
?>
</html>
