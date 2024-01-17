<!doctype html>
<html lang="en">

<head>

</head>

<body>
    <?php
    include("konek.php");
    $cari = mysqli_query($konek, "SELECT * from mobil where s_mobil='AKTIF'");
    $cari2 = mysqli_query($konek, "SELECT * from pelanggan");

    ?>
    <div class="card">
        <h5 class="card-header">Tambah Data Order</h5>
        <div class="card-body">
            <form method="post" action="?x=confirmorder">
                <div class="form-group">
                    <label>Nomor Polisi</label>
                    <select name="polisi" class="form-control" onchange="updateDataMobil(this.value)">
                        <option value="">--Pilih--</option>
                        <?php
                        while ($data = mysqli_fetch_array($cari)) {
                        ?>
                            <option value="<?php echo $data['id_mobil']; ?>"><?php echo $data['no_polisi'] . " - " . $data['merk']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Pelanggan</label>
                    <select name="idpel" class="form-control">
                        <option value="">--Pilih--</option>
                        <?php
                        while ($data = mysqli_fetch_array($cari2)) {
                        ?>
                            <option value="<?php echo $data['id']; ?>"><?php echo ($data['jk'] == 'Perempuan') ? 'Ibu ' : 'Bapak ', $data['nama'] . " - " . $data['alamat']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>KM Awal</label>
                    <input type="text" readonly class="form-control" name="kmAwal">
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Tanggal Pinjam</label>
                        <input type="date" class="form-control" name="tglPinjam">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tanggal Kembali</label>
                        <input type="date" class="form-control" name="tglKembali">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
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
                    kmAwalInput.value = xhr.responseText;
                }
            };
            xhr.open("GET", "get_km_awal.php?id=" + idMobil, true);
            xhr.send();
        }
    </script>

</body>

</html>