<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once('./kontrolloAksesAdmin.php');
require_once('../CRUD/produktiCRUD.php');

if ($_SESSION['skeAksesAdmin'] == true) {
    echo '<script>document.location="./produktet.php"</script>';
} else {
    $produktiCRUD = new produktiCRUD();

    $produktiCRUD->setProduktiID($_GET['produktID']);
    $produktiCRUD->fshijProduktinSipasID();
}
?>