<?php
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $delete = "DELETE FROM articles WHERE id='$id'";
        mysqli_query($conn, $delete);
        
        echo "<script type='text/javascript'>alert('Berhasil Menghapus Data');</script>";
    }elseif(isset($_POST['edit'])){
        $id = $_POST['edit'];
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];

        $update = "UPDATE articles SET judul='$judul', isi='$isi' WHERE id='$id'";
        mysqli_query($conn, $update);
        echo "<script type='text/javascript'>alert('Berhasil Mengedit Data');</script>";
        echo "<script>window.location.href='articles.php';</script>";
        exit;
        
        
    }elseif(isset($_GET['id'])){
        $id = $_GET['id'];
        $getData = "SELECT * FROM articles WHERE id='$id'";
        
        $getArticle = mysqli_query($conn, $getData);
        $article = mysqli_fetch_assoc($getArticle);
    }
?>