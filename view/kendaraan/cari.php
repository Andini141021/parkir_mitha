<?php

include '../config/koneksi.php';

$id_kendaraan = $_POST['id_kendaraan'];
$nama_area = $_POST['nama_area'];
$lokasi = $_POST['lokasi'];

include '../../config/koneksi.php';

$query = mysqli_query( $conn,query:"INSERT INTO area parkir values('$id_kendaraan','$nama_area','$lokasi')");

if($query){
    echo "<script>alert('Tambah berhasil')</script>";
    echo "<script>window.location.href='index.php'</script>";
}else{
    echo "<script>alert('Tambah gagal')</script>";
    echo "<script>window.location.href='index.php'</script>";
}