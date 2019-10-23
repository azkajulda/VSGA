<?php require_once('../layouts/header.php')?>
<?php require_once('../../controller/connection.php')?>
<?php require_once('../../controller/KategoriController.php')?>
<?php 
    // if(isset($_POST['update'])){
    //     $id = $_POST['id'];
    //     $title = $_POST['title'];
    //     $content = $_POST['content'];
    //     $date = $_POST['date'];
    //     $tag = $_POST['tag'];
    //     $id_kategori = $_POST['id_kategori'];

    //     $target_dir = "uploads/";
    //     $target_file = $target_dir . basename($_FILES["gambar"]["name"]);   
    //     $uploadOk = 1;
    //     $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    //     $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    //     if($check !== false) {
    //         // echo "File is an image - " . $check["mime"] . ".";
    //         $uploadOk = 1;
    //     } else {
    //         echo "File is not an image.";
    //         $uploadOk = 0;
    //     }

    //     if ($uploadOk == 0) {
    //         echo "Sorry, your file was not uploaded.";
    //     // if everything is ok, try to upload file
    //     } else {
    //         if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
    //             // echo "The file ". basename( $_FILES["gambar"]["name"]). " has been uploaded.";
    //         } else {
    //             echo "Sorry, there was an error uploading your file.";
    //         }
    //     }

    //     // For Delete Foto
    //     $sqlGetFoto = "SELECT * FROM tb_post WHERE id_post='$id'";
    //     $query = mysqli_query($conn, $sqlGetFoto);
    //     $result = mysqli_fetch_assoc($query);
    //     $path = $result['gambar'];
    //     unlink('../../../assets/'.$path);

    //     $update = "UPDATE tb_post SET date='$date', title='$title', content='$content', gambar='$target_file', tag='$tag', id_kategori='$id_kategori' WHERE id_post='$id'";
    //     mysqli_query($conn, $update);
    //     echo "<script type='text/javascript'>alert('Berhasil Mengedit Data');</script>";
    // }
?>
<link href="../../../assets/css/dashboard.css" rel="stylesheet" />
<style>
    .btn-action{
        width: 100px;
    }
</style>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#tableMhs').DataTable();
    } );
</script> 
    <section class="row dashboard">
        <section class="col-md-3">
            <h4>Add Data</h4>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input required type="text" name="name" class="form-control" id="name" placeholder="Nama Kategori">
                </div>
                <center><button type="submit" class="btn btn-success" name="save1">Save</button></center>
            </form><br><br>

            <h4 id="edit">Edit Data</h4>
            <form action="" method="post" enctype="multipart/form-data">
                <?php if(isset($_GET['id1'])){?>
                <div class="form-group">
                    <input required type="text" name="id" class="form-control" id="id" placeholder="ID" value="<?= $kategori['id_kategori']?>" hidden>
                </div>
                <div class="form-group">
                    <input value="<?=$kategori['name']?>" required type="text" name="name" class="form-control" id="name" placeholder="Judul Artikel">
                </div>
                <center><button type="submit" class="btn btn-success" name="update1">Update</button></center>

                <!-- If null -->
                <?php }else{?>
                <div class="form-group">
                    <input disabled required type="text" name="title" class="form-control" id="title" placeholder="Judul Artikel">
                </div>
                <div class="form-group">
                    <textarea disabled class="form-control" id="content" name="content" rows="4" placeholder="Isi Artikel"></textarea>
                </div>
                <center><button type="submit" class="btn btn-success" name="update" disabled>Update</button></center>
                <?php }?>
            </form>
        </section>
        
        <section class="col-md-9">
            <h1>Data Kategori</h1><br>
            <form class="data-mhs" action="" method="get">
                <table class="table table-hover" id="tableMhs">
                    <thead> 
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Action</th>
                    </thead>
                    <?php
                        if($conn){
                            $no = 1;
                            $sql = "SELECT * FROM tb_kategori";
                            $result = mysqli_query($conn, $sql);
                            foreach ($result as $data) {
                                echo "<tr>
                                            <td>$no</td>
                                            <td>".$data['name']."</td>
                                            <td>
                                                <button type='submit' class='btn btn-danger btn-action' name='delete1' value='".$data['id_kategori']."'>Delete</button>
                                                <a href='#edit'><button type='submit' class='btn btn-primary btn-action' name='id1' value='".$data['id_kategori']."'>Edit</button></a>
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
