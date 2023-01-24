<?php
require_once('./kontrolloAksesAdmin.php');
require_once('../CRUD/userCRUD.php');
$userCRUD = new userCRUD();
$userCRUD->setUserID($_GET['userID']);
$useri = $userCRUD->shfaqSipasID();
if (!isset($_SESSION)) {
    session_start();
}

$userCRUD->setUserID($_GET['userID']);
$userCRUD->setEmri($_GET['emri']);
$userCRUD->setMbiemri($_GET['mbiemri']);
$userCRUD->setAksesi($_GET['aksesi']);


$userCRUD->perditesoTeDhenatAdmini();

$_SESSION['aksesiUPerditesua'] = true;
echo '<script>document.location="./perdoruesit.php"</script>';

?>