<?php
if (isset($_SESSION['username'])) {
    session_unset();
    session_destroy();
}
// header("Location:index.php");
?>
<script>
    document.location.href = 'login.php'
</script>
