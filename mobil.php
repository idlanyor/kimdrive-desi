<!doctype html>
<html lang="en">

<body>
    <?php
    include("konek.php");
    $cari = mysqli_query($konek, "select * from mobil");

    ?>
    <div class="card shadow mb-4 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Mobil</h6>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>No Polisi</th>
                        <th>Merk</th>
                        <th>Harga/Hari</th>
                        <th>Tarif/KM</th>
                        <th>Status</th>
                        <th>Foto</th>
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
                            <th scope="row"><?php echo $no; ?></th>
                            <td><?php echo $data['no_polisi']; ?></td>
                            <td><?php echo $data['merk']; ?></td>
                            <td><?php echo $data['harga_pokok']; ?></td>
                            <td><?php echo $data['harga_km']; ?></td>
                            <td><?php echo $data['s_mobil']; ?></td>
                            <td>
                                <img width="200px" src="./foto_mobil/<?php echo $data['foto']; ?>">
                            </td>
                            <td>
                                <a href="?x=hmobil&id=<?php echo $data['id_mobil']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                <a href="?x=emobil&id=<?php echo $data['id_mobil']; ?>" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>
                            </td>

                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
            <a href="?x=tmobil" class="btn btn-primary">Tambah</a>
        </div>
    </div>

</body>

</html>