<?php
include "koneksi.php";
date_default_timezone_set('Asia/Jakarta');

// Query to get the latest sensor data
$query = mysqli_query($conn, "SELECT * FROM sensor_data ORDER BY id DESC LIMIT 1");
$data = mysqli_fetch_array($query);

// Create an array with the fetched data
$response = [
    'kelembaban' => $data['kelembaban'],
    'kadar_air' => $data['kadar_air']
];

// Return the data as JSON
echo json_encode($response);
?>