<?php
    if(isset($_POST['save1'])){
        $name = $_POST['name'];

        $insert = "INSERT INTO tb_kategori (name) VALUES ('$name')";
        mysqli_query($conn, $insert);

        echo "<script type='text/javascript'>alert('Berhasil Menambah Data');</script>";
    }elseif(isset($_GET['delete1'])){
        $id = $_GET['delete1'];
        $delete = "DELETE FROM tb_kategori WHERE id_kategori='$id'";
        mysqli_query($conn, $delete);
        
        echo "<script type='text/javascript'>alert('Berhasil Menghapus Data');</script>";
    }elseif(isset($_POST['edit1'])){
        $id = $_POST['edit1'];
        $judul = $_POST['name'];

        $update = "UPDATE articles SET judul='$judul', isi='$isi' WHERE id='$id'";
        mysqli_query($conn, $update);
        echo "<script type='text/javascript'>alert('Berhasil Mengedit Data');</script>";
        echo "<script>window.location.href='articles.php';</script>";
        exit;
    }elseif(isset($_GET['id1'])){
        $id = $_GET['id1'];
        $getData = "SELECT * FROM tb_kategori WHERE id_kategori='$id'";
        
        $getKategori = mysqli_query($conn, $getData);
        $kategori = mysqli_fetch_assoc($getKategori);
    }
?>