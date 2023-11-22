<?php
// Koneksi ke database
include 'koneksi.php';

// // Ambil data makanan dari permintaan POST
// $selectedFoods = isset($_POST['selectedFoods']) ? json_decode($_POST['selectedFoods']) : [];

// // Ganti dengan ID pengguna yang sesuai (contoh: 1)
// $userId = 1;

// // Loop untuk menyimpan setiap makanan yang dipilih ke dalam database
// foreach ($selectedFoods as $foodId) {
//     $foodId = (int)$foodId; // Pastikan tipe data benar
//     $sql = "INSERT INTO tb_consumed_food (id_user, id_makanan, consumed_at) VALUES ($userId, $foodId, NOW())";
    
//     if ($conn->query($sql) !== TRUE) {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
// }

// // Tutup koneksi
// $conn->close();
// 

// Tangkap data dari formulir
$selectedFoods = isset($_POST['foods']) ? $_POST['foods'] : array();

// Lindungi data yang diterima dari injeksi SQL
$escapedFoods = array_map(function($food) use ($conn) {
    return $conn->real_escape_string($food);
}, $selectedFoods);

// Gabungkan makanan yang dipilih menjadi string
$foodsString = implode(", ", $escapedFoods);
// Loop untuk menyimpan setiap makanan yang dipilih ke dalam database
foreach ($escapedFoods as $foodId) {
    $foodId = (int)$foodId; // Pastikan tipe data benar
    $sql = "INSERT INTO tb_consumed_food (id_user, id_makanan, consumed_at) VALUES ($userId, $foodId, NOW())";
    
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan ke database";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi ke database
$conn->close();
?>