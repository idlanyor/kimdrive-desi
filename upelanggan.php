<?php
// include("konek.php");
$koneksi = new mysqli('localhost', 'root', '', 'rental');
if ($koneksi->connect_error) {
    die("koneksi gagal" . $koneksi->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $id_pel = $_POST['id_pel'];
        $nama = $_POST['txtNama'];
        $ktp = $_POST['txtKtp'];
        $alamat = $_POST['txtAlamat'];

        $sql = "UPDATE pelanggan SET nama=?, ktp=?, alamat=? WHERE id=?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param('sssi', $nama, $ktp, $alamat, $id_pel);

        if ($stmt->execute()) {
            echo "<script>document.location.href = 'index.php?x=pelanggan'</script>";
        } else {
            echo "alert('Terjadi kesalahan, Data gagal disimpan')";
        }

        $stmt->close();
    } catch (\Throwable $th) {
        echo "Terjadi kesalahan: " . $th->getMessage();
    }
} else {
    echo "Metode permintaan tidak valid";
}
