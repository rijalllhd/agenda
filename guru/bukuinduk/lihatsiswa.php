<?php
include '../../koneksi.php';


session_start();

$kodeGuru = $_SESSION['kodeGuru'];

if(!isset($kodeGuru)){
   header('location:../login/loginguru.php');
};


if(isset($_GET['logout'])){
    unset($kodeGuru);
    session_destroy();
    header('location:../index.php');
 }

$kodeSiswa = $_GET["kodeSiswa"];

// $sql = mysqli_query($db, "SELECT * FROM siswa WHERE kodeSiswa = '$_GET[kodeSiswa]'");
// $data = mysqli_fetch_array($sql);

$siswa = mysqli_query($db, "SELECT * FROM siswa WHERE kodeSiswa='$_GET[kodeSiswa]'");
$data = mysqli_fetch_array($siswa);


// cek tombol uda diteken blm
if(isset($_POST["submit"])){


    // notif
    if (edit($_POST) > 0){
        echo "
        <script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'datasiswa.php';
        </script>";
    }else {
        echo "
        <script>
            alert('Data gagal ditambahkan!');
            document.location.href = 'datasiswa.php';
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
    <title>Form Data Siswa</title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
</head>
<body class="bg-secondary">

<div class="container mt-5 mb-5">
    <h1 class="text-white bg-primary p-3 m-0 rounded-top">Data Siswa</h1>
    <form action="" method="post" class="text-black bg-light p-3">
        <input type="hidden" name="kodeSiswa" value="<?= $data["kodeSiswa"]?>">
        <div class="mb-3">
            <label for="namaSiswa" class="form-label">Nama Siswa : <?= $data["namaSiswa"]; ?></label>
            
        </div>
        <div class="mb-3">
            <label for="nis" class="form-label">NIS :<?= $data["nis"]; ?></label>
        </div>
        <div class="mb-3">
            <label for="kodeKelas" class="form-label">Kelas :<?= $data["kodeKelas"]; ?></label>
        </div>
        <div class="mb-3">
            <label for="ttl" class="form-label">Tanggal Lahir : <?= $data["ttl"]; ?></label>
        </div>
        <div class="mb-3">
            <label for="agama" class="form-label">Agama : <?= $data["agama"]; ?></label>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat : <?= $data["alamat"]; ?></label>
        </div>
        <div class="mb-3">
            <label for="jenisKelamin" class="form-label" >Jenis Kelamin : <?= $data["jenisKelamin"]; ?></label>
        </div>
        <div class="mb-3">
            <label for="golDarah" class="form-label">Golongan Darah : <?= $data["golDarah"]; ?></label>
        </div>
        <div class="mb-3">
            <label for="asalSekolah" class="form-label">Asal Sekolah : <?= $data["asalSekolah"]; ?></label>
        </div>
        <div class="mb-3">
            <label for="noIjazah" class="form-label">No Ijazah : <?= $data["noIjazah"]; ?></label>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="tb" class="form-label">Tinggi Badan : <?= $data["tb"]; ?></label>
            </div>
            <div class="col">
                <label for="bb" class="form-label">Berat Badan : <?= $data["bb"]; ?></label>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="namaAyah" class="form-label">Nama Ayah : <?= $data["namaAyah"]; ?></label>
            </div>
            <div class="col">
                <label for="namaIbu" class="form-label">Nama Ibu : <?= $data["namaIbu"]; ?></label>
            </div>
        </div>
        <div class="mb-3">
            <label for="fotoGuru" class="form-label">Foto Siswa :</label>
        </div>
        <div class="mb-4">
            <img src="../../admin/_datasiswa/fotosiswa/<?php echo $data["foto"];?>" alt="" class="rounded" style="width: 200px; ">
        </div>
        <div class="d-grid gap-2">
            <a class="btn btn-primary" type="button" href="bukuinduk.php">Kembali</a>
        </div>
    </form>
</div>

    
    
</body>
</html>