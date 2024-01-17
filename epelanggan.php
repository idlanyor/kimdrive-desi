<!doctype html>
<html lang="en">

<head>

</head>

<body>
    <?php
    include("konek.php");
    $id = $_GET['id'];
    $cari = mysqli_query($konek, "SELECT * from pelanggan where id=$id");
    $data = mysqli_fetch_array($cari);
    ?>
    <div class="card">
        <h5 class="card-header">Ubah Data Pelanggan</h5>
        <div class="card-body">
            <form method="post" action="?x=upelanggan">
                <input type="hidden" name="id_pel" value="<?php echo $data['id']; ?>">
                <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <input type="text" class="form-control" name="txtNama" value="<?php echo $data['nama']; ?>">
                </div>
                <div class="form-group">
                    <label>Nomor KTP</label>
                    <input type="number" class="form-control" name="txtKtp" value="<?php echo $data['ktp']; ?>">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="txtAlamat" value="<?php echo $data['alamat']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</body>

</html>