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
                
                
                <table class="table table-bordered table-hover table align-middle text-center ">
                    <br>
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Kelas</th>
                        <th>Tanggal</th>
                        <th>Guru</th>
                        <th>Mapel</th>
                        <th>Jam</th>
                        <th>Materi</th>
                        <th>Dokumentasi</th>
                        <th>Aksi</th>
                    


                    </tr>
                    </thead>
                    <?php


                    // if (isset($_GET['rekap'])) {
                    //     $rekap=trim($_GET['rekap']);
                    //     $sql="SELECT * from rekap where kodeRekap='$rekap' order by tanggal asc";
                    //     $q= "SELECT rekap.*, kelas.namaKelas, guru.namaGuru, mapel.namaMapel, jampelajaran.jam FROM rekap INNER JOIN kelas ON rekap.kodeKelas=kelas.kodeKelas INNER JOIN guru ON rekap.kodeGuru=guru.kodeGuru INNER JOIN mapel ON rekap.kodeMapel=mapel.kodeMapel INNER JOIN jampelajaran ON rekap.kodeJam=jampelajaran.kodeJam";
                    // }else {
                    //     $sql="SELECT * from rekap order by tanggal asc";
                    // }


                    // $hasil=mysqli_query($db,$sql);
                    // $no=0;
                    // while ($data = mysqli_fetch_array($hasil)) {
                    //     $no++;


                    $sql="SELECT rekap.*, kelas.namaKelas, guru.namaGuru, mapel.namaMapel, jampelajaran.jam FROM rekap INNER JOIN kelas ON rekap.kodeKelas=kelas.kodeKelas INNER JOIN guru ON rekap.kodeGuru=guru.kodeGuru INNER JOIN mapel ON rekap.kodeMapel=mapel.kodeMapel INNER JOIN jampelajaran ON rekap.kodeJam=jampelajaran.kodeJam;";


                    $hasil=mysqli_query($db,$sql);
                    $no=0;
                    while ($data = mysqli_fetch_array($hasil)) {
                        $no++;

                        ?>
                        <tbody>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $data["namaKelas"]; ?></td>
                            <td><?php echo $data["tanggal"];   ?></td>
                            <td><?php echo $data["namaGuru"];   ?></td>
                            <td><?php echo $data["namaMapel"];   ?></td>
                            <td><?php echo $data["jam"];   ?></td>
                            <td><?php echo $data["materi"];   ?></td>
                            <td><img src="dokum/<?php echo $data["bukti"];?>" alt="" class="img-thumbnail" style="width: 200px;"></td>
                            <td>
                                <form action="" method="post">
                                    <a href="print.php?kodeRekap=<?= $data['kodeRekap'] ?>" class="btn btn-secondary text-white btn-sm px-4" target="_blank">Print</a>                                      
                                </form>
                            </td>
                        </tr>
                        </tbody>
                        <?php
                    }
                    ?>
                </table>
            </div>


        </div>


        
        <div class="sidebar">
            <div class="profile">
                <img src="../../logo.PNG" alt="profile_picture">
                <h3>Rizal Hadi</h3>
                <p>Admin</p>
            </div>
            <ul>
                <li>
                    <a href="../dashboard.php" >
                        <span class="icon"><i class="fas fa-solid fa-school"></i></span>
                        <span class="item">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="../_bukuinduk/bukuinduk.php" >
                        <span class="icon"><i class="fas fa-solid fa-book"></i></span>
                        <span class="item">Buku Induk</span>
                    </a>
                </li>
                <li>
                    <a href="../_datasiswa/datasiswa.php">
                        <span class="icon"><i class="fas fa-duotone fa-graduation-cap"></i></span>
                        <span class="item">Data Siswa</span>
                    </a>
                </li>
                <li>
                    <a href="../_dataguru/dataguru.php">
                        <span class="icon"><i class="fas fa-solid fa-chalkboard-user"></i></span>
                        <span class="item">Data Guru</span>
                    </a>
                </li>
                <li>
                    <a href="../_jurusandankelas/jurusandankelas.php">
                        <span class="icon"><i class="fas fa-duotone fa-user-group"></i></span>
                        <span class="item">Jurusan dan Kelas</span>
                    </a>
                </li>
                <li>
                    <a href="../_mapel/mapel.php">
                        <span class="icon"><i class="fas fa-regular fa-flask"></i></span>
                        <span class="item">Mata Pelajaran</span>
                    </a>
                </li>
                <li>
                    <a href="../_jadwalpelajaran/jadwal.php">
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
                    <a href="../dashboard.php?logout=<?php echo $kodeAdmin; ?>">
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