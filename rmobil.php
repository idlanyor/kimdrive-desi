<!doctype html>
<html lang="en">

<body>
    <?php
    include("konek.php");
    $cari = mysqli_query($konek, "select * from mobil");

    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Data Mobil</h6>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>No Polisi</th>
                        <th>Merk</th>
                        <th>Tahun</th>
                        <th>Harga/Hari</th>
                        <th>Tarif/KM</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($data = mysqli_fetch_array($cari)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $no; ?></th>
                            <td><?php echo $data['no_polisi']; ?></td>
                            <td><?php echo $data['merk']; ?></td>
                            <td><?php echo $data['tahun']; ?></td>
                            <td><?php echo $data['harga_pokok']; ?></td>
                            <td><?php echo $data['harga_km']; ?></td>
                            <td><?php echo $data['foto']; ?></td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
            <a href="crmobil.php" target="blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a>
        </div>
    </div>
</body>

</html>