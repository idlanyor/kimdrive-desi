<!doctype html>
<html lang="en">

<body>
    <?php
    include("konek.php");
    $cari = mysqli_query($konek, "select * from pelanggan") or die(mysqli_error());

    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pelanggan</h6>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>KTP</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($data = mysqli_fetch_array($cari)) {
                    ?>
                        <tr>
                            <!-- </?php var_dump($data)?> -->
                            <th scope="row"><?= $no; ?></th>
                            <td><?= $data['ktp']; ?></td>
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['alamat']; ?></td>
                            <td>
                                <a href="?x=hpelanggan&id=<?= $data['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                <a href="?x=epelanggan&id=<?= $data['id']; ?>" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>
                            </td>

                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
            <a href="?x=tpelanggan" class="btn btn-primary">Tambah</a>
        </div>
    </div>

</body>

</html>