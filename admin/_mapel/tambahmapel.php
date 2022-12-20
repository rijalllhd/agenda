<?php
include '../../koneksi.php';

session_start();

$kodeAdmin = $_SESSION['kodeAdmin'];

if(!isset($kodeAdmin)){
   header('location:../../index.php');
};

if(isset($_GET['logout'])){
   unset($kodeGuru);
   session_destroy();
   header('location:../index.php');
}


// cek tombol uda diteken blm
if(isset($_POST["submit"])){


    // notif
    if (tambahmapel($_POST) > 0){
        echo "
        <script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'mapel.php';
        </script>";
    }else {
        echo "
        <script>
            alert('Data gagal ditambahkan!');
            document.location.href = 'mapel.php';
        </script>";
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Kelas</title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
</head>
<body class="bg-secondary">

<div class="container mt-5 mb-5">
    <h1 class="text-white bg-primary p-3 m-0 rounded-top">Tambah kelas</h1>
    <form action="" method="post" class="text-black bg-light p-3">
        <input type="hidden" name="kodeKelas" value="<?= $datakelas["kodeKelas"]?>">
        <div class="mb-3">
            <label for="inisialMapel" class="form-label">Kode Mapel :</label>
            <input type="text" class="form-control" name="inisialMapel" id="inisialMapel" placeholder="Contoh : MTK" required  >
        </div>
        <div class="mb-3">
            <label for="namaMapel" class="form-label">Nama Pelajaran :</label>
            <input type="text" class="form-control" name="namaMapel" id="namaMapel" placeholder="Contoh : Matematika" required  >
        </div>
        <div class="d-grid gap-2 mb-2">
            <button class="btn btn-primary" type="submit" name="submit" id="submit">Simpan</button>
        </div>
        <div class="d-grid gap-2">
        <a class="btn btn-danger" type="button" href="mapel.php">Batal</a>
        </div>
    </form>
</div>

    
    
</body>
</html>