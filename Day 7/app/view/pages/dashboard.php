<?php require_once('../layouts/header.php')?>
<?php require_once('../../controller/connection.php')?>
<?php require_once('../../controller/DashboardController.php')?>
<link href="../../../assets/css/dashboard.css" rel="stylesheet" />
    <section class="row dashboard">
        <section class="col-md-3">
            <h4>Tambah Data</h4>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input required type="text" name="nim" class="form-control" id="nim" placeholder="NIM">
                </div>
                <div class="form-group">
                    <input required type="text" name="nama" class="form-control" id="nama" placeholder="Nama">
                </div>
                <center><button type="submit" class="btn btn-success" name="save">Save</button></center>
            </form><br><br>

            <h4 id="edit">Edit Data</h4>
            <form action="" method="post" enctype="multipart/form-data">
                <?php if(isset($_POST['edit'])){?>
                <?php foreach ($data_mhs as $data) {?>
                <div class="form-group">
                    <input required type="text" name="id" class="form-control" id="id" placeholder="ID" value="<?= $data['id']?>" hidden>
                </div>
                <div class="form-group">
                    <input required type="text" name="nim" class="form-control" id="nim" placeholder="NIM" value="<?= $data['nim']?>">
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
                    <center><button type="submit" class="btn btn-success" name="update" disabled>Update</button></center>
                <?php }?>
            </form>
        </section>
        
        <section class="col-md-9">
            <h1>Data Mahasiswa</h1><br>
            <form class="data-mhs" action="" method="post">
                <table class="table table-hover" id="tableMhs">
                    <thead> 
                        <th>No</th>
                        <th>Judul</th>
                        <th>isi</th>
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
    </section>   
<?php require_once('../layouts/footer.php')?>
