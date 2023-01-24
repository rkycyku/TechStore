<?php
require_once('./kontrolloAksesin.php');
require_once('../CRUD/kategoriaCRUD.php');

$katCRUD = new kategoriaCRUD();

if (isset($_POST['shtoKat'])) {
  $_SESSION['emriKat'] = $_POST['emriKat'];
  $_SESSION['pershkrimiKat'] = $_POST['pershkrimiKat'];

  $katCRUD->insertoKategorinProduktit();
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
  <?php include '../design/headerAdmin.php' ?>
  <div class="forms">
    <form name="shtoKategorin" onsubmit="" action='' method="POST">
      <?php
      if (isset($_SESSION['katUShtua'])) {
        echo '
                  <div class="mesazhiSuksesStyle">
                    <h3>Kategoria u shtua me sukses!</h3>
                    <button id="mbyllMesazhin">
                      X
                    </button>
                  </div>
            ';
      }
      ?>
      <h1 class="form-title">Vendosja e Kategorive</h1>
      <input class="form-input" name="emriKat" type="text" placeholder="Emri i Kategoris" required>
      <input class="form-input" name="pershkrimiKat" type="text" placeholder="Pershkrimi i Kategoris">
      <input class="button" type="submit" value="Shtoni Kategorin" name='shtoKat'>
    </form>
  </div>
  <?php include('../funksione/importimiScriptave.php') ?>
</body>

</html>
<?php
unset($_SESSION['katUShtua']);
?>