<!DOCTYPE html>
<html lang="en">
<head>
    <title>Notulensi Data Sensor</title>
</head>
<body>
    <center>
        <h2>Notulensi Data Sensor</h2>
    </center>    
    <?php
    include 'koneksi.php';

    if (isset($_POST['timestamp']) && !empty($_POST['timestamp'])) {
        $timestamp = $_POST['timestamp'];

        if ($stmt = mysqli_prepare($conn, "SELECT * FROM sensor_data WHERE DATE(timestamp) = ?")) {
            mysqli_stmt_bind_param($stmt, 's', $timestamp);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($result && mysqli_num_rows($result) > 0) {                              
                ?>
                <table border="1" style="width:100%">
                    <tr>
                        <th width="1%">No</th>
                        <th>Kelembaban Tanah</th>
                        <th>Kadar Air</th>
                        <th>Status</th>
                        <th>Waktu</th>
                    </tr>
                    <?php
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($no++); ?></td>
                        <td><?= htmlspecialchars($data['kelembaban']); ?></td>
                        <td><?= htmlspecialchars($data['kadar_air']); ?></td>
                        <td><?= htmlspecialchars($data['status']); ?></td>
                        <td><?= htmlspecialchars($data['timestamp']); ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
                <?php
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
    <script>
        window.print();
    </script>
</body>
</html>
