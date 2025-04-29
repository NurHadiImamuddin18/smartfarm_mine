<?php include "koneksi.php"; ?>

<?php
if (isset($_POST['edit'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $golongan = $_POST['golongan'];
    $prodi = $_POST['prodi'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $sql = mysqli_query($conn, "UPDATE admin SET nama = '$nama', nim = '$nim', golongan = '$golongan', prodi = '$prodi', password = '$password',
    status = '$status' WHERE id_admin = $id_admin");

    if ($sql) {
?>
        <script type="text/javascript">
       
            window.location.href = "admin.php";
        </script>
<?php
    }
}
?>