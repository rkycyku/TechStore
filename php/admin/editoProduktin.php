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
  $_SESSION['prouktiID'] = $_GET['produktID'];
  $_SESSION['EmriProduktit'] = $_POST['pdName'];
  $_SESSION['EmriKompanis'] = $_POST['kompania'];
  $_SESSION['KategoriaProduktit'] = $_POST['kategoria'];
  $_SESSION['QmimiProduktit'] = $_POST['cmimiPd'];
  if ($_FILES['pdPhoto']['name'] == '') {
    $produktiCRUD->editoProduktin(false);
  } else {
    $_SESSION['FotoProduktit'] = $_FILES['pdPhoto'];
    $_SESSION['EmriFotosProduktit'] = $_FILES['pdPhoto']['name'];
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
  <?php
  include '../design/header.php';
  echo '<div class="containerDashboard">';
  echo '</div>';
  ?>
  <div class="forms">
    <form name="editoProduktin" onsubmit="" action='' method="POST" enctype="multipart/form-data">
      <h1 class="form-title">Editimi i Produktiti</h1>
      <input class="form-input" name="pdName" type="text" placeholder="Emri i Produktit"
        value='<?php echo $produkti['emriProduktit'] ?>' required>
      <?php
      $kompanit = $kompania->shfaqKompanin();

      echo '<select name="kompania" class="dropdown">
              <option hidden value="te tjera">Zgjedhni Kompanin</option>
          ';

      foreach ($kompanit as $kompania) {
        echo '<option value="' . $kompania['emriKompanis'] . '">' . $kompania['emriKompanis'] . '</option>';
      }
      echo '<option selected hidden value="' . $produkti['emriKompanis'] . '">' . $produkti['emriKompanis'] . '</option> </select>';
      ?>
      <?php
      $kategorit = $kategoria->shfaqKategorin();

      echo '<select name="kategoria" class="dropdown">';
      foreach ($kategorit as $kategoria) {
        echo '<option value="' . $kategoria['emriKategoris'] . '">' . $kategoria['emriKategoris'] . '</option>';
      }
      echo '<option selected hidden value="' . $produkti['kategoriaProduktit'] . '">' . $produkti['kategoriaProduktit'] . '</option> </select>';
      ?>
      <input class="form-input" name="pdPhoto" accept="image/*" type="file" placeholder="Foto Produktit">
      <input class="form-input" name="cmimiPd" type="text" placeholder="Qmimi i Produktit"
        value='<?php echo $produkti['qmimiProduktit'] ?>' required>
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