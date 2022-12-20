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


$kodeGuru = $_GET["kodeGuru"];

// $sql = mysqli_query($db, "SELECT * FROM siswa WHERE kodeSiswa = '$_GET[kodeSiswa]'");
// $data = mysqli_fetch_array($sql);

$guru = mysqli_query($db, "SELECT * FROM guru WHERE kodeGuru='$_GET[kodeGuru]'");
$dataguru = mysqli_fetch_array($guru);


$query1 = "SELECT * FROM  mapel";
$result1 = mysqli_query($db, $query1);

// cek tombol uda diteken blm
if(isset($_POST["submit"])){


    // notif
    if (editguru($_POST) > 0){
        echo "
        <script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'dataguru.php';
        </script>";
    }else {
        echo "
        <script>
            alert('Data gagal ditambahkan!');
            document.location.href = 'dataguru.php';
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
    <form action="" method="post" enctype="multipart/form-data" class="text-black bg-light p-3" >
        <input type="hidden" name="kodeGuru" value="<?= $dataguru["kodeGuru"]?>">
        <input type="hidden" name="fotoLama" value="<?= $dataguru["fotoGuru"]?>">
        <div class="mb-3">
            <label for="namaGuru" class="form-label">Nama Guru :</label>
            <input type="text" class="form-control" name="namaGuru" id="namaGuru" value="<?= $dataguru["namaGuru"]; ?>" placeholder="Masukkan nama guru" required  >
        </div>
        <div class="mb-3">
            <label for="inisialGuru" class="form-label">Inisial Guru :</label>
            <input type="text" class="form-control" name="inisialGuru" id="inisialGuru" value="<?= $dataguru["inisialGuru"]; ?>" placeholder="Maasukkan inisial guru" >
        </div>
        <label for="jenisKelamin" class="form-label">Jenis Kelamin :</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenisKelamin" id="jenisKelamin" value="Laki-Laki" checked>
                <label class="form-check-label" for="lakiLaki">
                    Laki-laki
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenisKelamin" id="jenisKelamin" value="Perempuan">
                <label class="form-check-label mb-3" for="Perempuan">
                    Perempuan
                </label>
            </div>
        <div class="mb-3">
            <label for="kodeMapel" class="form-label">Mata Pelajaran :</label>
            <select class="form-select" aria-label="Default select example" name="kodeMapel" id="kodeMapel">
                <?php while ($row1 = mysqli_fetch_array($result1)) : ?>
                    <option value="<?php echo $row1[0]; ?>"><?php echo $row1[1]; ?></option>
                <?php endwhile; ?>
            </select>
        </div>    
        <div class="mb-3">
            <label for="noTelp" class="form-label">No Telepon :</label>
            <input type="text" class="form-control" name="noTelp" id="noTelp" value="<?= $dataguru["noTelp"]; ?>" placeholder="Masukkan no telepon">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password :</label>
            <input type="text" class="form-control" name="password" id="password" value="<?= $dataguru["password"]; ?>" placeholder="Masukkan password">
        </div>
        <div class="mb-0">
            <label for="fotoGuru" class="form-label">Foto Guru</label>
        </div>
        <div class="mb-4">
            <img src="fotoguru/<?php echo $dataguru["fotoGuru"];?>" alt="" class="rounded float-start" style="width: 200px;">
            <input class="form-control" type="file" name="fotoGuru" id="fotoGuru" value="">
        </div>
        <div class="d-grid gap-2 mb-2">
            <button class="btn btn-primary" type="submit" name="submit" id="submit">Simpan</button>
        </div>
        <div class="d-grid gap-2">
        <a class="btn btn-danger" type="button" href="dataguru.php">Batal</a>
        </div>
    </form>
</div>

    
    
</body>
</html>