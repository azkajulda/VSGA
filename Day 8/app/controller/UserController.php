<?php
    require_once('connection.php');
    session_start();

    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $getProfile = "SELECT * FROM tb_user WHERE email='$email' AND password=MD5('$password')";
        $query = mysqli_query($conn, $getProfile);
        if(mysqli_num_rows($query) > 0){
            $profile = mysqli_fetch_assoc($query);
            $_SESSION['nama'] = $profile['nama'];
            $_SESSION['email'] = $profile['email'];
            $_SESSION['tlp'] = $profile['tlp'];
            $_SESSION['foto'] = $profile['foto'];
            echo "<script type='text/javascript'>alert('Berhasil Login');</script>";
            echo "<script>window.location.href='../pages/landing-page.php';</script>";
        }else{
            $error = "Data Tidak Ditemukan, silahkan coba lagi";
        }
    }elseif(isset($_GET['logout'])){
        echo "<script type='text/javascript'>alert('Berhasil Logout');</script>";
        echo "<script>window.location.href='../pages/landing-page.php';</script>";
        session_destroy();
    }elseif(isset($_POST['editProfile'])){
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $tlp = $_POST['tlp'];

        $target_dir = "../../../assets/uploads/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["foto"]["tmp_name"]);
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
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                // echo "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        // For Delete Foto
        $sqlGetFoto = "SELECT * FROM tb_user WHERE email='$email'";
        $query = mysqli_query($conn, $sqlGetFoto);
        $result = mysqli_fetch_assoc($query);
        $path = $result['foto'];
        unlink('../../../assets/'.$path);

        $update = "UPDATE tb_user SET name='$nama', email='$email', foto='$target_file', tlp='$tlp' WHERE email='$email'";
        mysqli_query($conn, $update);
        echo "<script type='text/javascript'>alert('Profile Berhasil Diedit');</script>";
        // echo "<script>window.location.href='../pages/profile.php';</script>";
    }
?>