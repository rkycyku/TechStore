<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['aksesi'] == 0) {
    echo '<script>document.location="../design/403.php"</script>';
}


?>