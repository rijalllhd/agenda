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

                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="get">
                    <div class="form-group">
                            <div class="row mt-3">
                                <div class="col-2"><a href="tambahkelas.php" class="btn btn-success  text-white">Tambah Data</a></div>
                            </div>
                    </div>                  
                </form>
                
                
            
                <table class="table table-bordered table-hover">
                    <br>
                    <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Kelas dan Jurusan</th>
                        <th >Aksi</th>
                       


                    </tr>
                    </thead>
                    <?php


                    $sql="SELECT * from kelas ";


                    $hasil=mysqli_query($db,$sql);
                    $no=0;
                    while ($data = mysqli_fetch_array($hasil)) {
                        $no++;

                        ?>
                        <tbody>
                        <tr>
                            <td class="text-center"><?php echo $no;?></td>
                            <td><?php echo $data["namaKelas"]; ?></td>
                            <td class="text-center">
                                <form action="" method="post">
                                    <a href="editkelas.php?kodeKelas=<?= $data['kodeKelas'] ?>" class="btn btn-primary text-white btn-sm mb-1">Edit</a>
                                    <a href="hapuskelas.php?kodeKelas=<?= $data['kodeKelas'] ?>" class="btn btn-danger text-white btn-sm" onclick="return confirm('apakah anda yakin untuk menghapus?');">Hapus</a>
                                        
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
                    <a href="../_bukuinduk/bukuinduk.php">
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
                    <a href="#"  class="active">
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
                    <a href="../_agendajurnal/agenda.php">
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