<?php
require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/kompaniaCRUD.php');

$kompaniaCRUD = new kompaniaCRUD();

if (isset($_POST['shtoKompanin'])) {
  if (isset($_FILES['kompaniaLogo'])) {
    $_SESSION['LogoKompanis'] = $_FILES['kompaniaLogo'];
    $_SESSION['emriLogosKompanis'] = $_FILES['kompaniaLogo']['name'];
  }

  $_SESSION['emriKompanis'] = $_POST['emriKompanis'];
  $_SESSION['adresaKompanis'] = $_POST['adresaKompanis'];

  $kompaniaCRUD->insertoKompanin();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Vendosja e Kompanive | Tech Store</title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/header.css" />
  <link rel="stylesheet" href="../../css/forms.css" />
  <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
</head>

<body>
  <?php include '../design/header.php' ?>
  <div class="forms">
    <form name="shtoKompanin" action='' method="POST" enctype="multipart/form-data">
      <?php
      if (isset($_SESSION['mesazhiMeSukses'])) {
        echo '<div class="mesazhiSuksesStyle">
                    <p>Kompania u shtua me sukses!</p>
                    <button id="mbyllMesazhin">X</button>
                  </div>';
      }
      if (isset($_SESSION['madhesiaGabim'])) {
        echo '<div class="mesazhiGabimStyle">
                    <p>Madhesia e fotos eshte shume e madhe!</p>
                    <button id="mbyllMesazhin"></button>
                  </div>';
      }
      if (isset($_SESSION['problemNeBartje'])) {
        echo '<div class="mesazhiGabimStyle">
                    <p>Ndodhi nje problem ne bartjen e fotov!</p>
                    <button id="mbyllMesazhin">X</button>
                  </div>';
      }
      if (isset($_SESSION['fileNukSuportohet'])) {
        echo '<div class="mesazhiGabimStyle">
                    <p>Ky file nuk supportohet!</p>
                    <button id="mbyllMesazhin">X</button>
                  </div>';
      }
      ?>
      <h1 class="form-title">Vendosja e Kompanive</h1>
      <input class="form-input" name="emriKompanis" type="text" placeholder="Emri i Kompanis" required>
      <input class="form-input" name="kompaniaLogo" accept="image/*" type="file" placeholder="Logo e Kompanis" required>
      <input class="form-input" name="adresaKompanis" type="text" placeholder="Adresa e Kompanis">
      <input class="button" type="submit" value="Shtoni Kompanin" name='shtoKompanin'>
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