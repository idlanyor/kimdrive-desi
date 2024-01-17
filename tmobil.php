<!doctype html>
<html lang="en">

<head>

</head>

<body>
    <div class="card">
        <h5 class="card-header">Tambah Data Mobil</h5>
        <div class="card-body">
            <form method="post" action="?x=smobil" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nomor Polisi</label>
                    <input type="text" class="form-control" name="txtPolisi">
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Merk Mobil</label>
                        <input type="text" class="form-control" name="txtMerk">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tahun Keluaran</label>
                        <input type="text" class="form-control" name="txtTahun">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Harga Pokok</label>
                        <input type="text" class="form-control" name="hargapokok">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Harga per KM</label>
                        <input type="text" class="form-control" name="hargakm">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Odometer</label>
                        <input type="text" class="form-control" name="txtOdometer">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="status">Status</label>
                        <select name="txtStatus" id="status" class="form-control">
                            <option value="AKTIF">AKTIF</option>
                            <option value="DIPINJAM">DIPINJAM</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" accept="image/*" class="form-control" name="txtFoto">
                </div>

                <input type="submit" value="Simpan" class="btn btn-primary"></input>
            </form>
        </div>
    </div>
</body>

</html>