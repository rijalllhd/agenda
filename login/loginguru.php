<?php

include '../koneksi.php';

session_start();
if(isset($_POST['submit'])){

    $notelp = mysqli_real_escape_string($db, $_POST['notelp']);
    $password = mysqli_real_escape_string($db, ($_POST['password']));
 
    $select = mysqli_query($db, "SELECT * FROM guru WHERE noTelp = '$notelp' AND password = '$password'") or die('query failed');
 
    if(mysqli_num_rows($select) > 0){
       $row = mysqli_fetch_assoc($select);
       $_SESSION['kodeGuru'] = $row['kodeGuru'];
       header("location:../guru/dashboard.php");
    }else{
        header("location:../index.php?notif=gagal");  
    }
 
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="login.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Guru</title>
</head>
<body>
    <?php 
        if (isset($_GET['notif'])) {
            if ($_GET['notif'] == "gagal");
                echo "
            <script>
                alert('login gagal');
                document.location.href = '../index.php';
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
                <a href="loginadmin.php" type="button" class="cta">Admin</a>
                <a href="loginguru.php" type="button" class="cta">Guru</a>
            </div>
        </div>


        <div class="wrapper" id="wrapper">
            <button type="button" class="cancel" ><a href="../index.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="blue" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z">
                </svg></a>
            </button>
            <div class="logo">
                <img src="../logo.png" alt="">
            </div>
            <form action="" method="post" class="p-3 mt-3" enctype="multipart/form-data">
                <div class="form-field d-flex align-items-center">
                    <span class="far fa-user"></span>
                    <label for="notelp"></label>
                    <input type="number" name="notelp" id="notelp" placeholder="No Telepon">
                </div>
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-key"></span>
                    <label for="password"></label>
                    <input type="password" name="password" id="password" placeholder="Password">
                </div>
                <button type="submit" name="submit" class="btn mt-3">Login</button>
            </form>
        </div>
    </section>


    <script>

    const wrapper = document.querySelector('.wrapper');

    window.addEventListener('load',() => {
        wrapper.classList.add('showwrapper');
        wrapper.childNodes[1].classList.add('showwrapper');
    })

    

    </script>


</body>
</html>