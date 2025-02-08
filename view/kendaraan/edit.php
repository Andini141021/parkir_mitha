<?php
include '../../config/database.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM kendaraan WHERE id = $id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_area = $_POST['nama_area'];
    $jenis_kendaraan = $_POST['jenis_kendaraan'];
    $warna = $_POST['warna'];
    $conn->query("UPDATE kendaraan SET nama_area='$nama_area', jenis_kendaraan='$jenis_kendaraan', warna='$warna' WHERE id=$id");
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kendaraan</title>
    <link rel="stylesheet" href="../../assets/style.css"> <!-- Link CSS -->
</head>
<body>
    <form method="POST">
        <h2>Edit Kendaraan</h2>
        
        <label for="nama_area">Nama Area:</label>
        <input type="text" name="nama_area" value="<?= $row['nama_area'] ?>" required>

        <label for="jenis_kendaraan">Jenis Kendaraan:</label>
        <select name="jenis_kendaraan" required>
            <option value="mobil" <?= ($row['jenis_kendaraan'] == 'mobil') ? 'selected' : '' ?>>Mobil</option>
            <option value="motor" <?= ($row['jenis_kendaraan'] == 'motor') ? 'selected' : '' ?>>Motor</option>
            <option value="truk" <?= ($row['jenis_kendaraan'] == 'truk') ? 'selected' : '' ?>>Truk</option>
        </select>

        <label for="warna">Warna:</label>
        <select name="warna" required>
            <option value="merah" <?= ($row['warna'] == 'merah') ? 'selected' : '' ?>>Merah</option>
            <option value="biru" <?= ($row['warna'] == 'biru') ? 'selected' : '' ?>>Biru</option>
            <option value="hijau" <?= ($row['warna'] == 'hijau') ? 'selected' : '' ?>>Hijau</option>
            <option value="putih" <?= ($row['warna'] == 'putih') ? 'selected' : '' ?>>Putih</option>
            <option value="hitam" <?= ($row['warna'] == 'hitam') ? 'selected' : '' ?>>Hitam</option>
        </select>

        <button type="submit">Update</button>
    </form>
</body>
</html>
