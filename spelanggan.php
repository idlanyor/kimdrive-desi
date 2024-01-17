<?php
$koneksi = new mysqli('localhost', 'root', '', 'rental');
if ($koneksi->connect_error) {
    die("koneksi gagal" . $koneksi->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['txtNama'];
    $ktp = $_POST['txtKtp'];
    $jk = $_POST['txtJK'];
    $alamat = $_POST['txtAlamat'];
    $telp = $_POST['txtTelp'];
    $sql = "INSERT INTO pelanggan (nama,ktp,jk,alamat,telp) VALUES(?,?,?,?,?)";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param('sssss', $nama, $ktp,$jk, $alamat, $telp);
    if ($stmt->execute()) {
        echo "<script>document.location.href = 'index.php?x=pelanggan'</script>";
    } else {
        echo "alert('Terjadi kesalahan,Data gagal disimpan')";
    }
    $stmt->close();
} else {
    echo "Akses langsung tidak diizinkan";
}
