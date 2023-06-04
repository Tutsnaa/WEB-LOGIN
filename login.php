<?php
session_start();
if (isset($_SESSION['login_username'])){
    header("location:login_depan.php");
}
include("koneksi.php");
$username = "";
$password = "";
$err = "";
if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username == '' or $password == ''){
        $err .= "<a>Silahkan masukkan username dan password</a>";
    }
    if(empty($err)){
        $sql1 = "SELECT * FROM login where username = '$username'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);
        if($r1['password'] != md5($password)){
            $err .= "<a>Akun Tidak Ditemukan</a>";
        }
    }

    if(empty($err)){
        $id_login = $r1['id'];
        $sql1 = "SELECT * FROM login_akses WHERE id_login = '$id_login'";
        $q1 = mysqli_query($koneksi,$sql1);
        while($r1 = mysqli_fetch_array($q1)){
           $akses[] = $r1['id_akses']; //mahasiswa, jadwal, absen
        }
        if(empty($akses)){
            $err .= "<a>Kamu tidak punya akses ke halaman login</a>";
        }
    }

    if(empty($err)){
        $_SESSION['login_username'] = $username;
        $_SESSION['login_akses'] = $akses;
        header("location:login_depan.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Login</title>
    <link rel="stylesheet" href="style.css" />

    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;400;800&family=Quicksand:wght@700&family=Signika+Negative:wght@300;700&family=Ubuntu:ital,wght@1,700&display=swap"
        rel="stylesheet" />

    <!-- Feather icon -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <div id="app">
        <img src="img/STIKOM LOGO.png">
        <h1>LOGIN</h1>
        <?php
        if($err){
            echo "<ul>$err</ul>";
        }
        ?>
        <form action="" method="post">
            <input type="text" value="<?php echo $username ?>" name="username" class="input"
                placeholder="username" /><br>
            <input type="password" name="password" class="input" placeholder="password" /><br>
            <button type="sumbit" name="login">Log in</button>
        </form>
    </div>
    <script>
    feather.replace()
    </script>
</body>

</html>