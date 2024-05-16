<?php 
$conn = mysqli_connect('localhost', 'root', '', 'latihan-crud');

if(isset($_POST['filter'])){
    if($_POST['supplier'] != ''){
        $supplier = $_POST['supplier'];
        $data = mysqli_query($conn, "select * from penjualan inner join stok on penjualan.produk = stok.kode inner join supplier on stok.supplier = supplier.id where stok.supplier = '$supplier' order by penjualan.tanggal desc");
    }else{
        $data = mysqli_query($conn, 'select * from penjualan inner join stok on penjualan.produk = stok.kode inner join supplier on stok.supplier = supplier.id order by penjualan.tanggal desc');
    }
}else{
    $data = mysqli_query($conn, 'select * from penjualan inner join stok on penjualan.produk = stok.kode inner join supplier on stok.supplier = supplier.id order by penjualan.tanggal desc');
}

?>

<html>
    <head>
        <title>Data Transaksi Penjualan</title>
        <style>
            th, tr, td {
                padding: 10px;
            }
        </style>
    </head>
    <body>
        <h1>Data Transaksi Penjualan</h1>
        <a href="index.php">Kembali</a>
        <br><br>
        <form action="" method="post">
            <?php 
            $supplier = mysqli_query($conn, "select * from supplier");
            ?>
            <select name="supplier">
                <option value="">-- pilih supplier ---</option>
                <?php 
                foreach($supplier as $s){
                ?>
                <option value="<?=$s['id'];?>" <?= isset($_POST['supplier']) == $s['id'] ? 'selected' : ''?>><?=$s['nama_supplier'];?></option>
                <?php
                }
                ?>
            </select>
            <input type="submit" name="filter" value="Filter"><button><a href="cetak_penjualan.php" target="_blank">Cetak</a></button>
        </form>
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
    </body>
</html>