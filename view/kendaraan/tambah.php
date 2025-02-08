<?php
include '../../config/database.php';

// Periksa apakah koneksi database berhasil
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Inisialisasi variabel pesan untuk validasi
$pesan = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_area = trim($_POST['nama_area'] ?? '');
    $jenis_kendaraan = $_POST['jenis_kendaraan'] ?? '';
    $warna = $_POST['warna'] ?? '';

    // Validasi input agar tidak kosong
    if (empty($nama_area) || empty($jenis_kendaraan) || empty($warna)) {
        $pesan = "Semua kolom harus diisi!";
    } else {
        // Gunakan prepared statements untuk keamanan
        $stmt = $conn->prepare("INSERT INTO kendaraan (nama_area, jenis_kendaraan, warna) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama_area, $jenis_kendaraan, $warna);

        if ($stmt->execute()) {
            header('Location: index.php');
            exit(); // Pastikan script berhenti setelah redirect
        } else {
            $pesan = "Terjadi kesalahan: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kendaraan</title>
    <link rel="stylesheet" href="../../assets/style.css"> <!-- Hubungkan ke CSS -->
</head>
<body>

    <h2 style="text-align: center;">Tambah Kendaraan</h2>

    <!-- Tampilkan pesan error jika ada -->
    <?php if (!empty($pesan)): ?>
        <p style="color: red; text-align: center;"><?= htmlspecialchars($pesan) ?></p>
    <?php endif; ?>

    <form method="POST">
        <label for="nama_area">Nama Area:</label>
        <input type="text" name="nama_area" id="nama_area" required>

        <label for="jenis_kendaraan">Jenis Kendaraan:</label>
        <select name="jenis_kendaraan" id="jenis_kendaraan">
            <option value="mobil">Mobil</option>
            <option value="motor">Motor</option>
            <option value="truk">Truk</option>
        </select>

        <label for="warna">Warna Kendaraan:</label>
        <select name="warna" id="warna">
            <option value="merah">Merah</option>
            <option value="biru">Biru</option>
            <option value="hijau">Hijau</option>
            <option value="putih">Putih</option>
            <option value="hitam">Hitam</option>
        </select>

        <button type="submit">Simpan</button>
    </form>

</body>
</html>
