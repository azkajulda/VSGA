<?php
    require_once("connection.php");

    if(isset($_POST['save'])){
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];

        $insert = "INSERT INTO t_berita (judul, deskripsi) VALUES ('$judul', '$deskripsi')";
        mysqli_query($conn, $insert);
        echo "<script type='text/javascript'>alert('Berhasil Menambah Data');</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .col-md-3{
            padding:80px;
            overflow-y: hidden!important;
        }

        h1{
            text-align:left!important;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <?php require_once("header.php");?>
    
    <section class="row">
        <section class="col-md-3">
            <h4>Tambah Berita</h4>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input required type="text" name="judul" class="form-control" id="judul" placeholder="Judul Berita">
                </div>
                <div class="form-group">
                    <input required type="text" name="deskripsi" class="form-control" id="deskripsi" placeholder="Deskripsi Singkat Berita">
                </div>
                <center><button type="submit" class="btn btn-success" name="save">Save</button></center>
            </form>
        </section>
        
        <section class="col-md-9">
            <?php if($conn){
                $selectAll = "SELECT * FROM t_berita";
                $result = mysqli_query($conn, $selectAll);
                foreach ($result as $data) {?>
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4"><?= $data['judul']?></h1>
                        <p class="lead"><?= $data['deskripsi']?></p>
                    </div>
                </div>
                <?php }} else { echo "DB Error";}?>
        </section>
    </section>   
</body>
</html>