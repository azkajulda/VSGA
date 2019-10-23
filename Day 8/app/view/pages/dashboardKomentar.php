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
        <section class="col-md-12">
            <h1>Data Komentar</h1><br>
            <form class="data-mhs" action="" method="get">
                <table class="table table-hover" id="tableMhs">
                    <thead> 
                        <th>No</th>
                        <th>Judul Post</th>
                        <th>Email</th>
                        <th>Komentar</th>
                        <th>Action</th>
                    </thead>
                    <?php
                        if($conn){
                            $no = 1;
                            $sql = "SELECT tb_komentar.id_komentar, tb_post.title, tb_komentar.email, tb_komentar.content FROM tb_post JOIN tb_komentar ON tb_post.id_post=tb_komentar.id_post";
                            $result = mysqli_query($conn, $sql);
                            foreach ($result as $data) {
                                echo "<tr>
                                            <td>$no</td>
                                            <td>".$data['title']."</td>
                                            <td>".$data['email']."</td>
                                            <td>".$data['content']."</td>
                                            <td>
                                                <button type='submit' class='btn btn-danger btn-action' name='delete2' value='".$data['id_komentar']."'>Delete</button>
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
