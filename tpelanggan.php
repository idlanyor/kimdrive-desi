<!doctype html>
<html lang="en">

<head>

</head>

<body>
    <div class="card">
        <h5 class="card-header">Ubah Data Pelanggan</h5>
        <div class="card-body">
            <form method="post" action="?x=spelanggan">
                <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <input type="text" class="form-control" name="txtNama">
                </div>
                <div class="form-group">
                    <label>Nomor KTP</label>
                    <input type="number" maxlength="16" minlength="16" class="form-control" name="txtKtp">
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control" name="txtJK" id="">
                        <option value="Laki - Laki">Laki -Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="txtAlamat">
                </div>
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" class="form-control" name="txtTelp">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</body>

</html>