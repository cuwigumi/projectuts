<!-- <?php
$dsn = 'mysql:dbname=dbalbum;hosts=localhost';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, TRUE);
}catch(PDOException $e) {

}
?> -->

<?php
    $host = 'localhost';
    $dbname = 'dbalbum';
    $username = 'root';
    $password = '';

    try{
        $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "KONEKSI GAGAL: " . $e->getMessage();    
    }
?>