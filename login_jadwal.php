<?php 
include("header.php");
if(!in_array("Jadwal",$_SESSION['login_akses'])){
    echo "Kamu tidak punya akses";
    include("footer.php");
    exit();
}
?>
<h1>Jadwal</h1>
selamat datang di halaman Jadwal
<?php
include("footer.php");
?>