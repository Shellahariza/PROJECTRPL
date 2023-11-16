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
            echo '<script>alert("Registrasi berhasil"); window.location.href = "index.html";</script>';
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }
}

// Menutup koneksi database
$conn->close();
?>
