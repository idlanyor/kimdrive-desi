<!doctype html>
<html lang="en">

<body>
    <?php
    include("konek.php");
    $query = "SELECT mobil.no_polisi, mobil.merk, pelanggan.nama, sewa.tgl_sewa, sewa.tgl_kembali,sewa.harga_akhir,sewa.lama_sewa, sewa.id_sewa
    FROM mobil
    INNER JOIN sewa ON mobil.id_mobil = sewa.id_mobil
    INNER JOIN pelanggan ON pelanggan.id = sewa.id_pelanggan";

    $result = mysqli_query($konek, $query);
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Order</h6>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>No Polisi</th>
                        <th>Merk</th>
                        <th>Nama Peminjam</th>
                        <th>Tgl Order</th>
                        <th>Lama Sewa</th>
                        <Th>Total Harga</Th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($data = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $no; ?></th>

                            <td><?php echo $data['no_polisi']; ?></td>
                            <td><?php echo $data['merk']; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['tgl_sewa']; ?></td>
                            <td><?php echo $data['lama_sewa']; ?> Hari</td>
                            <td>Rp. <?php echo $data['harga_akhir']; ?></td>
                            <td>
                                <a href="?x=dorder&id=<?php echo $data['id_sewa']; ?>" class="btn btn-success"><i class="fa fa-undo"></i></a>
                                <a href="?x=horder&id=<?php echo $data['id_sewa']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
            <a href="?x=torder" class="btn btn-primary">Tambah Order</a>
        </div>
    </div>
</body>

</html>