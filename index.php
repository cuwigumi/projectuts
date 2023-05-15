<?php
include_once 'dbkoneksi.php';


include_once('navbar.php');

$hal = $_REQUEST['hal'];

if(!empty($hal)){
    include_once $hal.'.php';
}else{
    include_once 'home.php';
}
include_once('footer.php');
?>