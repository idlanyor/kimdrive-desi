<?php
$koneksi = new mysqli('localhost', 'root', '', 'rental');
if ($koneksi->connect_error) {
    die("koneksi gagal" . $koneksi->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['txtFoto'])) {
    $nopolisi = $_POST['txtPolisi'];
    $merk = $_POST['txtMerk'];
    $tahun = $_POST['txtTahun'];
    $harga_pokok = $_POST['hargapokok'];
    $harga_km = $_POST['hargakm'];
    $status = $_POST['txtStatus'];
    $odometer = $_POST['txtOdometer'];
    $namaFile = $_FILES['txtFoto']['name'];
    $tempName = $_FILES['txtFoto']['tmp_name'];
    $err = $_FILES['txtFoto']['error'];
    if ($err === UPLOAD_ERR_OK) {
        $fotoDir = 'foto_mobil/';
        $simpan = $fotoDir . $namaFile;
        if (move_uploaded_file($tempName, $simpan)) {
            $sql = "INSERT INTO mobil(no_polisi,merk,foto,tahun,s_mobil,odometer,harga_pokok,harga_km) 
            VALUES(?,?,?,?,?,?,?,?)";
            $stmt = $koneksi->prepare($sql);
            $stmt->bind_param('sssssiii', $nopolisi, $merk, $namaFile, $tahun, $status, $odometer, $harga_pokok, $harga_km);
            if ($stmt->execute()) {
                echo "<script>document.location.href = 'index.php?x=mobil'</script>";
            } else {
                echo "alert('Terjadi kesalahan,Data gagal disimpan')";
            }
            $stmt->close();
        } else {
            echo "Terjadi kesalahan saat memindahkan file";
        }
    } else {
        echo "terjadi kesalahan saat mengunggah file";
    }
}
