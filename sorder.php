<?php
include "konek.php";
$polisi = $_POST['polisi'];
$pelanggan = $_POST['idpel'];
$kmAwal = $_POST['kmAwal'];
$dp = $_POST['uangMuka'];
$dpdibayar = $_POST['uangMukaDibayar'];
$tglPinjam = $_POST['tglPinjam'];
$tglKembali = $_POST['tglKembali'];
$lamaSewa = $_POST['lamaSewa'];
$cari = mysqli_query($konek, "select * from mobil where id_mobil='$polisi'");
$cari2 = mysqli_query($konek, "select * from pelanggan where id='$pelanggan'");
$data = mysqli_fetch_array($cari);
$simpan = mysqli_query(
    $konek,
    "INSERT INTO sewa(id_mobil,id_admin,id_pelanggan,tgl_sewa,tgl_kembali,uang_muka,uang_muka_dibayar,km_awal,lama_sewa,harga_akhir) 
VALUES ('$polisi','$_SESSION[id_admin]','$pelanggan','$tglPinjam','$tglKembali','$dp',$dpdibayar,'$kmAwal',$lamaSewa,$dp)"
);
if ($simpan) {
    echo "<script>document.location.href = 'index.php?x=order'</script>";
} else {
    echo 'samting wrong';
}
