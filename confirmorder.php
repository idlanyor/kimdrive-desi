<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <?php
    include "konek.php";
    $polisi = $_POST['polisi'];
    $pelanggan = $_POST['idpel'];
    $kmAwal = $_POST['kmAwal'];
    $tglPinjam = $_POST['tglPinjam'];
    $tglKembali = $_POST['tglKembali'];
    $cari = mysqli_query($konek, "select * from mobil where id_mobil='$polisi'");
    $cari2 = mysqli_query($konek, "select * from pelanggan where id='$pelanggan'");
    $mob = mysqli_fetch_array($cari);
    $pel = mysqli_fetch_array($cari2);
    ?>
    <div class="card">
        <h5 class="card-header">Konfirmasi Order</h5>
        <div class="card-body">
            <form action="?x=sorder" method="post">
                <input type="hidden" name="polisi" value="<?= $polisi ?>">
                <input type="hidden" name="idpel" value="<?= $pelanggan ?>">
                <input type="hidden" name="kmAwal" value="<?= $kmAwal ?>">
                <input type="hidden" name="tglPinjam" value="<?= $tglPinjam ?>">
                <input type="hidden" name="tglKembali" value="<?= $tglKembali ?>">
                <!-- <div class="form-group">
                    <label>KM Awal</label>
                    <input type="text" readonly class="form-control" name="kmAwal">
                </div> -->
                <table class="table table-responsive-sm table-bordered">
                    <tr><strong>Rincian Order</strong></tr>
                    <hr>
                    <tr>
                        <td>Mobil</td>
                        <td><?= $mob['merk'] . ' - ' . $mob['no_polisi'] ?></td>
                    </tr>
                    <tr>
                        <td>Pelanggan</td>
                        <td><?= $pel['nama'] . ' - ' . $pel['alamat'] ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Pinjam</td>
                        <td><?= date("d F Y", strtotime($tglPinjam)) ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Kembali</td>
                        <td><?= date("d F Y", strtotime($tglKembali)) ?></td>
                    </tr>

                    <tr>
                        <td>Harga Pokok</td>
                        <td>Rp. <?= number_format($mob['harga_pokok'], 0, ',', '.') ?></td>
                    </tr>
                    <?php
                    $tpin = new DateTime($tglPinjam);
                    $tkem = new DateTime($tglKembali);
                    $selisih = $tpin->diff($tkem);
                    // echo $selisih->days;
                    $bayar = ($selisih->days * $mob['harga_pokok'])
                    ?>
                    <tr>
                        <td>Lama Pinjam</td>
                        <td><?= $selisih->days ?> Hari</td>
                        <input type="hidden" name="lamaSewa" value="<?= $selisih->days ?>">
                    </tr>
                    <tr>
                        <td>Total DP Yang harus dibayar</td>
                        <td><strong>Rp. <?= number_format($bayar, 0, ',', '.') ?></strong></td>
                    </tr>
                    <tr>
                        <td>DP Dibayarkan</td>
                        <td class="d-flex"><span class="mr-3">Rp.</span><input value="<?= $bayar ?>" required max="<?= $bayar ?>" min="<?= $bayar ?>" class="form-control" type="number" name="uangMukaDibayar"></td>
                    </tr>
                </table>
                <input type="hidden" name="uangMuka" value="<?= $bayar ?>">
                <a href="?x=order" class="btn btn-danger float-right mx-3">Batal</a>
                <input value="Proses" type="submit" class="btn btn-success float-right">
            </form>
        </div>
    </div>
</body>

</html>