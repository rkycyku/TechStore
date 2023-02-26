<?php
require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/kategoriaCRUD.php');

$katCRUD = new kategoriaCRUD();

if (isset($_POST['shtoKat'])) {
  $_SESSION['emriKat'] = $_POST['emriKat'];
  $_SESSION['pershkrimiKat'] = $_POST['pershkrimiKat'];
  $katCRUD->insertoKategorinProduktit();

  $_SESSION['katUShtua'] = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Vendosja e Kategorive | Tech Store</title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/header.css" />
  <link rel="stylesheet" href="../../css/forms.css" />
  <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
</head>

<body>
  <?php include '../design/header.php' ?>
  <div class="forms">
    <form name="shtoKategorin" onsubmit="return validimiKategoris();" action='' method="POST">
      <?php
      if (isset($_SESSION['katUShtua'])) {
        ?>
        <div class="mesazhiStyle mesazhiSuksesStyle">
          <p>Kategoria u shtua me sukses!</p>
          <button id="mbyllMesazhin">
            <i class="fa-solid">&#xf00d;</i>
          </button>
        </div>
        <?php
      }
      ?>
      <h1 class="form-title">Vendosja e Kategorive</h1>
      <input class="form-input" name="emriKat" type="text" placeholder="Emri i Kategoris">
      <input class="form-input" name="pershkrimiKat" type="text" placeholder="Pershkrimi i Kategoris">
      <button class="button" type="submit" value="" name='shtoKat'>Shtoni Kategorin <i class="fa-solid">&#xf0fe;</i></button>
    </form>
  </div>
  <?php include('../funksione/importimiScriptave.php') ?>
</body>

</html>
<?php
unset($_SESSION['katUShtua']);
?>