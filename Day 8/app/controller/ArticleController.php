    <?php
    if(isset($_POST['save'])){
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


        $insert = "INSERT INTO tb_post (date, title, content, gambar, tag, id_kategori) VALUES ('$date', '$title', '$content', '$target_file','$tag','$id_kategori')";
        mysqli_query($conn, $insert);

        echo "<script type='text/javascript'>alert('Berhasil Menambah Data');</script>";
    }elseif(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $delete = "DELETE FROM tb_post WHERE id_post='$id'";
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
        $getData = "SELECT * FROM tb_post WHERE id_post='$id'";
        
        $getArticle = mysqli_query($conn, $getData);
        $post = mysqli_fetch_assoc($getArticle);
    }
?>