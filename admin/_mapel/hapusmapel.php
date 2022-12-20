<?php
require '../../koneksi.php';


$kodeMapel = $_GET['kodeMapel'];

if (hapusmapel($kodeMapel) > 0 ){
    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'mapel.php';
        </script>";
    }else {
        echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'mapel.php';
        </script>";
}




?>