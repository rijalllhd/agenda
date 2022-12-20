<?php
require '../../koneksi.php';


$kodeSiswa = $_GET['kodeSiswa'];


if (hapussiswa($kodeSiswa) > 0 ){
    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'datasiswa.php';
        </script>";
    }else {
        echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'datasiswa.php';
        </script>";
}


?>