<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once('../admin/kontrolloAksesAdmin.php');
require_once('../CRUD/produktiCRUD.php');

if($_SESSION['skeAksesAdmin'] == true){
    echo '<script>document.location="../admin/produktet.php"</script>';
}else{
    $produktiCRUD = new produktiCRUD();

    $produktiCRUD->setProduktiID($_GET['produktID']);
    $produktiCRUD->fshijProduktinSipasID();
}
?>