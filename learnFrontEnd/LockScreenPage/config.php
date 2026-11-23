<?php 

$koneksi = mysqli_connect('localhost', 'root', '', 'db_lockscreen');

if(!$koneksi){
    die('koneksi gagal');
}
else{
    // echo "koneksi berhasil";
}

$queryApp = mysqli_query($koneksi, "SELECT * FROM tbl_pengaturan");
$app = mysqli_fetch_assoc($queryApp);
$name = $app['nama_aplikasi'];
$tagline = $app['tagline'];
$sesi = $app['sesi'];

?>