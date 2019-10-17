<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        td, th {
            padding:10px;
        }

        th {
            
        }
    </style>
</head>
<body>
    <center>
        <form action="" method="get">
            Cari : <input type="text" name="cari" id="cari">
            <button type="submit" name="submit1">Search</button><br><br>

            Group : 
            <select name="kategori" id="kategori">
                <option value="game console">Game Console</option>
                <option value="phone">Phone</option>
            </select>
            <button type="submit" name="submit2">Count</button>
        </form>
    </center>
    <br><br>    
</body>
</html>

<?php 

    $barang = array(array("barang"=>"ps4","kategori"=>"game console","harga"=>4500000),
    array("barang"=>"iphone X","kategori"=>"phone","harga"=>7500000),
    array("barang"=>"vivo v14","kategori"=>"phone","harga"=>3500000),
    array("barang"=>"nintendo switch","kategori"=>"game console","harga"=>4100000));

    // echo $barang[0]["barang"];

    echo "<center><table border='1' style='text-align:center;'>";
    echo "<tr><td>Barang</td><td>Kategori</td><td>Harga</td></tr>";

    if(isset($_GET['submit1']) && $_GET["cari"]!="")
    {
        $cari = $_GET["cari"];
        foreach ($barang as $search) {
            if(strchr($search["barang"], $cari) || strchr($search["kategori"], $cari) || strchr($search["harga"], $cari)){
                echo "<tr style='background-color:green;'><td>".$search["barang"]."</td>"."<td>".$search["kategori"]."</td>"."<td> Rp ".number_format($search["harga"],3)."</td>";
            }else{
                echo "<tr><td>".$search["barang"]."</td>"."<td>".$search["kategori"]."</td>"."<td> Rp ".number_format($search["harga"],3)."</td>";
            }
        }
    }else if(isset($_GET["submit2"])){
        $total = 0;
        foreach ($barang as $data) {
            if($_GET["kategori"]==$data["kategori"]){
                echo "<tr><td>".$data["barang"]."</td><td>".$data["kategori"]
			."</td><td>Rp ".number_format($data["harga"],3)."</td></tr>";
			$total+=$data['harga'];
            }
        }
        echo "<tr><td colspan='2' align='right'>Total : </td><td>Rp ".number_format($total,3)."</td></tr>";
    } else {
        foreach($barang as $data){
            echo "<tr><td>".$data["barang"]."</td><td>".$data["kategori"]
			."</td><td>".$data['harga']."</td></tr>";
        }
    }
    echo "</table></center>";
?>