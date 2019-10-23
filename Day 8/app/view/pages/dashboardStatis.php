<?php require_once('../layouts/header.php')?>
<?php require_once('../../controller/connection.php')?>
<?php require_once('../../controller/StatisController.php')?>
<?php 
    if(isset($_POST['update1'])){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        
        $update = "UPDATE tb_statis SET title='$title', content='$content' WHERE id_statis='$id'";
        mysqli_query($conn, $update);
        echo "<script type='text/javascript'>alert('Berhasil Mengedit Data');</script>";
        echo "<script>window.location.href='dashboardStatis.php';</script>";
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
                    <input required type="text" name="title" class="form-control" id="title" placeholder="Judul Statis">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="content" name="content" rows="4" placeholder="Isi Statis"></textarea>
                </div>
                <center><button type="submit" class="btn btn-success" name="save2">Save</button></center>
            </form><br><br>

            <h4 id="edit">Edit Data</h4>
            <form action="" method="post" enctype="multipart/form-data">
                <?php if(isset($_GET['id2'])){?>
                <div class="form-group">
                    <input required type="text" name="id" class="form-control" id="id" placeholder="ID" value="<?= $statis['id_statis']?>" hidden>
                </div>
                <div class="form-group">
                    <input required type="text" name="title" class="form-control" id="title" placeholder="Judul Statis" value="<?= $statis['title']?>">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="content" name="content" rows="4" placeholder="Isi Statis"><?= $statis['content']?></textarea>
                </div>
                <center><button type="submit" class="btn btn-success" name="update1">Update</button></center>

                <!-- If null -->
                <?php }else{?>
                    <div class="form-group">
                    <input disabled required type="text" name="name" class="form-control" id="name" placeholder="Judul Statis">
                </div>
                <div class="form-group">
                    <textarea disabled class="form-control" id="content" name="content" rows="4" placeholder="Isi Statis"></textarea>
                </div>
                <center><button type="submit" class="btn btn-success" name="update1" disabled>Update</button></center>
                <?php }?>
            </form>
        </section>
        
        <section class="col-md-9">
            <h1>Data Statis</h1><br>
            <form class="data-mhs" action="" method="get">
                <table class="table table-hover" id="tableMhs">
                    <thead> 
                        <th>No</th>
                        <th>Judul Statis</th>
                        <th>Konten Statis</th>
                        <th>Action</th>
                    </thead>
                    <?php
                        if($conn){
                            $no = 1;
                            $sql = "SELECT * FROM tb_statis";
                            $result = mysqli_query($conn, $sql);
                            foreach ($result as $data) {
                                echo "<tr>
                                            <td>$no</td>
                                            <td>".$data['title']."</td>
                                            <td>".$data['content']."</td>
                                            <td>
                                                <button type='submit' class='btn btn-danger btn-action' name='delete2' value='".$data['id_statis']."'>Delete</button>
                                                <a href='#edit'><button type='submit' class='btn btn-primary btn-action' name='id2' value='".$data['id_statis']."'>Edit</button></a>
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
