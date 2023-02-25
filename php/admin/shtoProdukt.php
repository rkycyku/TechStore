<?php
require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/produktiCRUD.php');
require_once('../CRUD/kategoriaCRUD.php');
require_once('../CRUD/kompaniaCRUD.php');

$kompania = new kompaniaCRUD();
$kategoria = new kategoriaCRUD();
$produktiCRUD = new produktiCRUD();

if (!isset($_SESSION)) {
  session_start();
}

if (isset($_POST['shtoProd'])) {
  $produktiCRUD->setEmriProduktit($_POST['pdName']);
  $produktiCRUD->setEmriKompanis($_POST['kompania']);
  $produktiCRUD->setKategoriaProduktit($_POST['kategoria']);
  $produktiCRUD->setEmriStafit($_SESSION['name']);
  $produktiCRUD->setQmimiProduktit($_POST['cmimiPd']);
  $produktiCRUD->setPershkrimiProduktit($_POST['pershkrimiProd']);
  $_SESSION['FotoProduktit'] = $_FILES['pdPhoto'];

  $produktiCRUD->shtoProduktin();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Vendosja e Produkteve | Tech Store</title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/header.css" />
  <link rel="stylesheet" href="../../css/forms.css" />
  <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
</head>

<body>
  <?php include '../design/header.php' ?>
  <div class="forms">
    <form name="shtoProduktin" onsubmit="return validimiShtimiProduktit();" action='' method="POST"
      enctype="multipart/form-data">
      <?php
      if (isset($_SESSION['mesazhiMeSukses'])) {
        ?>
        <div class="mesazhiStyle mesazhiSuksesStyle">
          <p>Produkti u shtua me sukses!</p>
          <button id="mbyllMesazhin">
            <i class="fa-solid">&#xf00d;</i>
          </button>
        </div>
        <?php
      }
      if (isset($_SESSION['madhesiaGabim'])) {
        ?>
        <div class="mesazhiStyle mesazhiGabimStyle">
          <p>Madhesia e fotos eshte shume e madhe!</p>
          <button id="mbyllMesazhin">
            <i class="fa-solid">&#xf00d;</i>
          </button>
        </div>
        <?php
      }
      if (isset($_SESSION['problemNeBartje'])) {
        ?>
        <div class="mesazhiStyle mesazhiGabimStyle">
          <p>Ndodhi nje problem ne bartjen e fotov!</p>
          <button id="mbyllMesazhin">
            <i class="fa-solid">&#xf00d;</i>
          </button>
        </div>
        <?php
      }
      if (isset($_SESSION['fileNukSuportohet'])) {
        ?>
        <div class="mesazhiStyle mesazhiGabimStyle">
          <p>Ky file nuk supportohet!</p>
          <button id="mbyllMesazhin">
            <i class="fa-solid">&#xf00d;</i>
          </button>
        </div>
        <?php
      }
      ?>
      <h1 class="form-title">Vendosja e Produkteve</h1>
      <input class="form-input" name="pdName" type="text" placeholder="Emri i Produktit" required>
      <?php $kompania->shfaqKompanitSelektim(); ?>
      <?php $kategoria->shfaqKategorinSelektim(); ?>
      <input class="form-input" name="pdPhoto" accept="image/*" type="file" value="Foto Produktit" required>
      <input class="finput" name="cmimiPd" type="text" placeholder="Qmimi i Produktit" required>
      <textarea placeholder="Pershkrimi Produktit" name="pershkrimiProd"></textarea>
      <button class="button" type="submit" value="" name='shtoProd'>Shtoni Produktin <i class="fa-solid">&#xf0fe;</i></button>
    </form>
  </div>
  <?php include('../funksione/importimiScriptave.php') ?>
</body>

</html>
<?php
unset($_SESSION['mesazhiMeSukses']);
unset($_SESSION['madhesiaGabim']);
unset($_SESSION['problemNeBartje']);
unset($_SESSION['fileNukSuportohet']);
?>