<?php
include("konek.php");
$id = $_GET['id'];
$hapus = mysqli_query($konek, "delete from mobil where id_mobil='$id'");
if ($hapus) {
    echo "<script>document.location.href = 'index.php?x=mobil'</script>";
}
