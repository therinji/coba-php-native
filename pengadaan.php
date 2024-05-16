<?php 
$conn = mysqli_connect('localhost', 'root', '', 'latihan-crud');

if(isset($_POST['submit'])){
    $tanggal = $_POST['tanggal'];
    $kode = $_POST['kode'];
    $jumlah = $_POST['jumlah'];

    // cek stok sisa
    $query = mysqli_query($conn, "select * from stok where kode='$kode'");
    $produk = mysqli_fetch_assoc($query);
    $sisa_stok = $produk['stok'];

    // update stok terbaru
    $stok = $sisa_stok + $jumlah;

    $query = mysqli_query($conn, "update stok set stok='$stok' where kode='$kode'");
    if($query){
        mysqli_query($conn, "insert into pengadaan values('', '$kode', '$jumlah', '$tanggal')");
        echo "Sukses melakukan pengadaan";
    }else{
        echo "gagal melakukan pengadaan";
    }
}
?>

<html>
    <head>
        <title>Pengadaan Produk</title>
        <style>
            th, tr, td {
                padding: 10px;
            }

            .form-controll{
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <h1>Tambah Produk</h1>
        <a href="index.php">Kembali</a>
        <br><br>
        <form action="" method="post">
            <div class="form-controll">
                <label for="tanggal">Tanggal</label>
                <br>
                <input type="date" name="tanggal" required>
            </div>
            <div class="form-controll">
                <label for="kode">Kode</label>
                <br>
                <select name="kode" required>
                    <option value="">--- pilih produk ---</option>
                    <?php 
                    $produk = mysqli_query($conn, 'select * from stok inner join supplier on stok.supplier = supplier.id');
                    foreach($produk as $p){
                    ?>
                    <option value="<?=$p['kode'];?>"><?=$p['kode'];?> - <?=$p['nama'];?> | <?=$p['supplier'];?> | <?=$p['stok'];?> Box</option>
                    <?php    
                    }
                    ?>
                </select>
            </div>
            <div class="form-controll">
                <label for="jumlah">Jumlah</label>
                <br>
                <input type="number" name="jumlah" placeholder="Jumlah pengadaan" required>
            </div>
            <input type="submit" name="submit" value="Proses">
        </form>
    </body>
</html>