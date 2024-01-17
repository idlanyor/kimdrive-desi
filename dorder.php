<!doctype html>
<html lang="en">

<head>

</head>

<body>
    <?php
    $id_sewa = $_GET['id'];
    include("konek.php");
    $cari = mysqli_query($konek, "SELECT * from sewa where id_sewa=$id_sewa");
    $sewa = mysqli_fetch_array($cari);
    $id_mobil = $sewa['id_mobil'];
    $id_pelanggan = $sewa['id_pelanggan'];
    $cari2 = mysqli_query($konek, "SELECT * from mobil where id_mobil=$id_mobil");
    $mobil = mysqli_fetch_array($cari2);
    $cari3 = mysqli_query($konek, "SELECT * FROM pelanggan where id=$id_pelanggan");
    $pelanggan = mysqli_fetch_array($cari3);

    ?>
    <div class="card">
        <h5 class="card-header">Pengembalian Mobil</h5>
        <div class="card-body">
            <form method="post" action="?x=doneorder">
                <input type="hidden" value="<?= $sewa['id_mobil'] ?>" name="idmob">
                <input type="hidden" value="<?= $sewa['id_pelanggan'] ?>" name="idpel">
                <input type="hidden" value="<?= $sewa['id_sewa'] ?>" name="idorder">
                <div class="form-group">
                    <label>Mobil</label>
                    <input name="mobil" type="text" class="form-control" readonly value="<?= $mobil['merk'] . ' - ' . $mobil['no_polisi'] ?>">
                </div>
                <div class="form-group">
                    <label>Harga Per KM</label>
                    <input type="number" name="hargamob" class="form-control" readonly value="<?= $mobil['harga_km'] ?>">
                </div>
                <div class="form-group">
                    <label>Pelanggan</label>
                    <input name="pelanggan" type="text" class="form-control" readonly value="<?= $pelanggan['nama'] . ' - ' . $pelanggan['alamat'] ?>">
                </div>
                <div class="form-group">
                    <label>DP /Uang Muka(Rp)</label>
                    <input type="number" class="form-control" readonly name="uangMuka" value="<?= $sewa['uang_muka_dibayar'] ?>">
                </div>
                <div class="form-group">
                    <label>Tanggal Pinjam</label>
                    <input type="date" class="form-control" readonly name="tglPinjam" value="<?= $sewa['tgl_sewa'] ?>">
                </div>
                <div class="form-group">
                    <label>KM Awal</label>
                    <input type="number" readonly class="form-control" value="<?= $sewa['km_awal'] ?>" name="kmAwal">
                </div>
                <div class="form-group">
                    <label>KM Akhir</label>
                    <input type="number" class="form-control" name="kmAkhir" value="<?= substr($sewa['km_awal'], 0, -3) ?>">
                </div>
                
                <input type="submit" class="btn btn-primary" value="Simpan">
            </form>
        </div>
    </div>
    <script>
        function updateDataMobil(idMobil) {
            // Dapatkan elemen input KM Awal
            var kmAwalInput = document.querySelector('input[name="kmAwal"]');

            // Kirim permintaan AJAX untuk mendapatkan data KM Awal dari server
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Update nilai KM Awal pada input
                    kmAwalInput.value = xhr.sewaponseText;
                }
            };
            xhr.open("GET", "get_km_awal.php?id=" + idMobil, true);
            xhr.send();
        }
    </script>

</body>

</html>