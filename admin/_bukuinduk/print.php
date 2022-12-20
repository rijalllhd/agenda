<?php
    include_once '../../fpdf185/fpdf.php';
    $pdf = new FPDF('P','mm','A4');
    $pdf -> AddPage();
    $pdf->SetFont('Arial','B',18);

    $pdf->Cell(200,15,'Data Siswa Tahun','0','1','C');
    $pdf->Cell(200,0,'2021-2022','0','1','C');

    $pdf -> setLeftMargin(30);
    $pdf -> setTextColor(0,0,0);
    $pdf->SetFont('Arial','',12);

    require '../../koneksi.php';
    $kodeSiswa = $_GET["kodeSiswa"];
    $siswa = mysqli_query($db, "SELECT * FROM siswa WHERE kodeSiswa='$_GET[kodeSiswa]'");
    $data = mysqli_fetch_array($siswa);


    $pdf->Cell(40,30,'Nama Siswa :','0','0','L');
    $pdf->Cell(-40,30,$data["namaSiswa"],'0','0','L');

    $pdf->Cell(40,45,'NIS :','0','0','L');
    $pdf->Cell(-40,45,$data["nis"],'0','0','L');

    $pdf->Cell(40,60,'Kelas :','0','0','L');
    $pdf->Cell(-40,60,$data["kodeKelas"],'0','0','L');

    $pdf->Cell(40,75,'Tanggal Lahir :','0','0','L');
    $pdf->Cell(-40,75,$data["ttl"],'0','0','L');

    $pdf->Cell(40,90,'Agama :','0','0','L');
    $pdf->Cell(-40,90,$data["agama"],'0','0','L');

    $pdf->Cell(40,105,'Alamat :','0','0','L');
    $pdf->Cell(-40,105,$data["alamat"],'0','0','L');

    $pdf->Cell(40,120,'Jenis Kelamin :','0','0','L');
    $pdf->Cell(-40,120,$data["jenisKelamin"],'0','0','L');

    $pdf->Cell(40,135,'Golongan Darah :','0','0','L');
    $pdf->Cell(-40,135,$data["golDarah"],'0','0','L');

    $pdf->Cell(40,150,'No Ijazah :','0','0','L');
    $pdf->Cell(-40,150,$data["noIjazah"],'0','0','L');

    $pdf->Cell(40,165,'Tinggi Badan :','0','0','L');
    $pdf->Cell(-40,165,$data["tb"],'0','0','L');

    $pdf->Cell(40,180,'Berat Badan :','0','0','L');
    $pdf->Cell(-40,180,$data["bb"],'0','0','L');

    $pdf->Cell(40,195,'Nama Ayah :','0','0','L');
    $pdf->Cell(-40,195,$data["namaAyah"],'0','0','L');

    $pdf->Cell(40,210,'Nama Ibu :','0','0','L');
    $pdf->Cell(-40,210,$data["namaIbu"],'0','0','L');

    $pdf->Cell(40,225,'NIS :','0','0','L');
    $pdf->Cell(-40,225,$data["nis"],'0','0','L');

    $pdf->Cell(40,240,'Foto :','0','0','L');
    $pdf->Cell(-40,240,$data["foto"],'0','0','L');
    
    $pdf -> Output();
?>