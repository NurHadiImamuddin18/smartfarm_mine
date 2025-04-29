<?php
// Mengambil koneksi database dan lain-lain
$conn = mysqli_connect("localhost", "root", "", "monitoring");


if(isset($_POST['search'])){
    $timestamp = $_POST['timestamp'];
    // Lakukan apa pun yang diperlukan untuk memproses pencarian, seperti mengambil data dari database
    $date = mysqli_query($conn, "SELECT * FROM sensor_data WHERE timestamp='$timestamp' ORDER BY id DESC");
    // Lakukan sesuatu dengan data yang ditemukan
}
?>
