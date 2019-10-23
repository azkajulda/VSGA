<?php require_once('../layouts/header.php')?>
<?php require_once('../../controller/connection.php')?>
<?php require_once('../../controller/ArticleController.php')?>
<link href="../../../assets/css/dashboard.css" rel="stylesheet" />
<style>
    .btn-action{
        width: 100px;
    }
</style>
    <section class="row dashboard">
        <section class="col-md-3">
            <h4>Add Data</h4>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input required type="text" name="title" class="form-control" id="title" placeholder="Judul Artikel">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="content" name="content" rows="4" placeholder="Isi Artikel"></textarea>
                </div>
                <div class="form-group">
                    <input required type="date" name="date" class="form-control" id="date" placeholder="Tanggal Artikel">
                </div>
                <div class="form-group">
                    <input required type="text" name="tag" class="form-control" id="tag" placeholder="Tag Artikel">
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            
                <center><button type="submit" class="btn btn-success" name="save">Save</button></center>
            </form><br><br>

            <h4 id="edit">Edit Data</h4>
            <form action="" method="post" enctype="multipart/form-data">
                <?php if(isset($_GET['id'])){?>
                <div class="form-group">
                    <input required type="text" name="id" class="form-control" id="id" placeholder="ID" value="<?= $article['id']?>" hidden>
                </div>
                <div class="form-group">
                    <input required type="text" name="judul" class="form-control" id="judul" placeholder="Article Title" value="<?= $article['judul']?>">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="isi" name="isi" rows="3" placeholder="Article Content"><?= $article['isi']?></textarea>
                </div>
                <center><button type="submit" class="btn btn-success" name="update">Update</button></center>

                <!-- If null -->
                <?php }else{?>
                    <div class="form-group">
                        <input type="text" name="judul" class="form-control" id="judul" placeholder="Article Title" disabled>
                    </div>
                    <div class="form-group">
                        <input type="text" name="isi" class="form-control" id="isi" placeholder="Article Content" disabled>  
                    </div>
                    <center><button type="submit" class="btn btn-success" name="update" disabled>Update</button></center>
                <?php }?>
            </form>
        </section>
        
        <section class="col-md-9">
            <h1>Post Data</h1><br>
            <form class="data-mhs" action="" method="get">
                <table class="table table-hover" id="tableMhs">
                    <thead> 
                        <th>No</th>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Tanggal Post</th>
                        <th>Tag</th>
                        <th>Gambar Post</th>
                        <th>Action</th>
                    </thead>
                    <?php
                        if($conn){
                            $no = 1;
                            $sql = "SELECT * FROM tb_post";
                            $result = mysqli_query($conn, $sql);
                            foreach ($result as $data) {
                                echo "<tr>
                                            <td>$no</td>
                                            <td>".$data['title']."</td>
                                            <td style='vertical-align: middle; word-wrap: break-word; display: block; height: 90px; overflow-y: scroll;'>".$data['content']."</td>
                                            <td>".date('d F Y', strtotime($data['date']))."</td>
                                            <td>".$data['tag']."</td>
                                            <td>
                                                <img width='50' height='50' src='../../../assets/".$data['gambar']."' alt='artikel'>
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
