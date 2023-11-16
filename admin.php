<?php
// Sesuaikan informasi koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "db_rpl";

// Buat koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data dari tabel tb_user
$query = "SELECT * FROM tb_user";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Data Pengguna</h2>

    <?php
    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["username"] . "</td>
                    <td>" . $row["password"] . "</td>
                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                </tr>";
        }

        echo "</table>";
    } else {
        echo "Tidak ada data pengguna.";
    }
    ?>

</body>
</html>

<?php
// Tutup koneksi ke database
$conn->close();
?>
