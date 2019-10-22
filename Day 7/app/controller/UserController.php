<?php
    require_once('connection.php');
    session_start();

    if(isset($_POST['login'])){
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];

        $getProfile = "SELECT * FROM users WHERE nim='$nim' AND nama='$nama'";
        $query = mysqli_query($conn, $getProfile);
        if(mysqli_num_rows($query) > 0){
            $profile = mysqli_fetch_assoc($query);

            $_SESSION['nama'] = $profile['nama'];
            $_SESSION['tempat_lahir'] = $profile['tempat_lahir'];
            $_SESSION['jenis_kelamin'] = $profile['jenis_kelamin'];
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
    }
?>