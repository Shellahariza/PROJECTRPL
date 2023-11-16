<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $full_name = $_POST["full_name"];
    $birth_date = $_POST["birth_date"];
    $gender = $_POST["gender"];
    $phone_number = $_POST["phone_number"];
    $email = $_POST["email"];
    $weight = $_POST["weight"];
    $height = $_POST["height"];

    // Database connection
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "db_rpl";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Insert data into the database
    $query = "INSERT INTO tb_datauser (full_name, birth_date, gender, phone_number, email, weight, height) VALUES ('$full_name', '$birth_date', '$gender', '$phone_number', '$email', '$weight', '$height')";

    if ($conn->query($query) === TRUE) {
        echo '<script>alert("Data berhasil disimpan"); window.location.href = "index2.php";</script>';
    } else {
        echo '<script>alert("Error: ' . $conn->error . '");</script>';
    }

    // Close the database connection
    $conn->close();
}
?>
