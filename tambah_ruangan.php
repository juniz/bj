
<?php
include "koneksi.php";
$nama_ruangan = $_POST['nama_ruangan'];

mysqli_query($koneksi,"INSERT INTO ruangan (nama_ruangan) VALUES ('$nama_ruangan')");
header('location:index.php');
?>