<?php
include_once('../CRUD/produktiCRUD.php');

$produkti = new produktiCRUD();
if (isset($_GET['produktiID'])) {
    $produkti->setProduktiID($_GET['produktiID']);

    $teDhenatEPRoduktit = $produkti->shfaqProduktinSipasID();

    $_SESSION['produktiID'] = $teDhenatEPRoduktit['produktiID'];
    $_SESSION['emriProduktit'] = $teDhenatEPRoduktit['emriProduktit'];
    $_SESSION['fotoProduktit'] = $teDhenatEPRoduktit['fotoProduktit'];
    $_SESSION['qmimiProduktit'] = $teDhenatEPRoduktit['qmimiProduktit'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order | Tech Store</title>
    <link rel="shortcut icon" href="../../img/web/favicon.ico" />
    <link rel="stylesheet" href="../../css/forms.css" />
    <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
    <link rel="stylesheet" href="../../css/order.css">
</head>

<body>
    <?php include '../design/headerMain.php'; ?>
    <div class="containerOrder">
        <div class="teDhenatEProduktit">
            <?php
            echo ' <img src="../../img/products/' . $_SESSION['fotoProduktit'] . '">
            <h3>' . $_SESSION['emriProduktit'] . '</h3>
            
            <h2>Cmimi: ' . $_SESSION['qmimiProduktit'] . ' €</h2>';

            ?>

        </div>
        <div class="teDhenatKlientit">
            <form name="vendosPorosin" onsubmit="" action='../funksione/orderComplete.php' method="POST">
            
                <h1 class="form-title">Te dhenat e tua</h1>
                <input class="form-input" name="emri" type="text" placeholder="Name" <?php if(isset($_SESSION['name']))echo 'value="'.$_SESSION['name'].'"'?>>
                <input class="form-input" name="mbiemri" type="text" placeholder="Lastname" <?php if(isset($_SESSION['mbiemri']))echo 'value="'.$_SESSION['mbiemri'].'"'?>>
                <input class="form-input" name="tel" type="text" placeholder="Numri Kontaktit">
                <input class="form-input" name="email" type="text" placeholder="Email" <?php if(isset($_SESSION['email']))echo 'value="'.$_SESSION['email'].'"'?>>
                <input class="form-input" name="qyteti" type="text" placeholder="Qyteti">
                <textarea class="form-input" name="adresa" type="textfield" placeholder="Adresa"></textarea>
                <input class="form-input" name="sasia" id="sasia" type="number" placeholder="Sasia" value="1" min="1">
                <input class="button" type="submit" value="Order Now" name='submit'>
            </form>
        </div>
        <div class="QmimiTransportit">
            <h2>Transporti: 2 €</h2>
            <h2 id='shumaTOT'>Totali eshte: <?php echo ($_SESSION['qmimiProduktit']+2) . ' €'?></h2>
        </div>
    </div>
    <?php include_once('../funksione/importimiScriptave.php'); ?>
</body>
<script>
var quantity = document.getElementById("sasia");
quantity.addEventListener("change", updatePrice);

function updatePrice() {
  var newQuantity = this.value;
  fetch("../funksione/kontrollimiIQmimit.php", {
    method: "POST",
    body: JSON.stringify({quantity: newQuantity})
  })
  .then(response => response.text())
  .then(price => {
    document.getElementById("shumaTOT").innerHTML = "Totali eshte: " + price + " €";
  });
}
</script>
</html>