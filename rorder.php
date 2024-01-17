<!doctype html>
<html lang="en">

<body>
    <?php
    include("konek.php");
    $cari = mysqli_query($konek, "SELECT * FROM laporan") or die(mysqli_error());

    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Order Mobil</h6>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Pelanggan</th>
                        <th>Mobil</th>
                        <th>Tanggal Sewa</th>
                        <th>Pembayaran</th>
                        <th>Tanggal Kembali</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($data = mysqli_fetch_array($cari)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $no; ?></th>
                            <td><?php echo $data['pelanggan']; ?></td>
                            <td><?php echo $data['mobil']; ?></td>
                            <td><?php echo $data['tanggal_sewa']; ?></td>
                            <td><?php echo $data['pembayaran']; ?></td>
                            <td><?php echo $data['tanggal_kembali']; ?></td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
            <a href="crorder.php" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a>
        </div>
    </div>
</body>

</html>