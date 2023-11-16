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

// Memproses formulir login saat dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Melakukan query ke database untuk memeriksa kecocokan username dan password
    $query = "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Login berhasil
        session_start(); // Mulai session
        $_SESSION['username'] = $username; // Simpan username ke dalam session
        echo '<script>alert("Login berhasil"); window.location.href = "index.php";</script>';
    } else {
        // Login gagal
        echo '<script>alert("Username atau password salah"); window.location.href = "login.html";</script>';
    }
}

// Menutup koneksi database
$conn->close();
?>
