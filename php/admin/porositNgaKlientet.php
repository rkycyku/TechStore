<?php
if (!isset($_SESSION)) {
  session_start();
}
require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/porosiaCRUD.php');

$porosiaCRUD = new porosiaCRUD();


if (isset($_GET['porosiaID'])) {
  $porosiaCRUD->setPorosiaID($_GET['porosiaID']);
  $porosiaCRUD->setStatusiPorosis('E Derguar');

  $porosiaCRUD->perditesoStatusinPorosis();

  $_SESSION['statusiUPerditesua'] = true;

}

$porosit = $porosiaCRUD->shfaqTeGjithaPorosite();
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
        ?>
        <div class="mesazhiStyle mesazhiSuksesStyle">
          <p>Statusi i porosis u perditesua me sukses!</p>
          <button id="mbyllMesazhin">
            <i class="fa-solid">&#xf00d;</i>
          </button>
        </div>
        <?php
      }

    }
    ?>
    <h1>Lista e Porosive</h1>
    <table>
      <tr>
        <th>Numri i Porosis</th>
        <th>Klienti</th>
        <th>Numri Kontaktit</th>
        <th>Adresa</th>
        <th>Data e Porosis</th>
        <th>Totali i Porosis</th>
        <th>Gift Code</th>
        <th>Statusi i Porosis</th>
        <th>Funksione</th>
      </tr>
      <?php


      foreach ($porosit as $porosia) {
        ?>
        <tr>
          <td>
            <?php echo $porosia['nrPorosis'] ?>
          </td>
          <td>
            <?php echo $porosia['emri'] . ' ' . $porosia['mbiemri'] ?>
          </td>
          <td>
            <?php echo $porosia['nrKontaktit'] ?>
          </td>
          <td>
            <?php echo $porosia['adresa'] . ', ' . $porosia['qyteti'] . ' ' . $porosia['zipKodi'] ?>
          </td>
          <td>
            <?php echo $porosia['dataPorosis'] ?>
          </td>
          <td>
            <?php echo $porosia['TotaliPorosis'] ?> €
          </td>
          <td>
            <?php echo $porosia['kodiZbritjes'] ?>
          </td>
          <td>
            <?php echo $porosia['statusiPorosis'] ?>
          </td>
          <td>
            <?php
            if ($porosia['statusiPorosis'] == 'Ne Procesim') {
              ?>
              <button class="edito"><a href="?porosiaID=<?php echo $porosia['nrPorosis'] ?>"><i
                    class="fa-regular">&#xf044;</i></a></button>  
              <?php
            }
            ?>
            <button class="edito"><a
                href="../userPages/detajetPorosis.php?porosiaID=<?php echo $porosia['nrPorosis'] ?>"><i
                  class="fa-solid">&#xf05a;</i></a></button>
            <button class="edito"><a href="../funksione/fatura.php?nrPorosis=<?php echo $porosia['nrPorosis'] ?>"
                target="_blank"><i class="fa-solid">&#xf56d;</i></a></button>

            </a>
          </td>
        </tr>
        <?php
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