<?php
    $bidang = $_POST['pilihan'];
    $sisi = $_POST['sisi'];
    $tinggi = $_POST['tinggi'];

    switch($bidang){
        case "Lingkaran":
            $luas = 3.14 * $sisi ** 2;
            $keliling = 2 * 3.14 * $sisi;
            break;
        case "Persegi":
            $luas = $sisi * $sisi;
            $keliling = 4 * $sisi;
            break;
        case "Segitiga":
            $luas = ($sisi * $tinggi) / 2;
            $keliling =  2*$sisi+$tinggi;
        default:
            $luas = "Pilih bidang dulu";
            $keliling = "Pilih bidang dulu";
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
    <center><h1>Hitung Luas dan keliling</h1>
    <section style="padding:50px; margin-bottom:100px">
        <form action="" method="post">
            <label for="pilihan">Pilih Bidang datar</label>
            <select name="pilihan" id="pilihan">
                <option value="">---Bidang Datar---</option>
                <option value="Lingkaran">Lingkaran</option>
                <option value="Persegi">Persegi</option>
                <option value="Segitiga">Segitiga</option>
            </select><br><br>

            <input type="text" name="sisi" id="sisi" placeholder="masukan jari2 / sisi atau alas"><br>
            <input type="text" name="tinggi" id="tinggi" placeholder="masukan tinggi"><br>
            <button type="submit">Hitung</button>
        </form>

        <p>Ini Luas Bidang <?=$bidang." = ".$luas?></p>
        <p>Ini Keliling Bidang <?=$bidang." = ".$keliling?></p>
    </section>
    <section>
    <h1>Deret Fibonachi</h1>
        <?php
            $hasil = 1;
            $angka = 0;

            $output = "$angka $hasil";
            for($i=1; $i<=10; $i++){
                $deret = $angka + $hasil;
                $output = $output. " $deret";

                $angka = $hasil;
                $hasil = $deret;
            }

            echo $output;
        ?>
    </section>
    </center>
</body>
</html>