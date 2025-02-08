<?php
include '../../config/database.php';
$result = $conn->query("SELECT tempat_parkir.*, kendaraan.nama_area FROM tempat_parkir JOIN kendaraan ON tempat_parkir.kendaraan_id = kendaraan.id");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Tempat Parkir</title>
    <link rel="stylesheet" href="../../assets/style.css">
    <script src="../../assets/script.js"></script> 
</head>
<body>
    <h2>Data Tempat Parkir</h2>
    <a href="tambah.php" class="tombol-tambah">Tambah Tempat Parkir</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Kendaraan</th>
            <th>Tanggal Parkir</th>
            <th>Alamat Parkir</th>
            <th>Aksi</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama_area'] ?></td>
            <td><?= $row['tanggal_parkir'] ?></td>
            <td><?= $row['alamat_parkir'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>" class="btn-edit">Edit</a>
                <a href="hapus.php?id=<?= $row['id'] ?>" class="btn-hapus" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>