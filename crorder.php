<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Laporan Data Mobil</title>
</head>

<body style="padding:50px;" onload="window.print();">
    <?php
    include("konek.php");
    $cari = mysqli_query($konek, "select * from laporan");

    ?>
    <h3>Laporan Order Mobil</h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Mobil</th>
                <th>Pelanggan</th>
                <th>Tanggal Sewa</th>
                <th>Tanggal Kembali</th>
                <th>Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($data = mysqli_fetch_array($cari)) {
            ?>
                <tr>
                    <th scope="row"><?php echo $no; ?></th>
                    <td><?php echo $data['mobil']; ?></td>
                    <td><?php echo $data['pelanggan']; ?></td>
                    <td><?php echo $data['tanggal_sewa']; ?></td>
                    <td><?php echo $data['tanggal_kembali']; ?></td>
                    <td><?php echo $data['pembayaran']; ?></td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
    </table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>