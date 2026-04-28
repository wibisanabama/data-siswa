<?php
require_once('koneksi.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM siswa WHERE id_siswa = $id");

    if($query) {
        echo "<script>
        alert('Data berhasil di hapus.');
        window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal di hapus.');
        window.location.href = 'index.php';
        </script>";
    }
} else {
    echo "<script>
    alert('Data id tidak ada.');
    window.location.href = 'index.php';
    </script>";
}
?>
