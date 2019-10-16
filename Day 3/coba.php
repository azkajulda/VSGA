<?php
    $a = 10;
    $b = 20;
    $hasil = $a * $b;
    $hasil++;
    ++$hasil;
    2+$hasil;

    echo '<h1>Hello Word</h1>'.$hasil."<br>";

    for($i=1; $i<=5; $i++){
        $ganjilAtauGenap = $i % 2;
        switch($ganjilAtauGenap){
            case 0:
                echo "Ini Bilangan Genap ".$i."<br>";
                break;
            default:
                echo "Ini Bilangan Ganjil ".$i."<br>";
                break;
        }
    }

    if($a > 10){
        $angka = "Angka Lebih Besar dari 10";
    }else {
        $angka = "Angka Lebih kecil atau sama dengan 10";
    }

    $nilai = $_GET['nilai'];
    echo $nilai;

    if($nilai <= 0){
        $index = "inputan anda bukan angka";
    }elseif($nilai < 40.01){
        $index = "E";
    }elseif($nilai >= 40 && $nilai < 50){
        $index = "D";
    }elseif($nilai >= 50 && $nilai < 60){
        $index = "C";
    }elseif($nilai >= 60 && $nilai < 65){
        $index = "BC";
    }elseif($nilai >= 65 && $nilai <= 70){
        $index = "B";
    }elseif($nilai > 70 && $nilai <= 80){
        $index = "AB";
    }elseif($nilai > 80 && $nilai <= 100){
        $index = "A";
    }else{
        $index = "Nilai anda tidak valid";
    }
    
    $c = "Azka";
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
<h1><?=$angka?></h1>
    <section style="text-align:center;">    
        <form action="" method="get">
            Masukan Nilai anda <input type="text" name="nilai" id="">
        </form>
        <br>
        Ini Index Nilai Anda <?="<h2>".$index."</h2>"?>
    </section>
</body>
</html>