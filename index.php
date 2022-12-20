<?php

require 'koneksi.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="landing.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
</head>
<body>
    <?php 
        if (isset($_GET['notif'])) {
            if ($_GET['notif'] == "gagal");
                echo "
            <script>
                alert('login gagal');
                document.location.href = 'index.php';
            </script> 
            ";
        }
    ?>
    <section id="hero">
        <div class="hero container">
            <div>
                <h1>Selamat Datang Di<span></span></h1>
                <h1>Agenda Of <span></span></h1>
                <h1>SKIELL <span></span></h1>
                <a href="login/loginadmin.php" type="button" class="cta" >Admin</a>
                <a href="login/loginguru.php" type="button" class="cta" >Guru</a>
            </div>
        </div>

    </section>







</body>
</html>