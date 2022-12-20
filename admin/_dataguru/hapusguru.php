<?php
require '../../koneksi.php';


$kodeGuru = $_GET['kodeGuru'];

if (hapusguru($kodeGuru) > 0 ){
    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'dataguru.php';
        </script>";
    }else {
        echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'dataguru.php';
        </script>";
}




?>