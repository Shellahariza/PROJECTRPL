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

// Memproses formulir saat dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_lengkap = $_POST["nama_lengkap"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $nomor_telepon = $_POST["nomor_telepon"];
    $email = $_POST["email"];
    $berat_badan = $_POST["berat_badan"];
    $tinggi_badan = $_POST["tinggi_badan"];

    // Melakukan query untuk memasukkan data ke dalam tabel
    $query = "INSERT INTO tb_datauser (nama_lengkap, tanggal_lahir, jenis_kelamin, nomor_telepon, email, berat_badan, tinggi_badan)
              VALUES ('$nama_lengkap', '$tanggal_lahir', '$jenis_kelamin', '$nomor_telepon', '$email', '$berat_badan', '$tinggi_badan')";

    if ($conn->query($query) === TRUE) {
        echo '<script>alert("Data berhasil disimpan"); window.location.href = "index2.php";</script>';
    } else {
        echo '<script>alert("Terjadi kesalahan, data tidak dapat disimpan."); window.location.href = "profil.html";</script>';
    }
}

// Menutup koneksi database
$conn->close();
?>
