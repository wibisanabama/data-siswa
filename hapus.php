<?php
require_once('koneksi.php');

if(isset($_GET['id'])){
    $id = (int) $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM siswa WHERE id_siswa = $id");

    if($query) {
        header('Location: index.php');
    } else {
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
}
exit;
?>
