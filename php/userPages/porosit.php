<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../funksione/kontrolloEshteLogin.php');
require_once('../CRUD/porosiaCRUD.php');
require_once('../CRUD/produktiCRUD.php');

$porosiaCRUD = new porosiaCRUD();
$produktiCRUD = new produktiCRUD();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Orders | Tech Store</title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/adminDashboard.css" />
  <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
</head>

<body>

  <?php include '../design/header.php' ?>

  <div class="containerDashboardP">

    <?php
    if (isset($_SESSION['konfirmimiPorosis'])) {
      ?>
      <div class="mesazhiSuksesStyle">
        <h3>Ju faleminderit qe konfirmuat porosin!</h3>
        <button id="mbyllMesazhin" class="fa-solid">
          <i class="fa-solid">&#xf00d;</i>
        </button>
      </div>
      <?php
    }
    if (isset($_SESSION['porosiaMeSukses'])) {
      ?>
      <div class="mesazhiSuksesStyle">
        <h3>Ju faleminderit qe konfirmuat porosin!</h3>
        <button id="mbyllMesazhin" class="fa-solid">
          <i class="fa-solid">&#xf00d;</i>
        </button>
      </div>
      <?php
    }
    if (isset($_GET['produktID'])) {
      $porosiaCRUD->setProduktiID($_GET['produktID']);
      $produktiCRUD->setProduktiID($_GET['produktID']);

      $emriProd = $produktiCRUD->shfaqProduktinSipasID();
      ?>
      <h2>Te gjitha porosit e Produktit me ID:
        <?php echo $_GET['produktID'] ?>
      </h2>
      <h2>Emri i Produktit:
        <?php echo $emriProd['emriProduktit'] ?>
      </h2>
      <?php
      $porosiaCRUD->shfaqPorositSipasProduktit();
    } else {
      if (isset($_SESSION['userID'])) {
        $porosiaCRUD->setUserID($_SESSION['userID']);
        ?>
        <h2>Te gjitha porosit e tua</h2>
        <?php
      }
      if (isset($_GET['userID'])) {
        $porosiaCRUD->setUserID($_GET['userID']);
        ?>
        <h2>Te gjitha porosit e Klientit me ID:
          <?php echo $_GET['userID'] ?>
        </h2>
        <?php
      }
      $porosia = $porosiaCRUD->shfaqPorositEKlientit();
    }
    ?>

  </div>

  <?php
  include '../design/footer.php';
  include('../funksione/importimiScriptave.php') ?>
</body>

</html>

<?php
unset($_SESSION['konfirmimiPorosis']);
unset($_SESSION['porosiaMeSukses']);
?>