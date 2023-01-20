<?php
require_once('../CRUD/produktiCRUD.php');
$produktiCRUD = new produktiCRUD();
if(!isset($_SESSION) || empty($_SESSION)){
  session_start();
}
if(isset($_POST['shtoProd'])){
  $produktiCRUD->setEmriProduktit($_POST['pdName']);
  $produktiCRUD->setEmriKompanis($_POST['kompania']);
  $produktiCRUD->setKategoriaProduktit($_POST['kategoria']);
  $produktiCRUD->setFotoProduktit($_POST['pdPhoto']);
  $produktiCRUD->setEmriStafit($_SESSION['name']);
  $produktiCRUD->setQmimiProduktit($_POST['cmimiPd']);
  
  $produktiCRUD->shtoProduktin();

    echo '<script>document.location="../admin/shtoProdukt.php"</script>';
}

?>