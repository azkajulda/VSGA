<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        td{
            padding:10px;
        }
    </style>
</head>
<body>
    <center>
        <h1>Data Barang</h1>
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
        <table border="1">
            <tr>
                <th>No</th>
                <th>Barang</th>
                <th>Kategori</th>
                <th>Harga</th>
            </tr>
            <?php
                 $host = "localhost";
                 $username = "root";
                 $password = "";
                 $database = "db_retail";
             
                $koneksi = mysqli_connect($host, $username, $password, $database);
                $no = 1;
                $barang = mysqli_query($koneksi, "SELECT t_barang.nama_barang, t_kategori.nama_kategori, t_barang.harga FROM t_kategori JOIN t_barang ON t_kategori.id=t_barang.id_kategori");
                // foreach ($barang as $data) {
                //     echo "<tr>
                //             <td>$no</td>
                //             <td>".$data['nama_barang']."</td>
                //             <td>".$data['nama_kategori']."</td>
                //             <td>".$data['harga']."</td>
                //             </tr>";
                //     $no++;
                // }

                if(isset($_GET['submit1']) && $_GET["cari"]!="")
                {
                    $cari = $_GET["cari"];
                    foreach ($barang as $search) {
                        if(strchr($search["nama_barang"], $cari) || strchr($search["nama_kategori"], $cari) || strchr($search["harga"], $cari)){
                            echo "<tr style='background-color:green;'><td>".$no."</td><td>".$search["nama_barang"]."</td>"."<td>".$search["nama_kategori"]."</td>"."<td> Rp ".number_format($search["harga"],3)."</td>";
                        }else{
                            echo "<tr><td>".$no."</td><td>".$search["nama_barang"]."</td>"."<td>".$search["nama_kategori"]."</td>"."<td> Rp ".number_format($search["harga"],3)."</td>";
                        }
                        $no++;
                    }
                }else if(isset($_GET["submit2"])){
                    $total = 0;
                    foreach ($barang as $data) {
                        if($_GET["nama_kategori"]==$data["nama_kategori"]){
                            echo "<tr><td>".$data["nama_barang"]."</td><td>".$data["nama_kategori"]
                        ."</td><td>Rp ".number_format($data["harga"],3)."</td></tr>";
                        $total+=$data['harga'];
                        }
                    }
                    echo "<tr><td colspan='2' align='right'>Total : </td><td>Rp ".number_format($total,3)."</td></tr>";
                } else {
                    foreach($barang as $data){
                        echo "<tr><td>".$no."</td>  <td>".$data["nama_barang"]."</td><td>".$data["nama_kategori"]
                        ."</td><td>".$data['harga']."</td></tr>";
                        $no++;
                    }
                }
            ?>
        </table>
    </center>
</body>
</html>