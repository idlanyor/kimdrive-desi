<?php
include("konek.php");
session_start();
$username = $_POST['txtUsername'];
$password = $_POST['txtPassword'];
$cek = mysqli_query($konek, "select * from admin where username='$username' and password='$password'");
$data = mysqli_fetch_array($cek);
$banyak = mysqli_num_rows($cek);
if ($banyak >= 1) {
    $_SESSION['username'] = $data['username'];
    $_SESSION['id_admin'] = $data['id_admin'];
    $_SESSION['level'] = $data['level'];
    $_SESSION['nama_admin'] = $data['nama_admin'];
    header("Location:index.php");
} else { ?>
    <script type="text/javascript">
        alert("Username atau Password Masih Salah!");
    </script>
<?php
    // header("Location:login.php");
}
