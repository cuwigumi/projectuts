<?php
    require_once 'dbkoneksi.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM produk WHERE id = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $hj = $_POST['harga_jual'];
        $hb = $_POST['harga_beli'];
        $stok = $_POST['stok']; 
        $ms = $_POST['min_stok'];
        $desk = $_POST['deskripsi'];
        $kpi = $_POST['kategori_produk_id'];

        $sql = "UPDATE produk SET kode = :kode, nama = :nama, harga_jual = :harga_jual, harga_beli = :harga_beli,
                        stok = :stok,  min_stok = :min_stok, deskripsi = :deskripsi, kategori_produk_id = :kategori_produk_id WHERE id = :id";

        $stmt = $dbh->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':kode', $kode);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':harga_jual', $hj);
        $stmt->bindParam(':harga_beli', $hb);
        $stmt->bindParam(':stok', $stok);
        $stmt->bindParam(':min_stok', $ms);
        $stmt->bindParam(':deskripsi', $desk);
        $stmt->bindParam(':kategori_produk_id', $kpi);

        $stmt->execute();

        header('Location: booking.php');


    }

  
?>

<?php
    require_once 'dbkoneksi.php';

    $sqlktgr = "SELECT * FROM kategori_produk";
    $rowktgr = $dbh->prepare($sqlktgr);
    $rowktgr->execute();
?>


<form method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <label>Kode</label>
    <input type="text" name="kode" value="<?php echo $row['kode']; ?>">
    <br>
    <label>Nama</label>
    <input type="text" name="nama" value="<?php echo $row['nama']; ?>">
    <br>
    <label>Harga</label>
    <input type="text" name="harga_jual" value="<?php echo $row['harga_jual']; ?>">
    <br>
    <label>Total Harga</label>
    <input type="text" name="harga_beli" value="<?php echo $row['harga_beli']; ?>">
    <br>
    <label>stok</label>
    <input type="number" name="stok" value="<?php echo $row['stok']; ?>">
    <br>
    <label>Minimal Stok</label>
    <input type="number" name="min_stok" value="<?php echo $row['min_stok']; ?>">
    <br>
    <label>Deskripsi</label>
    <input type="text" name="deskripsi" value="<?php echo $row['deskripsi']; ?>">
    <br>


    <label>Kategori</label>
    <select name="kategori_produk_id" id="kategori_produk_id">
        <?php
            while($ktgr = $rowktgr->fetch(PDO::FETCH_ASSOC)){              
        ?>
            <option value="<?= $ktgr['id'] ?>">         <?= $ktgr ['nama']  ?>          </option>
        <?php
            }
        ?>


    </select>
    

    <br>
    <button class="" type="submit" name="submit">Save</button>
</form>