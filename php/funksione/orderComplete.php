<?php
if (!isset($_SESSION)) {
  session_start();
}

include('../CRUD/porosiaCRUD.php');

$porosiaCRUD = new porosiaCRUD();
$total = 0;

foreach ($_SESSION["shportaBlerjes"] as $keys => $values) {
  $total = $total + ($values["sasia"] * $values["qmimiProduktit"]);
  $itemID = $values["produktiID"];

}

if (isset($_POST['complete'])) {
  $porosiaCRUD->setUserID($_SESSION["userID"]);
  $porosiaCRUD->setQmimiTotal($total);

  $porosiaCRUD->shtoPorosin();

  $idPorosia = $porosiaCRUD->numriIPorosisNeKonfirmim();

  foreach ($_SESSION["shportaBlerjes"] as $keys => $values) {

    $porosiaCRUD->setPorosiaID($idPorosia['nrPorosis']);
    $porosiaCRUD->setProduktiID($values['produktiID']);
    $porosiaCRUD->setQmimiProd(floatval($values['qmimiProduktit']));
    $porosiaCRUD->setSasiaPorositur((int) $values['sasia']);
    $porosiaCRUD->setQmimiTotal(floatval($values['qmimiProduktit'] * $values['sasia']));

    $porosiaCRUD->shtoTeDhenatPorosis();
  }




  $success = "Faleminderit per Besimin!";

  unset($_SESSION["shportaBlerjes"]);
} else {
  $error = "Vendosja e Porosis Deshtoi! Ju lutem provoni perseri me vone ose kontaktoni Stafin tone.";
}




?>



<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Order Complete</title>
</head>

<body>

  <?php include('../design/header.php'); ?>

    <div>
      <h1>Porosia Perfundoi</h1>
      <?php

      if (isset($error) != "") {
        echo "<h4>$error</h4>";
      } else {
        echo "<h4>$success</h4>";
      }
      ?>
      <a href="./fatura.php?nrPorosis=<?php echo $idPorosia['nrPorosis'] ?>" target="_blank">
        <button class="perfundoButoni">Shkarko Faturen</button>
      </a>
    </div>


  <?php include('../design/footer.php'); ?>

</body>

</html>