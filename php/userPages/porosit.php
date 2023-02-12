<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../funksione/kontrolloEshteLogin.php');
require_once('../CRUD/porosiaCRUD.php');

$porosiaCRUD = new porosiaCRUD();
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
      echo '<div class="mesazhiSuksesStyle">
                      <h3>Ju faleminderit qe konfirmuat porosin!</h3>
                      <button id="mbyllMesazhin">X</button>
                    </div>';
    }
    if (isset($_SESSION['porosiaMeSukses'])) {
      echo '<div class="mesazhiSuksesStyle">
                      <h3>Ju faleminderit qe konfirmuat porosin!</h3>
                      <button id="mbyllMesazhin">X</button>
                    </div>';
    }
    if (isset($_GET['produktID'])) {
      $porosiaCRUD->setProduktiID($_GET['produktID']);
      echo '<h2>Te gjitha porosit e Produktit me ID: ' . $_GET['produktID'] . '</h2>';
      echo '<h2>Emri i Produktit: ' . $_SESSION['emriProduktit'] . '</h2>';
      $porosiaCRUD->shfaqPorositSipasProduktit();
    } else {


      if (isset($_SESSION['userID'])) {
        $porosiaCRUD->setUserID($_SESSION['userID']);
        echo '<h2>Te gjitha porosit e tua</h2>';
      }
      if (isset($_GET['userID'])) {
        $porosiaCRUD->setUserID($_GET['userID']);
        echo '<h2>Te gjitha porosit e Klientit me ID: ' . $_GET['userID'] . '</h2>';
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