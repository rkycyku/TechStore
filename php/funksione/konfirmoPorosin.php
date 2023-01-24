<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once('../CRUD/porosiaCRUD.php');

$porosiaCRUD = new porosiaCRUD();

$porosiaCRUD->setPorosiaID($_GET['porosiaID']);
$porosiaCRUD->setStatusiPorosis('Pranuar Nga Bleresi');

$porosiaCRUD->perditesoStatusinPorosis();

echo '<script>document.location="../userPages/porosit.php"</script>';
$_SESSION['konfirmimiPorosis'] = true;
?>