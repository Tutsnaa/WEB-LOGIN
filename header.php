<?php
session_start();
include("koneksi.php");
if(!isset($_SESSION['login_username'])){
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="header.css">
</head>

<body>
    <div id="hlm-1">
        <nav>
            <ul>
                <li><a href="login_depan.php">Home</a></li>

                <?php if(in_array("Mahasiswa",$_SESSION['login_akses'])) { ?>
                <li><a href="login_Mahasiswa.php">Mahasiswa</a></li>
                <?php } ?>
                <?php if(in_array("Jadwal",$_SESSION['login_akses'])) { ?>
                <li><a href="login_Jadwal.php">Jadwal</a></li>
                <?php } ?>
                <?php if(in_array("Absensi",$_SESSION['login_akses'])) { ?>
                <li><a href="login_Absensi.php">Absensi</a></li>
                <?php } ?>

                <li><a href="logout.php">Logout >></a></li>
            </ul>
        </nav>