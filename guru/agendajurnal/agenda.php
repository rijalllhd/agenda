<?php
include '../../koneksi.php';


session_start();

$kodeGuru = $_SESSION['kodeGuru'];

if(!isset($kodeGuru)){
   header('location:../../index.php');
}


if(isset($_GET['logout'])){
    unset($kodeGuru);
    session_destroy();
    header('location:../index.php');
 }
 

$select = mysqli_query($db, "SELECT * FROM guru WHERE kodeGuru = '$kodeGuru'") or die('query failed');
if(mysqli_num_rows($select) > 0){
    $fetch = mysqli_fetch_assoc($select);
}



$query10 = "SELECT * FROM  mapel";
$result10 = mysqli_query($db, $query10);

$query11 = "SELECT * FROM  jampelajaran";
$result11 = mysqli_query($db, $query11);

$query01 = "SELECT * FROM  kelas";
$result01 = mysqli_query($db, $query01);

$query50 = "SELECT * FROM  guru";
$result50 = mysqli_query($db, $query50);


if(isset($_POST["submit"])){

    // notif
    if (tambahagenda($_POST) > 0){
        echo "
        <script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'agenda.php';
        </script>";
    }else {
        echo "
        <script>
            alert('Data gagal ditambahkan!');
        </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Of SKIELL</title>

</head>
<body>
   
    <div class="wrapper">
        <div class="section">
            <div class="top_navbar">
                <div class="hamburger">
                    <a href="#">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
                <div class="nama">
                    <h3>Agenda Of SKIELL</h3>
                </div>
            </div>
             
           

        
            <div class="container">
            
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <label for="kelas" class="form-label mt-3 mb-0">Kelas :</label>
                            <select class="form-select" aria-label="Default select example" name="kodeKelas" id="kodeKelas">
                                <?php while ($row01 = mysqli_fetch_array($result01)) : ?>
                                    <option value="<?php echo $row01[0]; ?>"><?php echo $row01[1]; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="namaGuru" class="form-label mt-3 mb-0" >Nama Guru : <?php echo $fetch['namaGuru']; ?> </label>
                            <input type="hidden" name="kodeGuru" value="<?php echo $fetch['kodeGuru']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="tanggal" class="form-label mt-3 mb-0">Tanggal :</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal">
                        </div>
                        <div class="col">
                            <label for="kodeMapel" class="form-label mt-3 mb-0">Mapel :</label>
                            <select class="form-select" aria-label="Default select example" name="kodeMapel" id="kodeMapel">
                                <?php while ($row10 = mysqli_fetch_array($result10)) : ?>
                                    <option value="<?php echo $row10[0]; ?>"><?php echo $row10[1]; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="kodeJam" class="form-label mt-3 mb-0">Jam :</label>
                            <select class="form-select" aria-label="Default select example" name="kodeJam" id="kodeJam">
                                <?php while ($row11 = mysqli_fetch_array($result11)) : ?>
                                    <option value="<?php echo $row11[0]; ?>"><?php echo $row11[1]; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
 
                    <div class="row mt-3">
                    <div class="mb-3">
                        <label for="materi" class="form-label mb-0">Materi yang diberikan</label>
                        <input type="text" class="form-control" id="materi" name="materi" placeholder="Contoh : Bab III (Pengenalan GUI)">
                    </div>
                    <div class="mb-3">
                        <label for="detailMateri" class="form-label mb-0">Rincian materi</label>
                        <textarea class="form-control" id="detailMateri" name="detailMateri" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="bukti" class="form-label mb-0">Dokumentasi </label>
                        <input class="form-control" type="file" name="bukti" id="bukti">
                    </div>

                    <div class="d-grid gap-2">
                        <button class="btn btn-primary mb-2" type="submit" name="submit" id="submit">Kirim</button>
                    </div>
                    </div>
                </form>
            </div>


        </div>


        
        <div class="sidebar">
            <div class="profile">
                <img src="../../admin/_dataguru/fotoguru/<?php echo $fetch['fotoGuru']; ?>" alt="profile_picture">
                <h3><?php echo $fetch['namaGuru']; ?></h3>
                <p>Guru</p>
            </div>
            <ul>
                <li>
                    <a href="../dashboard.php" >
                        <span class="icon"><i class="fas fa-solid fa-school"></i></span>
                        <span class="item">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="../bukuinduk/bukuinduk.php" >
                        <span class="icon"><i class="fas fa-solid fa-book"></i></span>
                        <span class="item">Buku Induk</span>
                    </a>
                </li>
                <li>
                    <a href="../datasiswa/datasiswa.php">
                        <span class="icon"><i class="fas fa-duotone fa-graduation-cap"></i></span>
                        <span class="item">Data Siswa</span>
                    </a>
                </li>
                <li>
                    <a href="../dataguru/dataguru.php">
                        <span class="icon"><i class="fas fa-solid fa-chalkboard-user"></i></span>
                        <span class="item">Data Guru</span>
                    </a>
                </li>
                <li>
                    <a href="../jurusandankelas/jurusandankelas.php">
                        <span class="icon"><i class="fas fa-duotone fa-user-group"></i></span>
                        <span class="item">Jurusan dan Kelas</span>
                    </a>
                </li>
                <li>
                    <a href="../mapel/mapel.php">
                        <span class="icon"><i class="fas fa-regular fa-flask"></i></span>
                        <span class="item">Mata Pelajaran</span>
                    </a>
                </li>
                <li>
                    <a href="../jadwalpelajaran/jadwal.php">
                        <span class="icon"><i class="fas fa-solid fa-calendar-days"></i></span>
                        <span class="item">Jadwal Pelajaran</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="active">
                        <span class="icon"><i class="fas fa-regular fa-file-pen"></i></span>
                        <span class="item">Agenda Kelas dan Jurnal</span>
                    </a>
                </li>
                <li>
                    <a href="../dashboard.php?logout=<?php echo $kodeGuru; ?>">
                        <span class="icon"><i class="fas fa-solid fa-right-from-bracket"></i></span>
                        <span class="item">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        
    </div>
  <script>
       var hamburger = document.querySelector(".hamburger");
	hamburger.addEventListener("click", function(){
		document.querySelector("body").classList.toggle("active");
	})
  </script>
</body>
</html>