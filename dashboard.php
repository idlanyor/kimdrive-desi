<?php
// Query pertama
$tm = $konek->prepare("SELECT COUNT(*) AS total_mobil FROM mobil");
$tm->execute();
$tm->bind_result($total_mobil);
$tm->fetch();
$tm->close(); // Tutup statement pertama
// ambil total mobil aktif
$ma = $konek->prepare("SELECT COUNT(*) AS total_mobil FROM mobil WHERE s_mobil='AKTIF'");
$ma->execute();
$ma->bind_result($mobil_aktif);
$ma->fetch();
$ma->close(); // Tutup statement pertama

// Query kedua
$ph = $konek->prepare("SELECT SUM(total_harga) AS penghasilan FROM kalkulasi_km;");
$ph->execute();
$ph->bind_result($penghasilan);
$ph->fetch();
$ph->close(); // Tutup statement kedua

// Query ketiga
$usr = $konek->prepare("SELECT COUNT(*) AS user FROM admin");
$usr->execute();
$usr->bind_result($user);
$usr->fetch();
$usr->close(); // Tutup statement ketiga

?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Mobil</div>
                        <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $total_mobil ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-car-side fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Jumlah Pendapatan</div>
                        <div class="h3 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($penghasilan, 0, ',', '.') ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pelanggan Terdaftar</div>
                        <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $user ?></div>
                        <div>
                            <div class="col-auto">
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Mobil Aktif</div>
                        <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $mobil_aktif ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-car fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">

    <div class="col-lg-6 mb-4">
        <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Mobil Ready</h6>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <?php
                    $cari = mysqli_query($konek, "select * from mobil where s_mobil='AKTIF'");
                    while ($data = mysqli_fetch_array($cari)) {
                    ?>
                        <li class="list-group-item"><?php echo $data['merk'] . " - " . $data['no_polisi']; ?></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>

    </div>
    <div class="col-lg-6 mb-4">
        <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Mobil Dipinjam</h6>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <?php
                    $cari = mysqli_query($konek, "select * from mobil where s_mobil='DIPINJAM'");
                    while ($data = mysqli_fetch_array($cari)) {
                    ?>
                        <li class="list-group-item"><?php echo $data['merk'] . " - " . $data['no_polisi']; ?></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>

    </div>
</div>