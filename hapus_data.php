<?php

include 'koneksi.php';
$id = $_GET['id'];

$sql = mysqli_query($conn, "DELETE FROM sensor_data WHERE id = '$id' ");

if ($sql) {
    echo "
    <script>
     
        window.location = 'data.php';
    </script>
    ";
}
