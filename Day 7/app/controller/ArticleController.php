<?php
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $delete = "DELETE FROM articles WHERE id='$id'";
        mysqli_query($conn, $delete);
        
        echo "<script type='text/javascript'>alert('Berhasil Menghapus Data');</script>";
    }elseif(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $getData = "SELECT * FROM articles WHERE id='$id'";
        
        $getArticle = mysqli_query($conn, $getData);
        // header('Location: editArticle.php');
    }
?>