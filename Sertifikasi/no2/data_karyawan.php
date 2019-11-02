<?php
require_once("connection.php"); //ini untuk mengambil data $conn sehinnga dapat terkoneksi dengan mysql

if(isset($_POST['save'])){ //Jika button save di jalankan
    $nik = $_POST['nik'];     // Deklarasi Variable post dan mengambil data dari form
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $gender = $_POST['gender'];


    $sql = "INSERT INTO t_karyawan (nik, nama, alamat, telepon, jenis_kelamin) VALUES ('$nik', '$nama', '$alamat', '$telepon', '$gender')"; //Query memasukan data
    mysqli_query($conn,$sql); //method PHP untuk mengeksekusi query
    echo "<script type='text/javascript'>alert('Berhasil Menambah Data');</script>"; //Alert
}elseif(isset($_POST['delete'])){ //Jika button delete di jalankan
    $id = $_POST['delete']; //Mengambil value id pada button delete

    $sql = "DELETE FROM t_karyawan WHERE id = '$id'"; //untuk menulis query delete
    mysqli_query($conn, $sql); //untuk mengeksekusi query delete
    echo "<script type='text/javascript'>alert('Data telah terhapus');</script>"; //alert
}elseif(isset($_POST['edit'])){ //Jika button edit di jalankan
    $id = $_POST['edit']; //Mengambil value id pada button edit

    $sql = "SELECT * FROM t_karyawan WHERE id = '$id'"; //untuk menulis query memunculkan data sesuai id yang di gunakan
    $data_karyawan = mysqli_query($conn, $sql); //mengekseskusi query select
}elseif(isset($_POST['update'])){
    $id = $_POST['id']; //Mengambil value semua form
    $nik = $_POST['nik']; // Deklarasi Variable post dan mengambil data dari form
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $gender = $_POST['gender'];


    $sql = "UPDATE t_karyawan SET nik='$nik', nama='$nama', alamat='$alamat', telepon='$telepon', jenis_kelamin='$gender' WHERE id='$id'"; //untuk query update
    mysqli_query($conn, $sql); //untuk mengeksekusi query update
    echo "<script type='text/javascript'>alert('Data telah teredit');</script>"; //Alert
}
?>

<!--Tampilan HTML-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="overflow-y: hidden;">

<!-- Header -->
<?php require_once("header.php");?>
<!--End Header-->

<!--Content-->
<section class="row">
    <section class="col-md-3">
<!--        Form Tambah Data-->
        <h4>Tambah Data</h4>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input required type="number" name="nik" class="form-control" id="nik" placeholder="NIK">
            </div>
            <div class="form-group">
                <input required type="text" name="nama" class="form-control" id="nama" placeholder="Nama">
            </div>
            <div class="form-group">
                <textarea required class="form-control" id="content" name="alamat" rows="4" placeholder="Alamat"></textarea>
            </div>
            <div class="form-group">
                <input required type="number" name="telepon" class="form-control" id="telepon" placeholder="Nomor Telepon">
            </div>
            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-5 pt-0">Jenis Kelamin</legend>
                    <div class="col-sm-7">
                        <div class="form-check">
                            <input required class="form-check-input" type="radio" name="gender" id="Laki-laki" value="Laki-laki">
                            <label class="form-check-label" for="Laki-laki">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input required class="form-check-input" type="radio" name="gender" id="Perempuan" value="Perempuan">
                            <label class="form-check-label" for="Perempuan">
                                Perempuan
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <center><button type="submit" class="btn btn-success" name="save">Save</button></center>
        </form><br><br>
<!--        End Form Tambah Data-->

<!--        Form Edit Data-->
        <h4 id="edit">Edit Data</h4>
        <form action="" method="post" enctype="multipart/form-data">
            <?php if(isset($_POST['edit'])){?>
                <?php foreach ($data_karyawan as $data) {?>
                    <div class="form-group">
                        <input required type="text" name="id" class="form-control" id="id" placeholder="ID" value="<?= $data['id']?>" hidden>
                    </div>
                    <div class="form-group">
                        <input value="<?= $data['nik']?>" required type="number" name="nik" class="form-control" id="nik" placeholder="NIK">
                    </div>
                    <div class="form-group">
                        <input value="<?= $data['nama']?>" required type="text" name="nama" class="form-control" id="nama" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <textarea required class="form-control" id="content" name="alamat" rows="4" placeholder="Alamat"><?= $data['alamat']?></textarea>
                    </div>
                    <div class="form-group">
                        <input value="<?= $data['telepon']?>" required type="number" name="telepon" class="form-control" id="telepon" placeholder="Nomor Telepon">
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-5 pt-0">Jenis Kelamin</legend>
                            <div class="col-sm-7">
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="gender" id="Laki-laki" value="Laki-laki" <?php if($data['jenis_kelamin']=="Laki-laki"){echo "checked";}?>>
                                    <label class="form-check-label" for="Laki-laki">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="gender" id="Perempuan" value="Perempuan" <?php if($data['jenis_kelamin']=="Perempuan"){echo "checked";}?>>
                                    <label class="form-check-label" for="Perempuan">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <center><button type="submit" class="btn btn-success" name="update">Update</button></center>
                <?php }?>
                <!-- If null -->
            <?php }else{?>
                <div class="form-group">
                    <input disabled required type="number" name="nik" class="form-control" id="nik" placeholder="NIK">
                </div>
                <div class="form-group">
                    <input disabled required type="text" name="nama" class="form-control" id="nama" placeholder="Nama">
                </div>
                <div class="form-group">
                    <textarea disabled required class="form-control" id="content" name="content" rows="4" placeholder="Alamat"></textarea>
                </div>
                <div class="form-group">
                    <input disabled required type="number" name="telepon" class="form-control" id="telepon" placeholder="Nomor Telepon">
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-5 pt-0">Jenis Kelamin</legend>
                        <div class="col-sm-7">
                            <div class="form-check">
                                <input disabled required class="form-check-input" type="radio" name="gender" id="Laki-laki" value="Laki-laki">
                                <label class="form-check-label" for="Laki-laki">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input disabled required class="form-check-input" type="radio" name="gender" id="Perempuan" value="Perempuan">
                                <label class="form-check-label" for="Perempuan">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <center><button type="submit" class="btn btn-success" name="update" disabled>Update</button></center>
            <?php }?>
        </form>
<!--        End Form Edit Data-->
    </section>


<!--    Tabel Karyawan-->
    <section class="col-md-9">
        <h1>Data Karyawan</h1><br>
        <form class="data-mhs" action="" method="post">
            <table class="table table-hover" id="tableMhs">
                <thead>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Jenis Kelamin</th>
                <th>Action</th>
                </thead>
                <?php
                if($conn){
                    $no = 1;
                    $sql = "SELECT * FROM t_karyawan";
                    $result = mysqli_query($conn, $sql);
                    foreach ($result as $data) {
                        echo "<tr>
                                            <td>$no</td>
                                            <td>".$data['nama']."</td>
                                            <td>".$data['nik']."</td>
                                            <td>".$data['alamat']."</td>
                                            <td>".$data['telepon']."</td>
                                            <td>".$data['jenis_kelamin']."</td>
                                            <td>
                                                <button type='submit' class='btn btn-danger' name='delete' value='".$data['id']."'><i class='fa fa-trash'></i> Delete</button>
                                                <a href='#edit'><button type='submit' class='btn btn-primary' name='edit' value='".$data['id']."'><i class='fa fa-pencil'></i> Edit</button></a>
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
<!--    Tabel Karyawan-->
</section>
<!--End Content-->
</body>
</html>