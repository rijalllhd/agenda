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

$query10 = "SELECT * FROM  mapel";
$result10 = mysqli_query($db, $query10);

$query11 = "SELECT * FROM  jampelajaran";
$result11 = mysqli_query($db, $query11);

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



                <table class="table table-bordered table-hover table align-middle">
                    <br>
                    <thead>
                    <tr>
                        <th rowspan="2"><center>Hari</center></th>
                        <th rowspan="2"><center>Jam Ke-</center></th>
                        <th rowspan="2"><center>Waktu (WIB)</center></th>
                        <th colspan="2"><center>Mata Pelajaran - Kode Guru</center></th>
                    </tr>
                    <tr>
                        <td><center>mapel</center></td>
                        <td><center>Ruang</center></td>
                    </tr>
                    </thead>



                    <tbody>
                    <tr>
            <td rowspan="13"><center>Senin</center></td>
            <td><center>0</center></td>
            <td>
                <select class="form-select" aria-label="Default select example" name="kodeJam" id="kodeJam">
                    <?php while ($row11 = mysqli_fetch_array($result11)) : ?>
                        <option value="<?php echo $row11[0]; ?>"><?php echo $row11[1]; ?></option>
                    <?php endwhile; ?>
                </select></td>
              <td colspan="2"><center>Upacara Bendera</center></td>
            </td>
        </tr>
        <tr>
            <td><center>1</center></td>
            <td><select class="form-select" aria-label="Default select example">
              <option selected>07.00 - 08.00</option>
            </select>
            </td>
            <td><select class="form-select" aria-label="Default select example" name="kodeJam" id="kodeJam">
                    <?php while ($row10 = mysqli_fetch_array($result10)) : ?>
                        <option value="<?php echo $row10[0]; ?>"><?php echo $row10[1]; ?></option>
                    <?php endwhile; ?>
                </select>
            </td>
            <td></td>
        </tr>
        <tr>
          <td><center>2</center></td>
          <td><select class="form-select" aria-label="Default select example">
              <option selected>07.00 - 08.00</option>
            </select>
          </td>
          <td><select class="form-select" aria-label="Default select example">
              <option selected>BK</option>
              <option value="1">PBO</option>
            </select>
          </td>
          <td></td>
      </tr>
      <tr>
        <td><center>3</center></td>
        <td><select class="form-select" aria-label="Default select example">
            <option selected>07.00 - 08.00</option>
          </select>
        </td>
        <td><select class="form-select" aria-label="Default select example">
            <option selected>BK</option>
            <option value="1">PBO</option>
          </select>
        </td>
        <td></td>
    </tr>
        <td><center></center></td>
        <td><select class="form-select" aria-label="Default select example">
            <option selected>07.00 - 08.00</option>
                <option value="1">08.00 - 08.40</option>
          </select></td>
          <td colspan="2"><center>Istirahat</center></td>
          <tr>
            <td><center>4</center></td>
            <td><select class="form-select" aria-label="Default select example">
                <option selected>07.00 - 08.00</option>
              </select>
            </td>
            <td><select class="form-select" aria-label="Default select example">
                <option selected>BK</option>
                <option value="1">PBO</option>
              </select>
            </td>
            <td></td>
        </tr>
        <tr>
          <td><center>5</center></td>
          <td><select class="form-select" aria-label="Default select example">
              <option selected>07.00 - 08.00</option>
            </select>
          </td>
          <td><select class="form-select" aria-label="Default select example">
              <option selected>BK</option>
              <option value="1">PBO</option>
            </select>
          </td>
          <td></td>
      </tr>
      <td><center></center></td>
        <td><select class="form-select" aria-label="Default select example">
            <option selected>07.00 - 08.00</option>
                <option value="1">08.00 - 08.40</option>
          </select></td>
          <td colspan="2"><center>Istirahat</center></td>
          <tr>
            <td><center>6</center></td>
            <td><select class="form-select" aria-label="Default select example">
                <option selected>07.00 - 08.00</option>
              </select>
            </td>
            <td><select class="form-select" aria-label="Default select example">
                <option selected>BK</option>
                <option value="1">PBO</option>
              </select>
            </td>
            <td></td>
        </tr>
        <tr>
          <td><center>7</center></td>
          <td><select class="form-select" aria-label="Default select example">
              <option selected>07.00 - 08.00</option>
            </select>
          </td>
          <td><select class="form-select" aria-label="Default select example">
              <option selected>BK</option>
              <option value="1">PBO</option>
            </select>
          </td>
          <td></td>
      </tr>
      <tr>
        <td><center>8</center></td>
        <td><select class="form-select" aria-label="Default select example">
            <option selected>07.00 - 08.00</option>
          </select>
        </td>
        <td><select class="form-select" aria-label="Default select example">
            <option selected>BK</option>
            <option value="1">PBO</option>
          </select>
        </td>
        <td></td>
    </tr>
    <tr>
      <td><center>9</center></td>
      <td><select class="form-select" aria-label="Default select example">
          <option selected>07.00 - 08.00</option>
        </select>
      </td>
      <td><select class="form-select" aria-label="Default select example">
          <option selected>BK</option>
          <option value="1">PBO</option>
        </select>
      </td>
      <td></td>
  </tr>
  <tr>
    <td><center>10</center></td>
    <td><select class="form-select" aria-label="Default select example">
        <option selected>07.00 - 08.00</option>
      </select>
    </td>
    <td><select class="form-select" aria-label="Default select example">
        <option selected>BK</option>
        <option value="1">PBO</option>
      </select>
    </td>
    <td></td>
</tr>
                    </tbody>



                    <?php
                    
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
                    <a href="#" class="active">
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