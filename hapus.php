<?php

include 'koneksi.php';
$id_admin = $_GET['id_admin'];

$sql = mysqli_query($conn, "DELETE FROM admin WHERE id_admin = '$id_admin' ");

if ($sql) {
    echo "
    <script>
     
        window.location = 'admin.php';
    </script>
    ";
}
