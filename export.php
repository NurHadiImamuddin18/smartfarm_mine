<?php
include 'koneksi.php';
if (isset($_POST['timestamp']) && !empty($_POST['timestamp'])) {
    $timestamp = $_POST['timestamp'];

    if ($stmt = mysqli_prepare($conn, "SELECT * FROM sensor_data WHERE DATE(timestamp) = ?")) {
        mysqli_stmt_bind_param($stmt, 's', $timestamp);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="sensor_data.xls"');
            echo "No\tKelembaban Tanah\tKadar Air\tStatus\tWaktu\n";
            $no = 1;
            while ($data = mysqli_fetch_assoc($result)) {
                echo $no++ . "\t" . $data['kelembaban'] . "\t" . $data['kadar_air'] . "\t" . $data['status'] . "\t" . $data['timestamp'] . "\n";
            }
        } else {
            echo "Data tidak ditemukan.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Query tidak dapat dipersiapkan.";
    }

    mysqli_close($conn);
} else {
    echo "Parameter timestamp tidak diberikan.";
}
?>
