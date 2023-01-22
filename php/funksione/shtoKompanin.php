<?php
require_once('../CRUD/kompaniaCRUD.php');

if(isset($_POST['shtoKompanin'])){
  //Bartja e fotove ne Folderin perkates
  if (isset($_FILES['kompaniaLogo'])) {
    $foto = $_FILES['kompaniaLogo'];
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
              $_SESSION['emriUnikFotos'] = uniqid('', true).".".$fileActualExt;
              $destinacioniFotos = '../../img/slider/slidericons/'.$_SESSION['emriUnikFotos'];
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

  $kompaniaCRUD = new kompaniaCRUD();

  $kompaniaCRUD->setEmriKompanis($_POST['emriKompanis']);
  $kompaniaCRUD->setKompaniaLogo($_FILES['kompaniaLogo']['name']);
  if(isset($_SESSION['adresaKompanis'])){
    $kompaniaCRUD->setAdresaKompanis($_SESSION['adresaKompanis']);
  }
  
  $kompaniaCRUD->insertoKompanin();
  

  echo '<script>document.location="../admin/shtoKompanin.php"</script>';
}

?>