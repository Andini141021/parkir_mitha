<?php
include '../../config/database.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM tempat_parkir WHERE id = $id");
$row = $result->fetch_assoc();
$kendaraan_result = $conn->query("SELECT * FROM kendaraan");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kendaraan_id = $_POST['kendaraan_id'];
    $tanggal_parkir = $_POST['tanggal_parkir'];
    $alamat_parkir = $_POST['alamat_parkir'];
    $conn->query("UPDATE tempat_parkir SET kendaraan_id='$kendaraan_id', tanggal_parkir='$tanggal_parkir', alamat_parkir='$alamat_parkir' WHERE id=$id");
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tempat Parkir</title>
    <link rel="stylesheet" href="../../assets/style.css"> <!-- Link CSS -->
</head>
<body>
    <form method="POST">
        <h2>Edit Tempat Parkir</h2>
        
        <label for="kendaraan_id">Kendaraan:</label>
        <select name="kendaraan_id" required>
            <?php while ($kendaraan = $kendaraan_result->fetch_assoc()): ?>
                <option value="<?= $kendaraan['id'] ?>" <?= ($row['kendaraan_id'] == $kendaraan['id']) ? 'selected' : '' ?>><?= $kendaraan['nama_area'] ?></option>
            <?php endwhile; ?>
        </select>

        <label for="tanggal_parkir">Tanggal Parkir:</label>
        <input type="date" name="tanggal_parkir" value="<?= $row['tanggal_parkir'] ?>" required>

        <label for="alamat_parkir">Alamat Parkir:</label>
        <input type="text" name="alamat_parkir" value="<?= $row['alamat_parkir'] ?>" required>

        <button type="submit">Update</button>
    </form>
</body>
</html>
