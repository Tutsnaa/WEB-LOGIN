<?php 
include("header.php");
if(!in_array("Mahasiswa",$_SESSION['login_akses'])){
    echo "Kamu tidak punya akses";
    include("footer.php");
    exit();
}
?>
<h1>Mahasiswa</h1>
selamat datang di halaman Mahasiswa
<?php
include("footer.php");
?>