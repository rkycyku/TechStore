<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once('../admin/kontrolloAksesAdmin.php');
require_once('../CRUD/produktiCRUD.php');
$produktiCRUD = new produktiCRUD();

$produktiCRUD->setProduktiID($_GET['produktID']);
$produktiCRUD->fshijProduktinSipasID();
?>