<?php
// include("konek.php");
$koneksi = new mysqli('localhost', 'root', '', 'rental');
if ($koneksi->connect_error) {
    die("koneksi gagal" . $koneksi->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $id_mobil = $_POST['id_mob'];
        $nopolisi = $_POST['txtPolisi'];
        $merk = $_POST['txtMerk'];
        $tahun = $_POST['txtTahun'];
        $hp = $_POST['hargapokok'];
        $hk = $_POST['hargakm'];
        $status = $_POST['txtStatus'];

        $sql = "UPDATE mobil SET no_polisi=?, merk=?, tahun=?, s_mobil=?, harga_pokok=?, harga_km=? WHERE id_mobil=?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param('ssssiii', $nopolisi, $merk, $tahun, $status, $hp, $hk, $id_mobil);

        if ($stmt->execute()) {
            echo "<script>document.location.href = 'index.php?x=mobil'</script>";
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


// $simpan = mysqli_query($konek, "update mobil set no_polisi='$nopolisi', merk='$merk', tahun='$tahun', harga='$harga' where id_mobil='$kode', '$foto'");
// if ($simpan) {
// echo "alert('Data Mobil berhasil disimpan')";
// header("Location:index.php?x=mobil");
// }
// ("localhost", "root", "", "rental"
// fungsi mengupload file
/*function upload_file()
{
$namaFile = $_FILES['Foto']['name'];
$ukuranFile = $_FILES['Foto']['size'];
$error = $_FILES['Foto']['size'];
$tmpName = $_FILES['Foto']['tmp_name'];

// check file yang diupload
$extensifileValid = ['jpg', 'jpeg', 'png'];
$extensifile = explode('.', $nameFile);
$extensifile = strtolower(end($extensifile));

if (!in_array($extensifile, $extensifileValid)) {
// pesan gagal

echo "<script>
    alert('Format File Tidak Valid');
    document.location.href = 'mobil.php';
</script>";
die();
}

// check ukuran file 2 MB
if ($ukuranFile > 2048000) {
// pesan gagal
echo "<script>
    alert('Ukuran File Max 2 MB');
    document.location.href = 'mobil.php';
</script>";
die();
}

// generate nama file baru
$namaFileBaru = uniqid();
$namaFileBaru .= '.';
$namaFileBaru .=$extensifile;

// pindahkan ke local folder
move_uploaded_file($tmpName, 'assets/img/'. $namaFileBaru);
return $namaFileBaru;
}*/