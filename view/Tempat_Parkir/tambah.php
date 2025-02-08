<?php
include '../../config/database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kendaraan_id = $_POST['kendaraan_id'];
    $tanggal_parkir = $_POST['tanggal_parkir'];
    $alamat_parkir = $_POST['alamat_parkir'];
    $conn->query("INSERT INTO tempat_parkir (kendaraan_id, tanggal_parkir, alamat_parkir) VALUES ('$kendaraan_id', '$tanggal_parkir', '$alamat_parkir')");
    header('Location: index.php');
}
$result = $conn->query("SELECT * FROM kendaraan");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tempat Parkir</title>
    <link rel="stylesheet" href="../../assets/style.css"> <!-- Hubungkan ke CSS -->
</head>
<body>

    <h2 style="text-align: center;">Tambah Tempat Parkir</h2>

    <form method="POST">
        <label for="kendaraan">Kendaraan:</label>
        <select name="kendaraan_id" id="kendaraan" required>
            <?php while ($row = $result->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>"><?= $row['nama_area'] ?></option>
            <?php endwhile; ?>
        </select>

        <label for="tanggal_parkir">Tanggal Parkir:</label>
        <input type="date" name="tanggal_parkir" id="tanggal_parkir" required>

        <label for="alamat_parkir">Alamat Parkir:</label>
        <input type="text" name="alamat_parkir" id="alamat_parkir" required>

        <button type="submit">Simpan</button>
    </form>

</body>
</html>
