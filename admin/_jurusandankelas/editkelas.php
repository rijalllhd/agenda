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


$kodeKelas = $_GET["kodeKelas"];

// $sql = mysqli_query($db, "SELECT * FROM siswa WHERE kodeSiswa = '$_GET[kodeSiswa]'");
// $data = mysqli_fetch_array($sql);

$kelas = mysqli_query($db, "SELECT * FROM kelas WHERE kodeKelas='$_GET[kodeKelas]'");
$datakelas = mysqli_fetch_array($kelas);




// cek tombol uda diteken blm
if(isset($_POST["submit"])){


    // notif
    if (editkelas($_POST) > 0){
        echo "
        <script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'jurusandankelas.php';
        </script>";
    }else {
        echo "
        <script>
            alert('Data gagal ditambahkan!');
            document.location.href = 'jurusandankelas.php';
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
    <title>Form Edit Guru</title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
</head>
<body class="bg-secondary">

<div class="container mt-5 mb-5">
    <h1 class="text-white bg-primary p-3 m-0 rounded-top">Edit data guru</h1>
    <form action="" method="post" class="text-black bg-light p-3">
        <input type="hidden" name="kodeKelas" value="<?= $datakelas["kodeKelas"]?>">
        <div class="mb-3">
            <label for="namaKelas" class="form-label">Nama Kelas :</label>
            <input type="text" class="form-control" name="namaKelas" id="namaKelas" value="<?= $datakelas["namaKelas"]; ?>" placeholder="Masukkan nama kelas" required  >
        </div>
        <div class="d-grid gap-2 mb-2">
            <button class="btn btn-primary" type="submit" name="submit" id="submit">Simpan</button>
        </div>
        <div class="d-grid gap-2">
        <a class="btn btn-danger" type="button" href="jurusandankelas.php">Batal</a>
        </div>
    </form>
</div>

    
    
</body>
</html>