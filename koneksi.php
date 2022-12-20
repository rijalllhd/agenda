<?php

$db = mysqli_connect("localhost", "root", "", "agenda");

if (mysqli_connect_errno()) {
    echo "koneksi gagal : " . mysqli_connect_error();
}



function tambahsiswa($datasiswa){
    global $db;

    $namaSiswa = htmlspecialchars($datasiswa["namaSiswa"]);
    $nis = htmlspecialchars($datasiswa["nis"]);
    $kodeKelas = htmlspecialchars($datasiswa["kodeKelas"]);
    $ttl = htmlspecialchars($datasiswa["ttl"]);
    $agama = htmlspecialchars($datasiswa["agama"]);
    $alamat = htmlspecialchars($datasiswa["alamat"]);
    $jenisKelamin = htmlspecialchars($datasiswa["jenisKelamin"]);
    
    $foto = uploadSiswa();
    if (!$foto) {
        return false;
    }

    $golDarah = htmlspecialchars($datasiswa["golDarah"]);
    $asalSekolah = htmlspecialchars($datasiswa["asalSekolah"]);
    $noIjazah = htmlspecialchars($datasiswa["noIjazah"]);
    $tb = htmlspecialchars($datasiswa["tb"]);
    $bb = htmlspecialchars($datasiswa["bb"]);
    $namaAyah = htmlspecialchars($datasiswa["namaAyah"]);
    $namaIbu = htmlspecialchars($datasiswa["namaIbu"]);


        // query insert
    $querysiswa = "INSERT INTO siswa
                VALUES
                ('','$namaSiswa','$nis','$kodeKelas','$ttl','$agama','$alamat','$jenisKelamin','$foto','$golDarah','$asalSekolah','$noIjazah','$tb','$bb','$namaAyah','$namaIbu')";


    mysqli_query($db, $querysiswa);
    return mysqli_affected_rows($db);
}


function uploadSiswa(){
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    if ($error === 4) {
        echo "
        <script>
            alert('Pilih gambar terlebih dahulu!');
            document.location.href = 'dataSiswa.php';
        </script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower (end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid) ){
        echo "
        <script>
            alert('Yang anda upload bukan gambar!');
            document.location.href = 'dataSiswa.php';
        </script>";
        return false;
    }

    if ($ukuranFile > 1000000){
        echo "
        <script>
            alert('Ukuran gambar terlalu besar!');
            document.location.href = 'dataSiswa.php';
        </script>";
        return false;
    }


    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'fotosiswa/' . $namaFileBaru);
    return $namaFileBaru;
}


function hapussiswa($kodeSiswa){
    global $db;
    mysqli_query($db, "DELETE FROM siswa WHERE kodeSiswa = $kodeSiswa");

    return mysqli_affected_rows($db);
}

function editsiswa($datasiswa){
    global $db;

    $kodeSiswa = $datasiswa["kodeSiswa"];
    $namaSiswa = htmlspecialchars($datasiswa["namaSiswa"]);
    $nis = htmlspecialchars($datasiswa["nis"]);
    $kodeKelas = htmlspecialchars($datasiswa["kodeKelas"]);
    $ttl = htmlspecialchars($datasiswa["ttl"]);
    $agama = htmlspecialchars($datasiswa["agama"]);
    $alamat = htmlspecialchars($datasiswa["alamat"]);
    $jenisKelamin = htmlspecialchars($datasiswa["jenisKelamin"]);
    $fotoLamas = htmlspecialchars($datasiswa["fotoLamas"]);

    if ($_FILES['foto']['error']=== 4) {
        $foto = $fotoLamas;
    } else {
        $foto = uploadSiswa();
    }    

    $golDarah = htmlspecialchars($datasiswa["golDarah"]);
    $asalSekolah = htmlspecialchars($datasiswa["asalSekolah"]);
    $noIjazah = htmlspecialchars($datasiswa["noIjazah"]);
    $tb = htmlspecialchars($datasiswa["tb"]);
    $bb = htmlspecialchars($datasiswa["bb"]);
    $namaAyah = htmlspecialchars($datasiswa["namaAyah"]);
    $namaIbu = htmlspecialchars($datasiswa["namaIbu"]);


        // query insert
    $querysiswa = "UPDATE siswa SET 
                namaSiswa = '$namaSiswa',
                nis = '$nis',
                kodeKelas = '$kodeKelas',
                ttl = '$ttl',
                agama = '$agama',
                alamat = '$alamat',
                jenisKelamin = '$jenisKelamin',
                foto = '$foto',
                golDarah = '$golDarah',
                asalSekolah = '$asalSekolah',
                noIjazah = '$noIjazah',
                tb = '$tb',
                bb = '$bb',
                namaAyah = '$namaAyah',
                namaIbu = '$namaIbu'

                WHERE kodeSiswa = $kodeSiswa";


    mysqli_query($db, $querysiswa);
    return mysqli_affected_rows($db);
}






// ini guru
function tambahguru($dataguru){
    global $db;

    $kodeGuru = $dataguru["kodeGuru"];
    $inisialGuru = htmlspecialchars($dataguru["inisialGuru"]);
    $namaGuru = htmlspecialchars($dataguru["namaGuru"]);
    $kodeMapel = htmlspecialchars($dataguru["kodeMapel"]);
    $jenisKelamin = htmlspecialchars($dataguru["jenisKelamin"]);
    $noTelp = htmlspecialchars($dataguru["noTelp"]);
    $password = htmlspecialchars($dataguru["password"]);

    $fotoGuru = upload();
    if (!$fotoGuru) {
        return false;
    }

    $queryguru = "INSERT INTO guru
                VALUES
                ('','$inisialGuru','$namaGuru','$kodeMapel','$jenisKelamin','$noTelp','$password','$fotoGuru')";

    mysqli_query($db, $queryguru);
    return mysqli_affected_rows($db);
}

function upload(){
    $namaFile = $_FILES['fotoGuru']['name'];
    $ukuranFile = $_FILES['fotoGuru']['size'];
    $error = $_FILES['fotoGuru']['error'];
    $tmpName = $_FILES['fotoGuru']['tmp_name'];

    if ($error === 4) {
        echo "
        <script>
            alert('Pilih gambar terlebih dahulu!');
            document.location.href = 'tambahguru.php';
        </script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower (end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid) ){
        echo "
        <script>
            alert('Yang anda upload bukan gambar!');
            document.location.href = 'tambahguru.php';
        </script>";
        return false;
    }

    if ($ukuranFile > 1000000){
        echo "
        <script>
            alert('Ukuran gambar terlalu besar!');
            document.location.href = 'tambahguru.php';
        </script>";
        return false;
    }


    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'fotoguru/' . $namaFileBaru);
    return $namaFileBaru;
}

function editguru($dataguru){
    global $db;

    $kodeGuru = $dataguru["kodeGuru"];
    $namaGuru = htmlspecialchars($dataguru["namaGuru"]);
    $inisialGuru = htmlspecialchars($dataguru["inisialGuru"]);
    $jenisKelamin = htmlspecialchars($dataguru["jenisKelamin"]);
    $kodeMapel = htmlspecialchars($dataguru["kodeMapel"]);
    $noTelp = htmlspecialchars($dataguru["noTelp"]);
    $password = htmlspecialchars($dataguru["password"]);
    $fotoLama = htmlspecialchars($dataguru["fotoLama"]);
    

    if ($_FILES['fotoGuru']['error']=== 4) {
        $fotoGuru = $fotoLama;
    } else {
        $fotoGuru = upload();
    }    



        // query insert
    $queryguru = "UPDATE guru SET 
                namaGuru = '$namaGuru',
                inisialGuru = '$inisialGuru',
                jenisKelamin = '$jenisKelamin',
                kodeMapel = '$kodeMapel',
                noTelp = '$noTelp',
                password = '$password',
                fotoGuru = '$fotoGuru'

                WHERE kodeGuru = $kodeGuru";



    mysqli_query($db, $queryguru);
    return mysqli_affected_rows($db);
}

function hapusguru($kodeGuru){
    global $db;
    mysqli_query($db, "DELETE FROM guru WHERE kodeGuru = $kodeGuru");

    return mysqli_affected_rows($db);
}








// ini kelas



function tambahkelas($datakelas){
    global $db;

    $kodeKelas = $datakelas["kodeKelas"];
    $namaKelas = htmlspecialchars($datakelas["namaKelas"]);

    $querykelas = "INSERT INTO kelas
                VALUES
                ('','$namaKelas')";

    mysqli_query($db, $querykelas);
    return mysqli_affected_rows($db);
}


function hapuskelas($kodeKelas){
    global $db;
    mysqli_query($db, "DELETE FROM kelas WHERE kodeKelas = $kodeKelas");

    return mysqli_affected_rows($db);
}


function editkelas($datakelas){
    global $db;

    $kodeKelas = $datakelas["kodeKelas"];
    $namaKelas = htmlspecialchars($datakelas["namaKelas"]);

        // query insert
    $querykelas = "UPDATE kelas SET 
                namaKelas = '$namaKelas'

                WHERE kodeKelas = $kodeKelas
                  ";



    mysqli_query($db, $querykelas);
    return mysqli_affected_rows($db);
}



// mapel

function tambahmapel($datamapel){
    global $db;

    $inisialMapel = htmlspecialchars($datamapel["inisialMapel"]);
    $namaMapel = htmlspecialchars($datamapel["namaMapel"]);

    $querymapel = "INSERT INTO mapel
                VALUES
                ('','$inisialMapel','$namaMapel')";

    mysqli_query($db, $querymapel);
    return mysqli_affected_rows($db);
}

function hapusmapel($kodeMapel){
    global $db;
    mysqli_query($db, "DELETE FROM mapel WHERE kodeMapel = $kodeMapel");

    return mysqli_affected_rows($db);
}

function editmapel($datamapel){
    global $db;

    $kodeMapel = $datamapel["kodeMapel"];
    $inisialMapel = $datamapel["inisialMapel"];
    $namaMapel = htmlspecialchars($datamapel["namaMapel"]);

        // query insert
    $querymapel = "UPDATE mapel SET 
                inisialMapel = '$inisialMapel',
                namaMapel = '$namaMapel'

                WHERE kodeMapel = $kodeMapel
                  ";



    mysqli_query($db, $querymapel);
    return mysqli_affected_rows($db);
}












// agenda guru

function tambahagenda($datarekap){
    global $db;

    $kodeKelas = htmlspecialchars($datarekap["kodeKelas"]);
    $kodeGuru = htmlspecialchars($datarekap["kodeGuru"]);
    $tanggal = htmlspecialchars($datarekap["tanggal"]);
    $kodeMapel = htmlspecialchars($datarekap["kodeMapel"]);
    $kodeJam = htmlspecialchars($datarekap["kodeJam"]);
    $materi = htmlspecialchars($datarekap["materi"]);
    $detailMateri = htmlspecialchars($datarekap["detailMateri"]);

    $bukti = uploadbukti();
    if (!$bukti) {
        return false;
    }

    $queryrekap = "INSERT INTO rekap
                VALUES
                ('','$kodeKelas','$kodeGuru','$tanggal','$kodeMapel','$kodeJam','$materi','$detailMateri','$bukti')";
    mysqli_query($db, $queryrekap);
    return mysqli_affected_rows($db);
}

function uploadbukti(){
    $namaFile = $_FILES['bukti']['name'];
    $ukuranFile = $_FILES['bukti']['size'];
    $error = $_FILES['bukti']['error'];
    $tmpName = $_FILES['bukti']['tmp_name'];

    if ($error === 4) {
        echo "
        <script>
            alert('Pilih gambar terlebih dahulu!');
            document.location.href = 'agenda.php';
        </script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower (end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid) ){
        echo "
        <script>
            alert('Yang anda upload bukan gambar!');
            document.location.href = 'agenda.php';
        </script>";
        return false;
    }

    if ($ukuranFile > 1000000){
        echo "
        <script>
            alert('Ukuran gambar terlalu besar!');
            document.location.href = 'agenda.php';
        </script>";
        return false;
    }


    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, '../../admin/_agendajurnal/dokum/' . $namaFileBaru);
    return $namaFileBaru;
}
?>