<?php
require_once('../CRUD/produktiCRUD.php');

if(isset($_POST['shtoProd'])){
  $produktiCRUD = new produktiCRUD();

  $produktiCRUD->setEmriProduktit($_POST['pdName']);
  $produktiCRUD->setEmriKompanis($_POST['kompania']);
  $produktiCRUD->setKategoriaProduktit($_POST['kategoria']);
  $produktiCRUD->setFotoProduktit($_FILES['pdPhoto']['name']);
  $produktiCRUD->setEmriStafit($_SESSION['name']);
  $produktiCRUD->setQmimiProduktit($_POST['cmimiPd']);

  $produktiCRUD->shtoProduktin();
  
  //Bartja e fotove ne Folderin perkates
  if (isset($_FILES['pdPhoto'])) {
    $foto = $_FILES['pdPhoto'];
    $emriFotos = $foto['name'];
    $emeriTempIFotes = $foto['tmp_name'];
    $madhesiaFotos = $foto['size'];
    $errorFoto = $foto['error'];
  
    $fileExt = explode('.', $emriFotos);
    $fileActualExt = strtolower(end($fileExt));
  
    $teLejuara = array('jpg', 'jpeg', 'png');
  
    if (in_array($fileActualExt, $teLejuara)) {
        if ($errorFoto === 0) {
            if ($madhesiaFotos < 1000000) {
              $destinacioniFotos = '../../img/products/'.$emriFotos;
              move_uploaded_file($emeriTempIFotes, $destinacioniFotos);
            } 
            else {
              $_SESSION['madhesiaGabim'] = true;
            }
        } 
        else {
          $_SESSION['problemNeBartje'] = true;
        }
    } 
    else {
      $_SESSION['fileNukSuportohet'] = true;
    }
  } 

  echo '<script>document.location="../admin/shtoProdukt.php"</script>';
}

?>