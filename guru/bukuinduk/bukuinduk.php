<?php
include '../../koneksi.php';


session_start();

$kodeGuru = $_SESSION['kodeGuru'];

if(!isset($kodeGuru)){
   header('location:../../index.php');
};


if(isset($_GET['logout'])){
    unset($kodeGuru);
    session_destroy();
    header('location:../index.php');
 }

 
$select = mysqli_query($db, "SELECT * FROM guru WHERE kodeGuru = '$kodeGuru'") or die('query failed');
if(mysqli_num_rows($select) > 0){
    $fetch = mysqli_fetch_assoc($select);
};


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
                        <label for="sel1" class="mt-2">Pilih kelas:</label>
                            <div class="row">
                                <div class="col">
                                    <select class="form-control" name="kelas">
                                        <?php
                                        // include "koneksi.php";
                                        //Perintah sql untuk menampilkan semua data pada tabel jurusan
                                        $sql="SELECT * from kelas";

                                        $hasil=mysqli_query($db,$sql);
                                        $no=0;
                                        while ($data = mysqli_fetch_array($hasil)) {
                                        $no++;

                                        $ket="";
                                        if (isset($_GET['kelas'])) {
                                            $kelas = trim($_GET['kelas']);

                                            if ($kelas==$data['kodeKelas'])
                                            {
                                                $ket="selected";
                                            }
                                        }
                                        ?>
                                        <option <?php echo $ket; ?> value="<?php echo $data['kodeKelas'];?>"><?php echo $data['namaKelas'];?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary text-white" value="Pilih">
                                    </div>
                                </div>
                            </div>
                    </div>

                    
                </form>



                <table class="table table-bordered table-hover">
                    <br>
                    <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Aksi</th>
                    


                    </tr>
                    </thead>
                    <?php


                    if (isset($_GET['kelas'])) {
                        $kelas=trim($_GET['kelas']);
                        $sql="SELECT * from siswa where kodeKelas='$kelas' order by kodeSiswa asc";
                    }else {
                        $sql="SELECT * from siswa order by kodeSiswa asc";
                    }


                    $hasil=mysqli_query($db,$sql);
                    $no=0;
                    while ($data = mysqli_fetch_array($hasil)) {
                        $no++;

                        ?>
                        <tbody>
                        <tr>
                            <td class="text-center"><?php echo $no;?></td>
                            <td><?php echo $data["nis"]; ?></td>
                            <td><?php echo $data["namaSiswa"];   ?></td>
                            <td><?php echo $data["jenisKelamin"];   ?></td>
                            <td class="text-center">
                                <form action="" method="post">
                                    <a href="lihatsiswa.php?kodeSiswa=<?= $data['kodeSiswa'] ?>" class="btn btn-success text-white btn-sm">Lihat</a>

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
                    <a href="bukuinduk.php" class="active">
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
                    <a href="../agendajurnal/agenda.php">
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