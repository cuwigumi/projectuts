<?php
    require_once 'dbkoneksi.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM pesanan WHERE id = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $tgl = $_POST['tanggal'];
        $np = $_POST['nama_pemesan'];
        $ap = $_POST['alamat_pemesan'];
        $nh = $_POST['no_hp'];
        $email = $_POST['email'];
        $jp = $_POST['jumlah_pesanan'];
        $desk = $_POST['deskripsi'];
        $pdi = $_POST['produk_id'];
        
        $sql = "UPDATE pesanan SET tanggal = :tanggal, nama_pemesan = :nama_pemesan, alamat_pemesan = :alamat_pemesan, no_hp = :no_hp,
                        email = :email,  jumlah_pesanan = :jumlah_pesanan, deskripsi = :deskripsi, produk_id = :produk_id WHERE id = :id";

        $stmt = $dbh->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':tanggal', $tgl);
        $stmt->bindParam(':nama_pemesan', $np);
        $stmt->bindParam(':alamat_pemesan', $ap);
        $stmt->bindParam(':no_hp', $nh);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':jumlah_pesanan', $jp);
        $stmt->bindParam(':deskripsi', $desk);
        $stmt->bindParam(':produk_id', $pdi);

        $stmt->execute();

        header('Location: payment.php');


    }

  
?>

<?php
    require_once 'dbkoneksi.php';

    $sqlprd = "SELECT * FROM produk";
    $rowprd = $dbh->prepare($sqlprd);
    $rowprd->execute();
?>


<form method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <label>Date</label>
    <input type="date" name="tanggal" value="<?php echo $row['tanggal']; ?>">
    <br>
    <label>Nama</label>
    <input type="text" name="nama_pemesan" value="<?php echo $row['nama_pemesan']; ?>">
    <br>
    <label>Alamat</label>
    <input type="text" name="alamat_pemesan" value="<?php echo $row['alamat_pemesan']; ?>">
    <br>
    <label>No. Telepon</label>
    <input type="text" name="no_hp" value="<?php echo $row['no_hp']; ?>">
    <br>
    <label>Email</label>
    <input type="email" name="email" value="<?php echo $row['email']; ?>">
    <br>
    <label>Total</label>
    <input type="number" name="jumlah_pesanan" value="<?php echo $row['jumlah_pesanan']; ?>">
    <br>
    <label>Packing</label>
    <input type="text" name="deskripsi" value="<?php echo $row['deskripsi']; ?>">
    <br>


    <label>No. Produk</label>
    <select name="produk_id" id="produk_id">
        <?php
            while($prd = $rowprd->fetch(PDO::FETCH_ASSOC)){              
        ?>
            <option value="<?= $prd['id'] ?>">         <?= $prd ['kode']  ?>          </option>
        <?php
            }
        ?>


    </select>
    

    <br>
    <button class="" type="submit" name="submit">Save</button>
</form>