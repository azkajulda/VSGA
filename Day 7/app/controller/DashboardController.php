<?php
if(isset($_POST['save'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $gender = $_POST['gender'];
    $fakultas = $_POST['jurusan'];

    $target_dir = "uploads/";
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

    $sql = "INSERT INTO t_mahasiswa (nim, nama, kelas, jk, fakultas, foto) VALUES ('$nim', '$nama', '$kelas', '$gender', '$fakultas', '$target_file')";
    mysqli_query($conn,$sql);
    echo "<script type='text/javascript'>alert('Berhasil Menambah Data');</script>";
}elseif(isset($_POST['delete'])){
    $id = $_POST['delete'];

    //Delete foto local
    // $sqlGetFotoDel = "SELECT * FROM t_mahasiswa WHERE id='$id'";
    // $queryDel = mysqli_query($conn, $sqlGetFotoDel);
    // $resultDel = mysqli_fetch_assoc($queryDel);
    // $pathDel = $resultDel['foto'];
    // unlink($pathDel);

    $sql = "DELETE FROM t_mahasiswa WHERE id = '$id'";
    mysqli_query($conn, $sql);
    echo "<script type='text/javascript'>alert('Data telah terhapus');</script>";
}elseif(isset($_POST['edit'])){
    $id = $_POST['edit'];
    
    $sql = "SELECT * FROM t_mahasiswa WHERE id = '$id'";
    $data_mhs = mysqli_query($conn, $sql);
}elseif(isset($_POST['update'])){
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $gender = $_POST['gender'];
    $fakultas = $_POST['jurusan'];

    $target_dir = "uploads/";
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
    $sqlGetFoto = "SELECT * FROM t_mahasiswa WHERE id='$id'";
    $query = mysqli_query($conn, $sqlGetFoto);
    $result = mysqli_fetch_assoc($query);
    $path = $result['foto'];
    unlink($path);
    
    $sql = "UPDATE t_mahasiswa SET nim='$nim', nama='$nama', kelas='$kelas', jk='$gender', fakultas='$fakultas', foto='$target_file' WHERE id='$id'";
    mysqli_query($conn, $sql);
    echo "<script type='text/javascript'>alert('Data telah teredit');</script>";
}
?>