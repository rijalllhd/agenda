<?php
    include_once '../../fpdf185/fpdf.php';
    $pdf = new FPDF('P','mm','A4');
    $pdf -> AddPage();
    $pdf->SetFont('Arial','B',18);

    $pdf->Cell(200,15,'Juernal Pengajar','0','1','C');
    $pdf->Cell(200,0,'2021-2022','0','1','C');

    $pdf -> setLeftMargin(30);
    $pdf -> setTextColor(0,0,0);
    $pdf->SetFont('Arial','',12);

    require '../../koneksi.php';
    $kodeRekap = $_GET["kodeRekap"];
    $rekap = mysqli_query($db, "SELECT * FROM rekap WHERE kodeRekap='$_GET[kodeRekap]'");
    $data = mysqli_fetch_array($rekap);

    $pdf->Cell(40,30,'Kelas :','0','0','L');
    $pdf->Cell(-40,30,$data["kodeKelas"],'0','0','L');

    $pdf->Cell(40,45,'Tanggal :','0','0','L');
    $pdf->Cell(-40,45,$data["tanggal"],'0','0','L');

    $pdf->Cell(40,60,'nama guru :','0','0','L');
    $pdf->Cell(-40,60,$data["kodeGuru"],'0','0','L');

    $pdf->Cell(40,75,'Mata pelajaran :','0','0','L');
    $pdf->Cell(-40,75,$data["kodeMapel"],'0','0','L');

    $pdf->Cell(40,90,'Jam Pelajaran :','0','0','L');
    $pdf->Cell(-40,90,$data["kodeJam"],'0','0','L');

    $pdf->Cell(40,105,'Materi :','0','0','L');
    $pdf->Cell(-40,105,$data["materi"],'0','0','L');

    $pdf->Cell(40,120,'Detail Materi :','0','0','L');
    $pdf->Cell(-40,120,$data["detailMateri"],'0','0','L');

    $pdf->Cell(40,135,'Dokumentasi :','0','0','L');
    $pdf->Cell(-40,135,$data["bukti"],'0','0','L');


    $pdf -> Output();
?>