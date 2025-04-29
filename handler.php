<?php
$conn = mysqli_connect("localhost", "root", "", "monitoring");

include "koneksi.php";

// Get current date and time
date_default_timezone_set('Asia/Jakarta');
$Waktu = date("Y-m-d H:i:s"); // Perbaiki format timestamp

if (!empty($_POST['kelembaban']) && !empty($_POST['kadar_air']) && !empty($_POST['status'])) {
    $kelembaban = $_POST['kelembaban'];
    $kadar_air = $_POST['kadar_air'];
    $status = $_POST['status'];

    $sql = "INSERT INTO sensor_data (kelembaban, kadar_air, status, timestamp) VALUES ('$kelembaban', '$kadar_air', '$status', '$Waktu')";

    if (mysqli_query($conn, $sql)) {
        echo "OK";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>