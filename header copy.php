<thead>
                          <tr>
                            <th>No</th>
                            <th>Kelembaban Tanah</th>
                            <th>Kadar Air</th>
                            <th>Status</th>
                            <th>waktu</th>
                          </tr>
                        </thead>
                        <tbody id="konten">
                          <?php
                          include 'koneksi.php'; // Sertakan file koneksi di sini
                        if(isset($_POST['timestamp']) && $_POST['timestamp'] != '') {
                          $timestamp = $_POST['timestamp'];
    
    
    // Gunakan prepared statement untuk mencegah SQL injection
                          $query = mysqli_prepare($conn, "SELECT * FROM sensor_data WHERE DATE(timestamp) = ?");
                          mysqli_stmt_bind_param($query, 's', $timestamp);
                          mysqli_stmt_execute($query);
                          $result = mysqli_stmt_get_result($query);
    
                    if ($result && mysqli_num_rows($result) > 0) {                              
                        $no = 1;
                        while ($data = mysqli_fetch_array($result)) {
                ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['kelembaban']; ?></td>
                <td><?= $data['kadar_air']; ?></td>
                <td><?= $data['status']; ?></td>
                <td><?= $data['timestamp']; ?></td>
            </tr>
<?php
        }
    } 
} 
?>