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


$kodeSiswa = $_GET["kodeSiswa"];

$siswa = mysqli_query($db, "SELECT * FROM siswa WHERE kodeSiswa='$_GET[kodeSiswa]'");
$datasiswa = mysqli_fetch_array($siswa);

$query1 = "SELECT * FROM  kelas";
$result1 = mysqli_query($db, $query1);


// cek tombol uda diteken blm
if(isset($_POST["submit"])){
    // notif
    if (editsiswa($_POST) > 0){
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
    <title>Form Edit Siswa</title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
</head>
<body class="bg-secondary">

<div class="container mt-5 mb-5">
    <h1 class="text-white bg-primary p-3 m-0 rounded-top">Edit data</h1>
    <form action="" method="post" enctype="multipart/form-data" class="text-black bg-light p-3">
        <input type="hidden" name="kodeSiswa" value="<?= $datasiswa["kodeSiswa"]?>">
        <input type="hidden" name="fotoLamas" value="<?= $datasiswa["foto"]?>">
        <div class="mb-3">
            <label for="namaSiswa" class="form-label">Nama Siswa :</label>
            <input type="text" class="form-control" name="namaSiswa" id="namaSiswa" value="<?= $datasiswa["namaSiswa"]; ?>" placeholder="Masukkan nama siswa" required  >
        </div>
        <div class="mb-3">
            <label for="nis" class="form-label">NIS :</label>
            <input type="text" class="form-control" name="nis" id="nis" value="<?= $datasiswa["nis"]; ?>" placeholder="Maasukkan NIS" >
        </div>
        <div class="mb-3">
            <label for="kodeKelas" class="form-label">Kelas :</label>
            <select class="form-select" aria-label="Default select example" name="kodeKelas" id="kodeKelas">
                <?php while ($row1 = mysqli_fetch_array($result1)) : ?>
                    <option value="<?php echo $row1[0]; ?>"><?php echo $row1[1]; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="ttl" class="form-label">Tanggal Lahir :</label>
            <input type="date" class="form-control" name="ttl" id="ttl" value="<?= $datasiswa["ttl"]; ?>" placeholder="Masukkan tempat, tanggal lahir">
        </div>
        <div class="mb-3">
            <label for="agama" class="form-label">Agama :</label>
            <input type="text" class="form-control" name="agama" id="agama" value="<?= $datasiswa["agama"]; ?>" placeholder="Masukkan agama">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat :</label>
            <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $datasiswa["alamat"]; ?>" placeholder="Masukkan alamat">
        </div>
        <label for="jenisKelamin" class="form-label" value="<?= $datasiswa["jenisKelamin"]; ?>">Jenis Kelamin :</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenisKelamin" id="jenisKelamin" value="<?= $datasiswa["jenisKelamin"]; ?>" checked="<?= $datasiswa["jenisKelamin"]; ?>">
                <label class="form-check-label" for="lakiLaki">
                    Laki-laki
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenisKelamin" id="jenisKelamin" value="<?= $datasiswa["jenisKelamin"]; ?>" checked="<?= $datasiswa["jenisKelamin"]; ?>">
                <label class="form-check-label mb-3" for="Perempuan">
                    Perempuan
                </label>
            </div>
        <div class="mb-3">
            <label for="golDarah" class="form-label">Golongan Darah :</label>
            <input type="text" class="form-control" name="golDarah" id="golDarah" value="<?= $datasiswa["golDarah"]; ?>" placeholder="Masukkan golongan darah">
        </div>
        <div class="mb-3">
            <label for="asalSekolah" class="form-label">Asal Sekolah : </label>
            <input type="text" class="form-control" name="asalSekolah" id="asalSekolah" value="<?= $datasiswa["asalSekolah"]; ?>" placeholder="Masukkan asal sekolah">
        </div>
        <div class="mb-3">
            <label for="noIjazah" class="form-label">No Ijazah :</label>
            <input type="text" class="form-control" name="noIjazah" id="noIjazah" value="<?= $datasiswa["noIjazah"]; ?>" placeholder="Masukkan no ijazah">
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="tb" class="form-label">Tinggi Badan :</label>
                <input type="text" class="form-control" name="tb" id="tb" value="<?= $datasiswa["tb"]; ?>" placeholder="Massukan tinggi badan" aria-label="tb">
            </div>
            <div class="col">
                <label for="bb" class="form-label">Berat Badan :</label>
                <input type="text" class="form-control" name="bb" id="bb" value="<?= $datasiswa["bb"]; ?>" placeholder="Masukkan berat badan" aria-label="bb">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="namaAyah" class="form-label">Nama Ayah :</label>
                <input type="text" class="form-control" name="namaAyah" id="namaAyah" value="<?= $datasiswa["namaAyah"]; ?>" placeholder="" aria-label="namaAyah">
            </div>
            <div class="col">
                <label for="namaIbu" class="form-label">Nama Ibu :</label>
                <input type="text" class="form-control" name="namaIbu" id="namaIbu" value="<?= $datasiswa["namaIbu"]; ?>" placeholder="" aria-label="namaIbu">
            </div>
        </div>
        <div class="mb-0">
            <label for="fotoGuru" class="form-label">Foto Siswa :</label>
        </div>
        <div class="mb-4">
            <img src="fotosiswa/<?php echo $datasiswa["foto"];?>" alt="" class="rounded float-start" style="width: 200px;">
            <input class="form-control" type="file" name="foto" id="foto" value="">
        </div>
        <div class="d-grid gap-2 mb-2">
            <button class="btn btn-primary" type="submit" name="submit" id="submit">Simpan</button>
        </div>
        <div class="d-grid gap-2">
        <a class="btn btn-danger" type="button" href="datasiswa.php">Batal</a>
        </div>
    </form>
</div>

    
    
</body>
</html>