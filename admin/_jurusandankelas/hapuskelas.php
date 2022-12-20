<?php
require '../../koneksi.php';


$kodeKelas = $_GET['kodeKelas'];

if (hapuskelas($kodeKelas) > 0 ){
    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'jurusandankelas.php';
        </script>";
    }else {
        echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'jurusandankelas.php';
        </script>";
}




?>