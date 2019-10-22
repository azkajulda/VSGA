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
    }
?>