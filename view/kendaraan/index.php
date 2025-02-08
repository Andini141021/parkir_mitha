<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><center>
    <style>
        body{
            background-color: red;

        }

    </style>
<h1>Data kendaraan</h1>   
 <a href="kendaraanbaru.php">Cari kendaraan baru</a>
        <table border='1'>
            <tr>
                <th>NO</th>
                <th>id kendaraan</th>
                <th>nama kendaraan</th>
                <th>jenis kendaraan</th>
                <th>lokasi</th>
                <th>aksi</th>
            </tr>
            <?php
                include '../../config/koneksi.php';
                $query = mysqli_query(mysql:$conn,query: "SELECT * FROM area parkir");
                $no=1;
                if(mysqli_num_rows(result:$query)){
                    while($result=mysqli_fetch_assoc(result:$query)){
                    ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $result['id_kendaraan'] ?></td>
                        <td><?php echo $result['nama_kendaraan'] ?></td>
                        <td><?php echo $result['jenis_kendaraan'] ?></td>
                        <td><?php echo $result['lokasi'] ?></td>

                        <td>
                            <a href="">Edit </a>
                            <a href="">Hapus </a>
                        </td>
                    </tr>
                    <?php
                    $no++;}
                }
                else{
                    echo "Data Kurang";
                }
                ?>
                </table>
                 </center>
</body>
</html>