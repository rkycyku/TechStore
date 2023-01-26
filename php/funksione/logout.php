<?php
if (!isset($_SESSION)) {
    session_start();
}

session_destroy();

session_start();
$_SESSION['aksesi'] = 0;

echo '<script>document.location="../../php/pages/index.php"</script>'

    ?>