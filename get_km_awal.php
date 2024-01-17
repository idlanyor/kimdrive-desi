<?php
include("konek.php");

if (isset($_GET['id'])) {
    $idMobil = $_GET['id'];
    $query = "SELECT odometer FROM mobil WHERE id_mobil = $idMobil";
    $result = mysqli_query($konek, $query);

    if ($result) {
        $data = mysqli_fetch_assoc($result);
        echo $data['odometer'];
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($konek);
    }
} else {
    echo "Invalid Request";
}
?>
