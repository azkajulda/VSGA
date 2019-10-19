<?php
    require_once("connection.php");

    if(isset($_POST['save'])){
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $gender = $_POST['gender'];
        $fakultas = $_POST['jurusan'];

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                // echo "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $sql = "INSERT INTO t_mahasiswa (nim, nama, kelas, jk, fakultas, foto) VALUES ('$nim', '$nama', '$kelas', '$gender', '$fakultas', '$target_file')";
        mysqli_query($conn,$sql);
        echo "<script type='text/javascript'>alert('Berhasil Menambah Data');</script>";
    }elseif(isset($_POST['delete'])){
        $id = $_POST['delete'];

        //Delete foto local
        $sqlGetFoto = "SELECT * FROM t_mahasiswa WHERE id='$id'";
        $query = mysqli_query($conn, $sqlGetFoto);
        $result = mysqli_fetch_assoc($query);
        $path = $result['foto'];
        unlink($path);

        $sql = "DELETE FROM t_mahasiswa WHERE id = '$id'";
        mysqli_query($conn, $sql);
        echo "<script type='text/javascript'>alert('Data telah terhapus');</script>";
    }elseif(isset($_POST['edit'])){
        $id = $_POST['edit'];
        
        $sql = "SELECT * FROM t_mahasiswa WHERE id = '$id'";
        $data_mhs = mysqli_query($conn, $sql);
    }elseif(isset($_POST['update'])){
        $id = $_POST['id'];
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $gender = $_POST['gender'];
        $fakultas = $_POST['jurusan'];

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                // echo "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        // For Delete Foto
        $sqlGetFoto = "SELECT * FROM t_mahasiswa WHERE id='$id'";
        $query = mysqli_query($conn, $sqlGetFoto);
        $result = mysqli_fetch_assoc($query);
        $path = $result['foto'];
        unlink($path);
        
        $sql = "UPDATE t_mahasiswa SET nim='$nim', nama='$nama', kelas='$kelas', jk='$gender', fakultas='$fakultas', foto='$target_file' WHERE id='$id'";
        mysqli_query($conn, $sql);
        echo "<script type='text/javascript'>alert('Data telah teredit');</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#tableMhs').DataTable();
        } );
    </script>
    <style> 
        h1{
            text-align:center;
        }

        .col-md-3{
            padding:80px;
        }

        .col-md-9{
            padding:40px;
        }

        .mb-20{
            margin-bottom:20px;
        }

        fieldset{
            margin-bottom:0px;
        }
    </style>
</head>
<body>
    <section class="row">
        <section class="col-md-3">
            <h4>Tambah Data</h4>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="nim" class="form-control" id="nim" placeholder="NIM">
                </div>
                <div class="form-group">
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama">
                </div>
                <div class="form-group">
                    <input type="text" name="kelas" class="form-control" id="kelas" placeholder="Kelas">
                </div>
                <fieldset class="form-group">
                    <div class="row">
                    <legend class="col-form-label col-sm-5 pt-0">Jenis Kelamin</legend>
                    <div class="col-sm-7">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="Laki-laki" value="Laki-laki">
                            <label class="form-check-label" for="Laki-laki">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="Perempuan" value="Perempuan">
                            <label class="form-check-label" for="Perempuan">
                                Perempuan
                            </label>
                        </div>
                    </div>  
                    </div>
                </fieldset>
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <select class="form-control" id="jurusan" name="jurusan">
                    <option value="">&mdash;Silahkan Pilih Jurusan&mdash;</option>
                    <option value="Fakultas Rekayasa Industri">Fakultas Rekayasa Industri (FRI)</option>
                    <option value="Fakultas Ekonomi Bisnis">Fakultas Ekonomi Bisnis (FEB)</option>
                    <option value="Fakultas Ilmu Terapan">Fakultas Ilmu Terapan (FIT)</option>
                    </select>
                </div>
                <div class="custom-file mb-20">
                    <input type="file" id="foto" name="foto">
                </div>
                <center><button type="submit" class="btn btn-success" name="save">Save</button></center>
            </form><br><br>

            <h4>Edit Data</h4>
            <form action="" method="post" enctype="multipart/form-data">
                <?php if(isset($_POST['edit'])){?>
                <?php foreach ($data_mhs as $data) {?>
                <div class="form-group">
                    <input type="text" name="id" class="form-control" id="id" placeholder="ID" value="<?= $data['id']?>" hidden>
                </div>
                <div class="form-group">
                    <input type="text" name="nim" class="form-control" id="nim" placeholder="NIM" value="<?= $data['nim']?>">
                </div>
                <div class="form-group">
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" value="<?= $data['nama']?>">
                </div>
                <div class="form-group">
                    <input type="text" name="kelas" class="form-control" id="kelas" placeholder="Kelas" value="<?= $data['kelas']?>">
                </div>
                <fieldset class="form-group">
                    <div class="row">
                    <legend class="col-form-label col-sm-5 pt-0">Jenis Kelamin</legend>
                    <div class="col-sm-7">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="Laki-laki" value="Laki-laki" <?php if($data['jk']=="Laki-laki"){echo "checked";}?>>
                            <label class="form-check-label" for="Laki-laki">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="Perempuan" value="Perempuan" <?php if($data['jk']=="Perempuan"){echo "checked";}?>>
                            <label class="form-check-label" for="Perempuan">
                                Perempuan
                            </label>
                        </div>
                    </div>  
                    </div>
                </fieldset>
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <select class="form-control" id="jurusan" name="jurusan">
                        <option <?php if($data['fakultas']==""){echo "selected";}?> value="">&mdash;Silahkan Pilih Fakultas&mdash;</option>
                        <option <?php if($data['fakultas']=="Fakultas Rekayasa Industri"){echo "selected";}?> value="Fakultas Rekayasa Industri">Fakultas Rekayasa Industri (FRI)</option>
                        <option <?php if($data['fakultas']=="Fakultas Ekonomi Bisnis"){echo "selected";}?> value="Fakultas Ekonomi Bisnis">Fakultas Ekonomi Bisnis (FEB)</option>
                        <option <?php if($data['fakultas']=="Fakultas Ilmu Terapan"){echo "selected";}?> value="Fakultas Ilmu Terapan">Fakultas Ilmu Terapan (FIT)</option>
                    </select>
                </div>
                <center><img width='25%' height='100' src="<?php echo './'.$data['foto']?>"></center>
                <div class="custom-file mb-20">
                    <input type="file" id="foto" name="foto">
                </div>
                <center><button type="submit" class="btn btn-success" name="update">Update</button></center>
                <?php }?>

                <!-- If null -->
                <?php }else{?>
                    <div class="form-group">
                        <input type="text" name="nim" class="form-control" id="nim" placeholder="NIM" disabled>
                    </div>
                    <div class="form-group">
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" disabled>  
                    </div>
                    <div class="form-group">
                        <input type="text" name="kelas" class="form-control" id="kelas" placeholder="Kelas" disabled>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                        <legend class="col-form-label col-sm-5 pt-0">Jenis Kelamin</legend>
                        <div class="col-sm-7">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="Laki-laki" value="Laki-laki" disabled>
                                <label class="form-check-label" for="Laki-laki">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="Perempuan" value="Perempuan" disabled>
                                <label class="form-check-label" for="Perempuan">
                                    Perempuan
                                </label>
                            </div>
                        </div>  
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan" disabled>
                            <option value="">&mdash;Silahkan Pilih Jurusan&mdash;</option>
                            <option value="Fakultas Rekayasa Industri">Fakultas Rekayasa Industri (FRI)</option>
                            <option value="Fakultas Ekonomi Bisnis">Fakultas Ekonomi Bisnis (FEB)</option>
                            <option value="Fakultas Ilmu Terapan">Fakultas Ilmu Terapan (FIT)</option>
                        </select>
                    </div>
                    <div class="custom-file mb-20">
                        <input type="file" id="foto" name="foto" disabled>
                    </div>
                    <center><button type="submit" class="btn btn-success" name="update" disabled>Update</button></center>
                <?php }?>
            </form>
        </section>

        <section class="col-md-9">
            <h1>Data Mahasiswa</h1><br>
            <form action="" method="post">
                <table class="table" id="tableMhs">
                    <thead> 
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Kelas</th>
                        <th>Gender</th>
                        <th>Fakultas</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </thead>
                    <?php
                        if($conn){
                            $no = 1;
                            $sql = "SELECT * FROM t_mahasiswa";
                            $result = mysqli_query($conn, $sql);
                            foreach ($result as $data) {
                                if ($data['foto'] == 'uploads/' || $data['foto'] == '') {
                                    $foto = './uploads/person-male.png';
                                }else {
                                    $foto = './'.$data['foto'];
                                }
                                echo "<tr>
                                            <td>$no</td>
                                            <td>".$data['nama']."</td>
                                            <td>".$data['nim']."</td>
                                            <td>".$data['kelas']."</td>
                                            <td>".$data['jk']."</td>
                                            <td>".$data['fakultas']."</td>
                                            <td>
                                                <img width='50' height='50' src='".$foto."'>
                                            </td>
                                            <td>
                                                <button type='submit' class='btn btn-danger' name='delete' value='".$data['id']."'><i class='fa fa-trash'></i> Delete</button>
                                                <button type='submit' class='btn btn-primary' name='edit' value='".$data['id']."'><i class='fa fa-pencil'></i> Edit</button>
                                            </td>
                                            </tr>";
                                    $no++;
                            }
                        }else{
                            echo "DB Connection Error!";
                        }
                    ?>
                </table>
            </form>
        </section>
    </section>   
</body>
</html>