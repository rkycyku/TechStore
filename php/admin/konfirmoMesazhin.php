<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once('../admin/kontrolloAksesin.php');
require_once('../CRUD/contactFormCRUD.php');

$contactFormCRUD = new contactFormCRUD();

$contactFormCRUD->setIDmesazhi($_GET['IDmesazhi']);
$contactFormCRUD->konfirmoMesazhin();
?>