<?php
include 'koneksi.php';

// Query untuk mengambil data makanan
$sql = "SELECT * FROM tb_makanan";
$result = $conn->query($sql);

// Buat array untuk menyimpan data makanan
$foods = array();

if ($result->num_rows > 0) {
    // Loop melalui hasil query dan tambahkan data ke array
    while ($row = $result->fetch_assoc()) {
        $foods[] = $row;
    }
}

// Tutup koneksi
$conn->close();

// Keluarkan data makanan dalam format JSON
echo json_encode($foods);

?>
