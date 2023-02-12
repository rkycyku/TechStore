<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../funksione/kontrolloEshteLogin.php');
require_once('../CRUD/porosiaCRUD.php');

$porosiaCRUD = new porosiaCRUD();
if (isset($_GET['porosiaID'])) {
  $porosiaCRUD->setPorosiaID($_GET['porosiaID']);

  $teDhenatPorosis = $porosiaCRUD->shfaqProduktetEPorosisSipasID();
  $porosia = $porosiaCRUD->shfaqPorosinSipasID();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Te dhenat e porosis | Tech Store</title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/adminDashboard.css" />
  <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
</head>

<body>

  <?php include '../design/header.php' ?>

  <div class="containerDashboardP">
    <h1>
      Te dhenat per porosin me numer #<?php echo $_GET['porosiaID'] ?>
    </h1>
    <table>
      <tr>
        <th>Emri Produktit</th>
        <th>Qmimi Produktit</th>
        <th>Sasia e Porositur</th>
        <th>Qmimi total</th>
      </tr>
      <?php

      foreach ($teDhenatPorosis as $porosit) {
        echo '
            <tr>
              <td>' . $porosit['emriProduktit'] . '</td>
              <td>' . $porosit['qmimiProd'] . '</td>
              <td>' . $porosit['sasiaPorositur'] . '</td>
              <td>' . $porosit['qmimiTotal'] . ' €</td>
            </tr>
          ';
      }
      ?>
      <tr>
        <td colspan="3" align="right">
          <strong>Totali Pa TVSH: </strong>
        </td>
        <td>
          <strong>
            <?php echo number_format($porosia['TotaliPorosis'] - ($porosia['TotaliPorosis'] * 0.18), 2) . ' €' ?>
          </strong>
        </td>
      </tr>
      <tr>
        <td colspan="3" align="right">
          <strong>TVSH 18%: </strong>
        </td>
        <td>
          <strong>
            <?php echo number_format($porosia['TotaliPorosis'] * 0.18, 2) . ' €' ?>
          </strong>
        </td>
      </tr>
      <tr>
        <td colspan="3" align="right" style="font-size: 20pt">
          <strong>Qmimi Total: </strong>
        </td>
        <td style="font-size: 20pt">
          <strong>
            <?php echo number_format($porosia['TotaliPorosis'], 2) . ' €' ?>
          </strong>
        </td>
      </tr>
    </table>
    <a href="../funksione/fatura.php?nrPorosis=<?php echo $_GET['porosiaID'] ?>" target="_blank">
      <button class="button">Shkarko Faturen</button>
    </a>
  </div>

  <?php
  include '../design/footer.php';
  include('../funksione/importimiScriptave.php') ?>
</body>

</html>

<?php unset($_SESSION['konfirmimiPorosis']); ?>