<!doctype html>
<html lang="en">

<head>

</head>

<body>
    <?php
    include("konek.php");
    $id = $_GET['id'];
    $cari = mysqli_query($konek, "select * from mobil where id_mobil='$id'");
    $data = mysqli_fetch_array($cari);
    ?>
    <div class="card">
        <h5 class="card-header">Ubah Data Mobil</h5>
        <div class="card-body">
            <form method="post" action="?x=umobil" enctype="multipart/form-data">
                <input type="hidden" name="id_mob" value="<?php echo $data['id_mobil']; ?>">
                <div class="form-group">
                    <label>Nomor Polisi</label>
                    <input type="text" class="form-control" name="txtPolisi" value="<?php echo $data['no_polisi']; ?>">
                </div>
                <div class="row">

                    <div class="form-group col-md-6">
                        <label>Merk Mobil</label>
                        <input type="text" class="form-control" name="txtMerk" value="<?php echo $data['merk']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tahun Keluaran</label>
                        <input type="text" class="form-control" name="txtTahun" value="<?php echo $data['tahun']; ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Harga Pokok</label>
                        <input type="text" class="form-control" name="hargapokok" value="<?php echo $data['harga_pokok']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Harga Per KM</label>
                        <input type="text" class="form-control" name="hargakm" value="<?php echo $data['harga_km']; ?>">
                    </div>
                </div>
                <div class="row">
                <div class="form-group col-md-6">
                    <label>Odometer</label>
                    <input type="text" disabled class="form-control" name="txtHarga" value="<?php echo $data['odometer']; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="txtStatus">Status</label>
                    <select class="form-control" name="txtStatus" id="txtStatus">
                        <option value="AKTIF">AKTIF</option>
                        <option value="DIPINJAM">DIPINJAM</option>
                    </select>
                </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</body>

</html>