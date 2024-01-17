<!doctype html>
<html lang="en">

<body>
    <?php
    if ($_SESSION['level'] == "SUPER") {
        include("konek.php");
        $cari = mysqli_query($konek, "select * from admin") or die(mysqli_error());

    ?>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Admin</h6>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Admin</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($data = mysqli_fetch_array($cari)) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $no; ?></th>
                                <td><?php echo $data['nama_admin']; ?></td>
                                <td><?php echo $data['jenkel_admin']; ?></td>
                                <td><?php echo $data['level']; ?></td>
                                <td>
                                    <a href="?x=hadmin&id=<?php echo $data['id_admin']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    <a href="?x=eadmin&id=<?php echo $data['id_admin']; ?>" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
                <a href="?x=tadmin" class="btn btn-primary">Tambah</a>
            </div>
        </div>
    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Level ADMIN tidak boleh masuk!");
            window.location = "index.php";
        </script>
    <?php

    }
    ?>
</body>

</html>