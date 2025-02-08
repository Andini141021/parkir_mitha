<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah data are parkir</title>
</head>
<body>
    <h1>tambah data are parkir</h1>
    <form action="simpan.php" method="POST">
        <label for="id_kendaraan">id kendaraan:</label>
        <input type="number" name="id_kendaraan" id=id_kendaraan required><br><br>

        <label for="nama_area">nama area:</label>
        <input type="text" name="nama_area" id=nama_area required><br><br>

         <label for="lokasi">lokasi:</label>
        <input type="text" name="lokasi" id=lokasi required><br><br>

        <button type="submit"><?= $id? 'update' : 'tambah' ; ?></button>
    </form>
</body>
</html>