<?php
include '../koneksi.php';


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
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
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
             
           

        
            <div class="container text-center dash position-relative">
                <div class="row welcome">
                    <div class="col w-100 p-4 m-3 text-white text-start rounded-4"  style="background:rgb(20, 54, 122);">
                    <div class="display">
                        <div id="time" class="fs-1 text-xl-start"></div>
                    </div>
                    <span class="fs-4">Selamat datang, <?php echo $fetch['namaGuru']; ?> </span>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col p-4 mx-3 text-center rounded-4"  style="background:rgb(20, 54, 122);">
                        <a href="bukuinduk/bukuinduk.php" class="text-white text-decoration-none ">
                            <span class="icon fs-1"><i class="fas fa-solid fa-book" ></i></span>
                            <br>
                            <span class="item">Buku Induk</span>
                        </a>
                    </div>
                    <div class="col p-4 mx-3 text-center rounded-4"  style="background:rgb(20, 54, 122);">
                        <a href="datasiswa/datasiswa.php" class="text-white text-decoration-none ">
                            <span class="icon fs-1"><i class="fas fa-duotone fa-graduation-cap"></i></span>
                            <br>
                            <span class="item">Data Siswa</span>
                        </a>
                    </div>
                    <div class="col p-4 mx-3 text-center rounded-4"  style="background:rgb(20, 54, 122);">
                        <a href="dataguru/dataguru.php" class="text-white text-decoration-none ">
                            <span class="icon fs-1"><i class="fas fa-solid fa-chalkboard-user"></i></span>
                            <br>
                            <span class="item">Data Guru</span>
                        </a>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col p-4 mx-3 text-center rounded-4"  style="background:rgb(20, 54, 122);">
                        <a href="jurusandankelas/jurusandankelas.php" class="text-white text-decoration-none ">
                            <span class="icon fs-1"><i class="fas fa-duotone fa-user-group"></i></span>
                            <br>
                            <span class="item">Jurusan dan Kelas</span>
                        </a>
                    </div>
                    <div class="col p-4 mx-3 text-center rounded-4"  style="background:rgb(20, 54, 122);">
                        <a href="mapel/mapel.php" class="text-white text-decoration-none ">
                            <span class="icon fs-1"><i class="fas fa-regular fa-flask"></i></span>
                            <br>
                            <span class="item">Mata Pelajaran</span>
                        </a>
                    </div>
                    <div class="col p-4 mx-3 text-center rounded-4"  style="background:rgb(20, 54, 122);">
                        <a href="jadwalpelajaran/jadwal.php" class="text-white text-decoration-none ">
                            <span class="icon fs-1"><i class="fas fa-solid fa-calendar-days"></i></span>
                            <br>
                            <span class="item">Jadwal Pelajaran</span>
                        </a>
                    </div>
                </div>
                <div class="row my-5"></div>
                <div class="row my-5"></div>
                <div class="row mb-1"></div>
                <div class="row w-50 position-absolute bottom-0 start-50 translate-middle-x ">
                    <div class="col p-4 mx-3 text-center rounded-4"  style="background:rgb(20, 54, 122);">
                        <a href="agendajurnal/agenda.php" class="text-white text-decoration-none ">
                            <span class="icon fs-1"><i class="fas fa-regular fa-file-pen"></i></span>
                            <br>
                            <span class="item">Agenda Kelas dan Jurnal</span>
                        </a>
                    </div>
                </div>
            </div>



        </div>


        
        <div class="sidebar ">
            <div class="profile">
                <img src="../admin/_dataguru/fotoguru/<?php echo $fetch['fotoGuru']; ?>" alt="profile_picture">
                <h3><?php echo $fetch['namaGuru']; ?></h3>
                <p>Guru</p>
            </div>
            <ul>
                <li>
                    <a href="#" class="active">
                        <span class="icon"><i class="fas fa-solid fa-school"></i></span>
                        <span class="item">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="bukuinduk/bukuinduk.php">
                        <span class="icon"><i class="fas fa-solid fa-book"></i></span>
                        <span class="item">Buku Induk</span>
                    </a>
                </li>
                <li>
                    <a href="datasiswa/datasiswa.php">
                        <span class="icon"><i class="fas fa-duotone fa-graduation-cap"></i></span>
                        <span class="item">Data Siswa</span>
                    </a>
                </li>
                <li>
                    <a href="dataguru/dataguru.php">
                        <span class="icon"><i class="fas fa-solid fa-chalkboard-user"></i></span>
                        <span class="item">Data Guru</span>
                    </a>
                </li>
                <li>
                    <a href="jurusandankelas/jurusandankelas.php">
                        <span class="icon"><i class="fas fa-duotone fa-user-group"></i></span>
                        <span class="item">Jurusan dan Kelas</span>
                    </a>
                </li>
                <li>
                    <a href="mapel/mapel.php">
                        <span class="icon"><i class="fas fa-regular fa-flask"></i></span>
                        <span class="item">Mata Pelajaran</span>
                    </a>
                </li>
                <li>
                    <a href="jadwalpelajaran/jadwal.php">
                        <span class="icon"><i class="fas fa-solid fa-calendar-days"></i></span>
                        <span class="item">Jadwal Pelajaran</span>
                    </a>
                </li>
                <li>
                    <a href="agendajurnal/agenda.php">
                        <span class="icon"><i class="fas fa-regular fa-file-pen"></i></span>
                        <span class="item">Agenda Kelas dan Jurnal</span>
                    </a>
                </li>
                <li>
                    <a href="dashboard.php?logout=<?php echo $kodeGuru; ?>">
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
	});


    setInterval(()=>{
           const time = document.querySelector(".display #time");
           let date = new Date();
           let hours = date.getHours();
           let minutes = date.getMinutes();
           let seconds = date.getSeconds();
           let day_night = "AM";
           if(hours > 12){
             day_night = "PM";
             hours = hours - 12;
           }
           if(seconds < 10){
             seconds = "0" + seconds;
           }
           if(minutes < 10){
             minutes = "0" + minutes;
           }
           if(hours < 10){
             hours = "0" + hours;
           }
           time.textContent = hours + ":" + minutes + ":" + seconds ;
         });
  </script>
</body>
</html>