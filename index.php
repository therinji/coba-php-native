<?php 
$conn = mysqli_connect('localhost', 'root', '', 'latihan-crud');
$data = mysqli_query($conn, 'select * from stok inner join supplier on stok.supplier = supplier.id');
?>

<html>
    <head>
        <title>Data stok</title>
        <style>
            th, tr, td {
                padding: 10px;
            }
        </style>
    </head>
    <body>
        <h1>Data stok produk</h1>
        <a href="pengadaan.php">[Pengadaan]</a>
        <a href="penjualan.php">[Penjualan]</a>
        <a href="laporan_pengadaan.php">[laporan Pengadaan]</a>
        <a href="laporan_penjualan.php">[laporan Penjualan]</a>
        <br>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Supplier</th>
                <th>Stok</th>
            </tr>
            <?php 
            $i = 1;
            foreach($data as $d){
            ?>
            <tr>
                <td><?=$i++;?></td>
                <td><?=$d['kode'];?></td>
                <td><?=$d['nama'];?></td>
                <td><?=$d['nama_supplier'];?></td>
                <td><?=$d['stok'];?></td>
            </tr>


            <?php
            }
            ?>
        </table>
    </body>
</html>