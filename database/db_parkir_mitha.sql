CREATE DATABASE db_parkir_mitha;
USE db_parkir_mitha;

CREATE TABLE kendaraan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_area VARCHAR(50) NOT NULL,
    jenis_kendaraan ENUM('mobil', 'motor', 'truk') NOT NULL,
    warna ENUM('merah', 'biru', 'hijau', 'putih', 'hitam') NOT NULL
);

CREATE TABLE tempat_parkir (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kendaraan_id INT NOT NULL,
    tanggal_parkir DATE NOT NULL,
    alamat_parkir VARCHAR(100) NOT NULL,
    FOREIGN KEY (kendaraan_id) REFERENCES kendaraan(id) ON DELETE CASCADE
);
