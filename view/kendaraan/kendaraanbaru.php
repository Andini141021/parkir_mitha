<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data kendaraan</title>
</head>
<body>
<style>
    body{

        font: normal 16px/normal "Time New Roman",Tines,serif;
        background-color: burlywood;
    }

    .tombol {
        display: inline_block;
        -webkit-box-sizing: content-box;
        -moz-box-sizing: content-box;
        cursor: pointer;
        padding: 10px 20px 10px 21px;
        border:1px solid #018dc4;
    -webkit-border-radius: 3px;
        border-radius: 3px;
        font: normal 16px/normaal "Times New Roman",Times,serif;
        color:rgba(255,255,255,0.9);
            -o-text-overflow0: clip;
    text-overflow: clip;
    background: #0199d9;
    -webkit-transition: all 300ms cubic-bezier(0.42,0,0.58,1);
    -moz-transition: all 300ms cubic-bezier(0.42,0,0.58,1);
    -o-transition: all 300ms cubic-bezier(0.42,0,0.58,1);
    transition: all 300ms cubic-bezier(0.42,0,0.58,1);

    }

    <h1>List kendaraan baru</h1>
    <form action "cari.php" method="POST">
        <label> for="">Plat No</label>
        <input type="text" name="id_kendaraan"><br>
    </form>
</style>
</body>
</html>