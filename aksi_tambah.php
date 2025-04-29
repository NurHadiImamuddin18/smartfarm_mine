
<?php
include "koneksi.php";
?>
<?php
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $golongan = $_POST['golongan'];
    $prodi = $_POST['prodi'];
    $password = md5($_POST['password']);
    $status = $_POST['status'];
    $sql = mysqli_query($conn, "INSERT INTO admin VALUES('','$nama','$nim','$golongan','$prodi','$password','$status')");
    if ($sql) {
?>
        <script type="text/javascript">

            window.location.href = "admin.php";
        </script>
<?php
    }
}
?>