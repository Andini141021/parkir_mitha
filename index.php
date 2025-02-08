<?php
include 'config/database.php';

// Ambil jumlah kendaraan yang terparkir
$total_kendaraan = $conn->query("SELECT COUNT(*) AS total FROM tempat_parkir")->fetch_assoc()['total'];

// Ambil data parkir
$parkir = $conn->query("SELECT tp.*, k.nama_area, k.jenis_kendaraan, k.warna 
                        FROM tempat_parkir tp 
                        JOIN kendaraan k ON tp.kendaraan_id = k.id 
                        ORDER BY tp.tanggal_parkir DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Parkir</title>
    <link rel="stylesheet" href="assets/induk.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Parkir</h2>
        <ul>
            <li><a href="#"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="view/kendaraan/index.php"><i class="fas fa-car"></i> Kendaraan</a></li>
            <li><a href="view/tempat_parkir/index.php"><i class="fas fa-map-marker-alt"></i> Tempat Parkir</a></li>

        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <header>
            <h1>Dashboard Admin Parkir</h1>
            <img src="../../assets/parking.png" alt="Ilustrasi Parkir">
        </header>

        <!-- Statistik -->
        <div class="stats">
            <div class="card">
                <i class="fas fa-car"></i>
                <h3><?= $total_kendaraan ?></h3>
                <p>Kendaraan Terparkir</p>
            </div>
        </div>

        <!-- Daftar Kendaraan Terparkir -->
        <h2>Daftar Kendaraan Terparkir</h2>
        <table>
            <tr>
                <th>No</th>
                <th>Nama Area</th>
                <th>Jenis Kendaraan</th>
                <th>Warna</th>
                <th>Tanggal Parkir</th>
                <th>Alamat</th>
            </tr>
            <?php $no = 1; while ($row = $parkir->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama_area'] ?></td>
                <td><?= $row['jenis_kendaraan'] ?></td>
                <td><?= $row['warna'] ?></td>
                <td><?= $row['tanggal_parkir'] ?></td>
                <td><?= $row['alamat_parkir'] ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

</body>
</html>
