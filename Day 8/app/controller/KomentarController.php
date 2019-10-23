<?php
    if(isset($_POST['save2'])){
        $title = $_POST['title'];
        $content = $_POST['content'];

        $insert = "INSERT INTO tb_statis (title, content) VALUES ('$title','$content')";
        mysqli_query($conn, $insert);

        echo "<script type='text/javascript'>alert('Berhasil Menambah Data');</script>";
    }elseif(isset($_GET['delete2'])){
        $id = $_GET['delete2'];
        $delete = "DELETE FROM tb_statis WHERE id_statis='$id'";
        mysqli_query($conn, $delete);
        
        echo "<script type='text/javascript'>alert('Berhasil Menghapus Data');</script>";
    }elseif(isset($_GET['id2'])){
        $id = $_GET['id2'];
        $getData = "SELECT * FROM tb_statis WHERE id_statis='$id'";
        
        $getStatis = mysqli_query($conn, $getData);
        $statis = mysqli_fetch_assoc($getStatis);
    }
?>