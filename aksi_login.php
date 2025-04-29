<?php
session_start();
include "koneksi.php";

$conn = mysqli_connect("localhost", "root", "", "monitoring");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $password = $_POST['password'];
    $status = $_POST['status'];

    // Enkripsi password sebelum mencocokkan
    $password = md5($password);

    // Query untuk memeriksa kredensial pengguna
    $query = "SELECT * FROM admin WHERE nim = ? AND password = ? AND status = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $nim, $password, $status);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Pengguna ditemukan, simpan informasi pengguna dalam sesi
        $_SESSION['nim'] = $nim;
        $_SESSION['status'] = $status;

        // Redirect berdasarkan peran
        if ($status == 'anggota') {
            header("Location: index.php");
        } else if ($status == 'ketua') {
            header("Location: index.php");
        }
        exit();
    } else {
        echo "Login gagal. Periksa nim, password, dan peran Anda.";
    }
}
?>
