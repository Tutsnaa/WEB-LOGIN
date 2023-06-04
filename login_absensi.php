<?php 
include("header.php");
if(!in_array("Absensi",$_SESSION['login_akses'])){
    echo "Kamu tidak punya akses";
    include("footer.php");
    exit();
}
?>
<h1>Absensi</h1>
selamat datang di halaman Absensi
<?php
include("footer.php");
?>