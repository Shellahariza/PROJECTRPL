<?php
session_start();

include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_lengkap = $_POST["nama_lengkap"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $nomor_telepon = $_POST["nomor_telepon"];
    $email = $_POST["email"];
    $berat_badan = $_POST["berat_badan"];
    $tinggi_badan = $_POST["tinggi_badan"];
    $user_id = $_SESSION['user_id'];

    $tanggal_lahir_obj = new DateTime($tanggal_lahir);
    $sekarang = new DateTime();
    $umur = $sekarang->diff($tanggal_lahir_obj)->y;

    $BMI = $berat_badan / (($tinggi_badan / 100) * ($tinggi_badan / 100));
    $jenis_kelamin_pertama = substr($jenis_kelamin, 0, 1);
    $keteranganBMI = klasifikasi($BMI, $jenis_kelamin_pertama);
    
    $target_BMI = targetBMI($BMI, $jenis_kelamin_pertama, $tinggi_badan, $berat_badan);

    $update_fields = [];
    if (!empty($nama_lengkap)) {
        $update_fields[] = "nama_lengkap = '$nama_lengkap'";
    }
    if (!empty($tanggal_lahir)) {
        $update_fields[] = "tanggal_lahir = '$tanggal_lahir'";
    }
    if (!empty($jenis_kelamin)) {
        $update_fields[] = "jenis_kelamin = '$jenis_kelamin'";
    }
    if (!empty($nomor_telepon)) {
        $update_fields[] = "nomor_telepon = '$nomor_telepon'";
    }
    if (!empty($email)) {
        $update_fields[] = "email = '$email'";
    }
    if (!empty($berat_badan)) {
        $update_fields[] = "berat_badan = '$berat_badan'";
    }
    if (!empty($tinggi_badan)) {
        $update_fields[] = "tinggi_badan = '$tinggi_badan'";
    }
    $update_fields[] = "keterangan_bmi = '$keteranganBMI'";
    $update_fields[] = "umur = '$umur'";
    $update_fields[] = "BMI = '$BMI'";

    $update_fields[] = "target_BMI = '$target_BMI'";

    // Check if user data exists
    $check_query = "SELECT * FROM tb_datauser WHERE user_id = '$user_id'";
    $result = $conn->query($check_query);

    if ($result->num_rows > 0) {
        // User data exists, perform UPDATE
        $update_fields_str = implode(", ", $update_fields);
        $query = "UPDATE tb_datauser SET $update_fields_str WHERE user_id = '$user_id'";
    } else {
        // User data doesn't exist, perform INSERT
        $update_fields_str = implode(", ", $update_fields);
        $query = "INSERT INTO tb_datauser (user_id, nama_lengkap, umur, tanggal_lahir, jenis_kelamin, nomor_telepon, email, berat_badan, tinggi_badan, keterangan_bmi, BMI, target_BMI) 
                  VALUES ('$user_id', '$nama_lengkap', '$umur', '$tanggal_lahir', '$jenis_kelamin', '$nomor_telepon', '$email', '$berat_badan', '$tinggi_badan', '$keteranganBMI', '$BMI', '$target_BMI')";
    }

    if ($conn->query($query) === TRUE) {
        echo '<script>alert("Data berhasil disimpan"); window.location.href = "index2.php";</script>';
    } else {
        echo '<script>alert("Terjadi kesalahan, data tidak dapat disimpan."); window.location.href = "profil.html";</script>';
    }
}

$conn->close();

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
        