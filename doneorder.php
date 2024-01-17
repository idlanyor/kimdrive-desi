<?php

// include("konek.php");
$koneksi = new mysqli('localhost', 'root', '', 'rental');
if ($koneksi->connect_error) {
    die("koneksi gagal" . $koneksi->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $idmob = $_POST['idmob'];
        $idorder = $_POST['idorder'];
        $idpel = $_POST['idpel'];
        $mobil = $_POST['mobil'];
        $pelanggan = $_POST['pelanggan'];
        $kmawal = $_POST['kmAwal'];
        $kmakhir = $_POST['kmAkhir'];
        $uangmuka = $_POST['uangMuka'];
        $hargaPerKM = $_POST['hargamob'];
        $tglPinjam = $_POST['tglPinjam'];
        $tot_harga = (($kmakhir - $kmawal) * $hargaPerKM) + $uangmuka;
        $status = 'AKTIF';

        $updateMobil = "UPDATE mobil SET odometer=?, s_mobil=? WHERE id_mobil=?";
        $stmtUpdateMobil = $koneksi->prepare($updateMobil);
        $stmtUpdateMobil->bind_param("isi", $kmakhir, $status, $idmob);
        $stmtUpdateMobil->execute();
        $stmtUpdateMobil->close();
        // update 
        $insertKalkulasiKM = "INSERT INTO kalkulasi_km(id_mobil, id_order, id_pelanggan, km_awal,km_akhir, total_harga) VALUES(?,?,?,?,?,?)";
        $stmtInsertKM = $koneksi->prepare($insertKalkulasiKM);
        $stmtInsertKM->bind_param("iiiiii", $idmob, $idorder, $idpel, $kmawal, $kmakhir, $tot_harga);
        $stmtInsertKM->execute();
        $stmtInsertKM->close();

        $updateSewa = "UPDATE sewa SET km_akhir=?, harga_akhir=? WHERE id_sewa=?";
        $stmtUpdateSewa = $koneksi->prepare($updateSewa);
        $stmtUpdateSewa->bind_param("iii", $kmakhir, $tot_harga, $idorder);
        $stmtUpdateSewa->execute();
        $stmtUpdateSewa->close();

        $updateSewa = "INSERT INTO laporan(pelanggan, mobil, tanggal_sewa, pembayaran) VALUES(?,?,?,?)";
        $stmtInsertLaporan = $koneksi->prepare($updateSewa);
        $stmtInsertLaporan->bind_param("sssi", $pelanggan, $mobil, $tglPinjam, $tot_harga);
        $stmtInsertLaporan->execute();
        if ($stmtInsertLaporan->execute()) {
            echo "<script>document.location.href = 'index.php?x=order'</script>";
        } else {
            echo "alert('Terjadi kesalahan, Data gagal disimpan')";
        }
        $stmtInsertLaporan->close();
    } catch (\Throwable $th) {
        echo "Terjadi kesalahan: " . $th->getMessage();
    }
} else {
    echo "Metode permintaan tidak valid";
}
