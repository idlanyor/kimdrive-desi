<!doctype html>
<html lang="en">

<head>

</head>

<body>
    <div class="card">
        <h5 class="card-header">Ubah Data Admin</h5>
        <div class="card-body">
            <form method="post" action="?x=uadmin">
                <?php
                include("konek.php");
                $id = $_GET['id'];
                $cari = mysqli_query($konek, "select * from admin where id_admin='$id'") or die(mysqli_error());
                $data = mysqli_fetch_array($cari);
                ?>
                <input type="hidden" name="kode" value="<?php echo $data['id_admin']; ?>">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" name="txtNama" value="<?php echo $data['nama_admin']; ?>">
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="kelamin" class="form-control">
                        <option value="<?php echo $data['jenkel_admin']; ?>"><?php echo $data['jenkel_admin']; ?></option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="txtUsername" value="<?php echo $data['username']; ?>">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="txtPassword" value="<?php echo $data['password']; ?>">
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <select name="level" class="form-control">
                        <option value="<?php echo $data['level']; ?>"><?php echo $data['level']; ?></option>
                        <option value="ADMIN">ADMIN</option>
                        <option value="SUPER">SUPER</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

</body>

</html>