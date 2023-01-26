<?php
if (!isset($_SESSION)) {
  session_start();
}
require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/porosiaCRUD.php');

$porosiaCRUD = new porosiaCRUD();
$porosia = $porosiaCRUD->shfaqTeGjithaPorosite();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Porosite | Tech Store</title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
  <link rel="stylesheet" href="../../css/adminDashboard.css" />
</head>

<body>

  <?php include '../design/header.php' ?>

  <div class="containerDashboardP">
    <?php
    if (isset($_SESSION['statusiUPerditesua'])) {
      if ($_SESSION['statusiUPerditesua'] == true) {
        echo '
                  <div class="mesazhiSuksesStyle">
                    <p>Statusi i porosis u perditesua me sukses!</p>
                    <button id="mbyllMesazhin">
                      X
                    </button>
                  </div>
            ';
      } else {
        echo '
            <div class="mesazhiGabimStyle">
              <p>Statusi i porosis nuk u perditesua!</p>
              <button id="mbyllMesazhin">
                X
              </button>
            </div>
      ';
      }

    }
    ?>
    <h1>Lista e Porosive</h1>
    <table>
      <tr>
        <th>Numri i Porosis</th>
        <th>ID Produktit</th>
        <th>Emri Produktit</th>
        <th>ID Klienti</th>
        <th>Emri Klientit</th>
        <th>Adresa Klientit</th>
        <th>Sasia e Porositur</th>
        <th>Qmimi total</th>
        <th>Data e porosis</th>
        <th>Statusi i porosis</th>
        <th>Funksione</th>
      </tr>
      <?php


      foreach ($porosia as $porosia) {
        echo '
            <tr>
              <td>' . $porosia['porosiaID'] . '</td>
              <td>' . $porosia['produktiID'] . '</td>
              <td>' . $porosia['emriProduktit'] . '</td>
              <td>' . $porosia['userID'] . '</td>
              <td>' . $porosia['emriKlientit'] . '</td>
              <td>' . $porosia['adresaKlientit'] . ', ' . $porosia['qyteti'] . '</td>
              <td>' . $porosia['sasiaPorositur'] . '</td>
              <td>' . $porosia['qmimiTotal'] . ' €</td>
              <td>' . $porosia['dataPorosis'] . '</td>
              <td>' . $porosia['statusiPorosis'] . '</td>
              <td><button class="edito"><a href="./editoStatusinPorosis.php?porosiaID=' . $porosia['porosiaID'] . '">Ndrysho</a></button></td>
            </tr>
          ';
      }
      ?>
    </table>
  </div>

  <?php
  include '../design/footer.php';
  include('../funksione/importimiScriptave.php') ?>
</body>

</html>
<?php unset($_SESSION['statusiUPerditesua']) ?>