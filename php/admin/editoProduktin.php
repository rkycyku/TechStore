<?php
require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/produktiCRUD.php');
require_once('../CRUD/kategoriaCRUD.php');
require_once('../CRUD/kompaniaCRUD.php');
$kompania = new kompaniaCRUD();
$kategoria = new kategoriaCRUD();
$produktiCRUD = new produktiCRUD();

$produktiCRUD->setProduktiID($_GET['produktID']);
$produkti = $produktiCRUD->shfaqProduktinSipasID();
if (!isset($_SESSION)) {
  session_start();
}
if (isset($_POST['editoProd'])) {
  $produktiCRUD->setProduktiID($_GET['produktID']);
  $produktiCRUD->setEmriProduktit($_POST['pdName']);
  $produktiCRUD->setEmriKompanis($_POST['kompania']);
  $produktiCRUD->setKategoriaProduktit($_POST['kategoria']);
  $produktiCRUD->setEmriStafit($_SESSION['name']);
  $produktiCRUD->setQmimiProduktit($_POST['cmimiPd']);
  $produktiCRUD->setPershkrimiProduktit($_POST['pershkrimiProd']);

  if ($_FILES['pdPhoto']['name'] == '') {
    $produktiCRUD->editoProduktin(false);
  } else {
    $_SESSION['FotoProduktit'] = $_FILES['pdPhoto'];
    $produktiCRUD->editoProduktin(true);
  }
}
if (isset($_POST['anulo'])) {
  echo '<script>document.location="./produktet.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Editimi i Produktiti | Tech Store</title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/forms.css" />
  <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
</head>

<body>
  <?php include '../design/header.php'; ?>
  <div class="forms">
    <form name="editoProduktin" onsubmit="" action='' method="POST" enctype="multipart/form-data">
      <h1 class="form-title">Editimi i Produktiti</h1>
      <input class="form-input" name="pdName" type="text" placeholder="Emri i Produktit"
        value='<?php echo $produkti['emriProduktit'] ?>' required>
      <?php $kompanit = $kompania->shfaqKompanin(); ?>
      <select name="kompania" class="dropdown">
        <option hidden value="te tjera">Zgjedhni Kompanin</option>
        <?php

        foreach ($kompanit as $kompania) {
          ?>
          <option value="<?php echo $kompania['kompaniaID'] ?>"><?php echo $kompania['emriKompanis'] ?></option>
          <?php
        }
        ?>
        <option selected hidden value="<?php echo $produkti['kompaniaID'] ?>"><?php echo $produkti['emriKompanis'] ?>
        </option>
      </select>
      <?php
      ?>
      <?php
      $kategorit = $kategoria->shfaqKategorin();

      ?><select name="kategoria" class="dropdown">
        <?php
        foreach ($kategorit as $kategoria) {
          ?>
          <option value="<?php echo $kategoria['kategoriaID'] ?>"><?php echo $kategoria['emriKategoris'] ?></option>
          <?php
        }
        ?>
        <option selected hidden value="<?php echo $produkti['kategoriaID'] ?>"><?php echo $produkti['emriKategoris'] ?></option>
      </select>
      <?php
      ?>
      <input class="form-input" name="pdPhoto" accept="image/*" type="file" placeholder="Foto Produktit">
      <input class="form-input" name="cmimiPd" type="text" placeholder="Qmimi i Produktit"
        value='<?php echo $produkti['qmimiProduktit'] ?>' required>
      <textarea placeholder="Pershkrimi Produktit"
        name="pershkrimiProd"><?php echo $produkti['pershkrimiProd'] ?></textarea>
      <div>
        <input class="button" type="submit" value="Editoni Produktin" name='editoProd'>
        <input class="button" type="submit" value="Anulo" name='anulo'>
      </div>
    </form>
  </div>
  <script src="../../js/validimiFormave.js"></script>
  <script src="../../js/mbyllMesazhin.js"></script>
</body>

</html>