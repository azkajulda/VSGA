<?php require_once('../layouts/header.php')?>
<?php require_once('../../controller/connection.php')?>
<?php require_once('../../controller/ArticleController.php')?>
<?php 
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $date = $_POST['date'];
        $tag = $_POST['tag'];
        $id_kategori = $_POST['id_kategori'];

        $target_dir = "../../../assets/uploads/";
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
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
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                // echo "The file ". basename( $_FILES["gambar"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        // For Delete Foto
        $sqlGetFoto = "SELECT * FROM tb_post WHERE id_post='$id'";
        $query = mysqli_query($conn, $sqlGetFoto);
        $result = mysqli_fetch_assoc($query);
        $path = $result['gambar'];
        unlink('../../../assets/'.$path);

        $update = "UPDATE tb_post SET date='$date', title='$title', content='$content', gambar='$target_file', tag='$tag', id_kategori='$id_kategori' WHERE id_post='$id'";
        mysqli_query($conn, $update);
        echo "<script type='text/javascript'>alert('Berhasil Mengedit Data');</script>";
        echo "<script>window.location.href='dashboardPost.php';</script>";
        exit;
    }
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
                    <input required type="text" name="title" class="form-control" id="title" placeholder="Judul Artikel">
                </div>
                <div class="form-group">
                    <textarea required class="form-control" id="content" name="content" rows="4" placeholder="Isi Artikel"></textarea>
                </div>
                <div class="form-group">
                    <input required type="date" name="date" class="form-control" id="date" placeholder="Tanggal Artikel">
                </div>
                <div class="form-group">
                    <input required type="text" name="tag" class="form-control" id="tag" placeholder="Tag Artikel">
                </div>
                <div class="custom-file form-group">
                    <input required type="file" class="custom-file-input" id="customFile" name="gambar">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div class="form-group">
                    <select class="form-control" name="id_kategori">
                        <option value="">&mdash; Pilih Kategori Artikel &mdash;</option>
                        <?php if($conn){
                            $selectKategori = "SELECT * FROM tb_kategori";
                            $dataKategori = mysqli_query($conn, $selectKategori);
                            foreach ($dataKategori as $data) {?>
                            <option value="<?= $data['id_kategori']?>"><?= $data['name']?></option>
                        <?php }}else{ echo "Database Error";}?>
                    </select>
                </div>
                <center><button type="submit" class="btn btn-success" name="save">Save</button></center>
            </form><br><br>

            <h4 id="edit">Edit Data</h4>
            <form action="" method="post" enctype="multipart/form-data">
                <?php if(isset($_GET['id'])){?>
                <div class="form-group">
                    <input required type="text" name="id" class="form-control" id="id" placeholder="ID" value="<?= $post['id_post']?>" hidden>
                </div>
                <div class="form-group">
                    <input value="<?=$post['title']?>" required type="text" name="title" class="form-control" id="title" placeholder="Judul Artikel">
                </div>
                <div class="form-group">
                    <textarea required class="form-control" id="content" name="content" rows="4" placeholder="Isi Artikel"><?=$post['content']?></textarea>
                </div>
                <div class="form-group">
                    <input value="<?=$post['date']?>" required type="date" name="date" class="form-control" id="date" placeholder="Tanggal Artikel">
                </div>
                <div class="form-group">
                    <input value="<?=$post['tag']?>" required type="text" name="tag" class="form-control" id="tag" placeholder="Tag Artikel">
                </div>
                <div class="custom-file form-group">
                    <input required type="file" class="custom-file-input" id="customFile-edit" name="gambar">
                    <label class="custom-file-label edit" for="customFile">Choose file</label>
                </div>
                <div class="form-group">
                    <select class="form-control" name="id_kategori">
                        <option <?php if($post['id_kategori']==""){echo "selected";}?> value="">&mdash; Pilih Kategori Artikel &mdash;</option>
                        <?php if($conn){
                            $selectKategori = "SELECT * FROM tb_kategori";
                            $dataKategori = mysqli_query($conn, $selectKategori);
                            foreach ($dataKategori as $data) {?>
                            <option <?php if($data['id_kategori']==$post['id_kategori']){echo "selected";}?> value="<?= $data['id_kategori']?>"><?= $data['name']?></option>
                        <?php }}else{ echo "Database Error";}?>
                    </select>
                </div>
                <center><button type="submit" class="btn btn-success" name="update">Update</button></center>

                <!-- If null -->
                <?php }else{?>
                <div class="form-group">
                    <input disabled required type="text" name="title" class="form-control" id="title" placeholder="Judul Artikel">
                </div>
                <div class="form-group">
                    <textarea disabled class="form-control" id="content" name="content" rows="4" placeholder="Isi Artikel"></textarea>
                </div>
                <div class="form-group">
                    <input disabled required type="date" name="date" class="form-control" id="date" placeholder="Tanggal Artikel">
                </div>
                <div class="form-group">
                    <input disabled required type="text" name="tag" class="form-control" id="tag" placeholder="Tag Artikel">
                </div>
                <div class="custom-file form-group">
                    <input disabled required type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div class="form-group">
                    <select disabled class="form-control" name="">
                        <option value="">&mdash; Pilih Kategori Artikel &mdash;</option>
                        <?php if($conn){
                            $selectKategori = "SELECT * FROM tb_kategori";
                            $dataKategori = mysqli_query($conn, $selectKategori);
                            foreach ($dataKategori as $data) {?>
                            <option value="<?= $data['id_kategori']?>"><?= $data['name']?></option>
                        <?php }}else{ echo "Database Error";}?>
                    </select>
                </div>
                    <center><button type="submit" class="btn btn-success" name="update" disabled>Update</button></center>
                <?php }?>
            </form>
        </section>
        
        <section class="col-md-9">
            <h1>Data Post</h1><br>
            <form class="data-mhs" action="" method="get">
                <table class="table table-hover" id="tableMhs">
                    <thead> 
                        <th>No</th>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Tanggal Post</th>
                        <th>Tag</th>
                        <th>Kategori</th>
                        <th>Gambar Post</th>
                        <th>Action</th>
                    </thead>
                    <?php
                        if($conn){
                            $no = 1;
                            $sql = "SELECT tb_post.id_post ,tb_post.date, tb_post.title, tb_post.content, tb_post.gambar, tb_post.tag, tb_kategori.name FROM tb_kategori JOIN tb_post ON tb_kategori.id_kategori=tb_post.id_kategori";
                            $result = mysqli_query($conn, $sql);
                            foreach ($result as $data) {
                                echo "<tr>
                                            <td>$no</td>
                                            <td>".$data['title']."</td>
                                            <td style='vertical-align: middle; word-wrap: break-word; display: block; height: 90px; overflow-y: auto;'>".$data['content']."</td>
                                            <td>".date('d F Y', strtotime($data['date']))."</td>
                                            <td>".$data['tag']."</td>
                                            <td>".$data['name']."</td>
                                            <td>
                                                <img width='50' height='50' src='".$data['gambar']."' alt='artikel'>
                                            </td>
                                            <td>
                                                <button type='submit' class='btn btn-danger btn-action' name='delete' value='".$data['id_post']."'>Delete</button>
                                                <a href='#edit'><button type='submit' class='btn btn-primary btn-action' name='id' value='".$data['id_post']."'>Edit</button></a>
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
