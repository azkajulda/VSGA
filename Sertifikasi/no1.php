<?php
    if(isset($_POST['angka'])){
        $angka = $_POST['angka'];
        $pecah_angka = str_split($angka);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <center><h1>Pemrograman Dasar</h1>
    <form action="" method="post">
        <input type="number" name="angka" id="angka">
        <button type="submit">Process</button>
    </form>
    <br>
    <?php
    if(isset($_POST['angka'])) {
        echo "<p>Data yang dinputkan :" . $angka . "</p>";
        echo "<p>Hasil : </p>";
//        $satu = 0;
//        $dua = 0;
//        $tiga = 0;
//        $empat = 0;
//        $lima = 0;
//        $enam = 0;
//        $tujuh = 0;
//        $delapan = 0;
//        $sempbilan = 0;
//        $nol = 0;
        $hasil = array(0,0,0,0,0,0,0,0,0,0);
        for ($i = 0; $i < count($pecah_angka); $i++) {
//            echo $pecah_angka[$i];
            switch ($pecah_angka[$i]) {
                case 1:
//                    $satu++;
                    $hasil[1]++;
                    break;
                case 2:
//                    $dua++;
                    $hasil[2]++;
                    break;
                case 3:
//                    $tiga++;
                    $hasil[3]++;
                    break;
                case 4:
//                    $empat++;
                    $hasil[4]++;
                    break;
                case 5:
//                    $lima++;
                    $hasil[5]++;
                    break;
                case 6:
//                    $enam++;
                    $hasil[6]++;
                    break;
                case 7:
//                    $tujuh++;
                    $hasil[7]++;
                    break;
                case 8:
//                    $delapan++;
                    $hasil[8]++;
                    break;
                case 9:
//                    $sempbilan++;
                    $hasil[9]++;
                    break;
                default:
//                    $nol++;
                    $hasil[0]++;
            }
        }
        echo "1 : ".$hasil[1]."<br>";
        echo "2 : ".$hasil[2]."<br>";
        echo "3 : ".$hasil[3]."<br>";
        echo "4 : ".$hasil[4]."<br>";
        echo "5 : ".$hasil[5]."<br>";
        echo "6 : ".$hasil[6]."<br>";
        echo "7 : ".$hasil[7]."<br>";
        echo "8 : ".$hasil[8]."<br>";
        echo "9 : ".$hasil[9]."<br>";
        echo "0/null : ".$hasil[0]."<br>";

        $namafile = "hasil.txt";
        $isi      = trim(
            "Data yang dinputkan :" .$angka." 
            Hasil : 
                 1 : ".$hasil[1]."
                 2 : ".$hasil[2]."
                 3 : ".$hasil[3]."
                 4 : ".$hasil[4]."
                 5 : ".$hasil[5]."
                 6 : ".$hasil[6]."
                 7 : ".$hasil[7]."
                 8 : ".$hasil[8]."
                 9 : ".$hasil[9]."
                 0/null : ".$hasil[0]);
        $file = fopen($namafile,"w");
        fwrite($file,$isi);
        fclose($file);

    }
    ?>
    </center>
</body>
</html>