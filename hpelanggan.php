<?php
include("konek.php");
$id = $_GET['id'];
$hapus = mysqli_query($konek, "delete from pelanggan where id=$id");
if ($hapus) {
    echo "<script>document.location.href = 'index.php?x=pelanggan'</script>";
}
