<?php
// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "db_rpl";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memproses formulir registrasi saat dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Melakukan query untuk memeriksa apakah username sudah ada
    $checkQuery = "SELECT * FROM tb_user WHERE username = '$username'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        // Jika username sudah ada, berikan peringatan
        echo '<script>alert("Username sudah digunakan. Silakan pilih username lain."); window.location.href = "registrasi.html";</script>';
    } else {
        // Jika username belum ada, lakukan registrasi
        $insertQuery = "INSERT INTO tb_user (username, password) VALUES ('$username', '$password')";

        if ($conn->query($insertQuery) === TRUE) {
            // Registrasi berhasil
            echo '<script>alert("Registrasi berhasil"); window.location.href = "index.php";</script>';
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }
}

// Menutup koneksi database
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="registrasi.css">
    <script src="scriptlogin.js"></script>
</head>
<body>
    <main>
        <div class="kotakbesar">
        <div class="registrasi-silang" >
            <img src="img/LogoSilang.png" alt="" onclick="klikSilangRegistrasi()">
        </div>
            <div class="sec1">
                <p>REGISTRASI</p>
            </div>
            <div class="form">
                <form action="registrasi.php" method="post">
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
                <div class="registrasi-button">
                    <input type="submit" value="Register">
                </div>
            </form>
        </div>
    </div>
</main>
</body>
</html>
