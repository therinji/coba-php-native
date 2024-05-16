<?php 
$conn = mysqli_connect('localhost', 'root', '', 'latihan-crud');
$data = mysqli_query($conn, 'select * from penjualan inner join stok on penjualan.produk = stok.kode inner join supplier on stok.supplier = supplier.id order by penjualan.tanggal desc');
?>

<html>
    <head>
        <title>Cetak penjualan</title>
        <style>
            th, tr, td {
                padding: 10px;
            }
        </style>
    </head>
    <body>
        <h1>Data penjualan</h1>
        <br>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Supplier</th>
                <th>Jumlah</th>
            </tr>
            <?php 
            $i = 1;
            foreach($data as $d){
            ?>
            <tr>
                <td><?=$i++;?></td>
                <td><?=$d['tanggal'];?></td>
                <td><?=$d['kode'];?></td>
                <td><?=$d['nama'];?></td>
                <td><?=$d['nama_supplier'];?></td>
                <td><?=$d['jumlah'];?></td>
            </tr>


            <?php
            }
            ?>
        </table>
        <script>
            window.print();
        </script>
    </body>
</html>