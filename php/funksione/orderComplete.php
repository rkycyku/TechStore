<?php
if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['produktiID'])) {
  echo '<script>document.location="../pages/produktet.php"</script>';
}

include_once('../CRUD/porosiaCRUD.php');

$porosiaCRUD = new porosiaCRUD();

$_SESSION['emri'] = $_POST['emri'];
$_SESSION['mbiemri'] = $_POST['mbiemri'];
$_SESSION['tel'] = $_POST['tel'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['qyteti'] = $_POST['qyteti'];
$_SESSION['adresa'] = $_POST['adresa'];
$_SESSION['sasia'] = $_POST['sasia'];

$porosiaCRUD->setProduktiID($_SESSION['produktiID']);
if(isset($_SESSION['userID'])){
  $porosiaCRUD->setUserID($_SESSION['userID']);
}
$porosiaCRUD->setEmriKlientit($_SESSION['emri']);
$porosiaCRUD->setMbiemriKlientit($_SESSION['mbiemri']);
$porosiaCRUD->setEmailKlientit($_SESSION['email']);
$porosiaCRUD->setNrKontaktit($_SESSION['tel']);
$porosiaCRUD->setQyteti($_SESSION['qyteti']);
$porosiaCRUD->setAdresaKlientit($_SESSION['adresa']);
$porosiaCRUD->setQmimiProd($_SESSION['qmimiProduktit']);
$porosiaCRUD->setSasiaPorositur($_SESSION['sasia']);
$porosiaCRUD->setQmimiTotal($_SESSION['qmimiProduktit'] * $_SESSION['sasia'] + 2);

$porosiaCRUD->shtoPorosin();
$nrPorosis = $porosiaCRUD->numriIPorosisNeKonfirmim();
?>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Order Complete | Tech Store</title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/order.css">
</head>

<body>
  <?php include '../design/header.php'; ?>

  <div class="container">
    <div class="porosiatxt">
      <h1 class="orderCompleteTitulli ">Porosia u krye me sukses</h1>
      <h2 class="">Numri i Porosis
        <?php echo '#' . $nrPorosis['porosiaID'] ?>
      </h2>
      <h3 class="">Ju Faleminderit!</h3>
    </div>
    <div class="containerPorosia">
      <div class="detajetPoresis">
        <h1>Detajet e Porosis</h1>
        <img src="../../img/products/<?php echo $_SESSION['fotoProduktit'] ?>">
        <table class="tabelaOrderComplete">
          <tr>
            <td>
              <strong>Emri produktit: </strong>
            </td>
            <td>
              <?php echo $_SESSION['emriProduktit'] ?>
            </td>
          </tr>
          <tr>
            <td>
              <strong>Qmimi Produktit: </strong>
            </td>
            <td>
              <?php echo number_format($_SESSION['qmimiProduktit'], 2) . ' €' ?>
            </td>
          </tr>
          <tr>
            <td>
              <strong>Sasia: </strong>
            </td>
            <td>
              <?php echo $_SESSION['sasia'] ?>
            </td>
          </tr>
          <tr>
            <td>
              <strong>Qmim pa Transport: </strong>
            </td>
            <td>
              <?php echo number_format($_SESSION['sasia'] * $_SESSION['qmimiProduktit'], 2) . ' €' ?>
            </td>
          </tr>
          <tr>
            <td>
              <strong>Qmimi transportit: </strong>
            </td>
            <td>2 €</td>
          </tr>
          <tr>
            <td>
              <h3>Qmimi Total</h3>
            </td>
            <td>
              <?php echo number_format($_SESSION['qmimiProduktit'] * $_SESSION['sasia'] + 2, 2) . ' €' ?>
            </td>
          </tr>
        </table>
      </div>

      <div class="detajetDorezimit">

        <h1>Detajet e dorezimit</h1>
        <table class="tabelaOrderComplete">
          <tr>
            <td><strong>Emri: </strong></td>
            <td>
              <?php echo $_SESSION['emri'] ?>
            </td>
          </tr>
          <tr>
            <td><strong>Mbiemri: </strong></td>
            <td>
              <?php echo $_SESSION['mbiemri'] ?>
            </td>
          </tr>
          <tr>
            <td><strong>Tel: </strong></td>
            <td>
              <?php echo $_SESSION['tel'] ?>
            </td>
          </tr>
          <tr>
            <td><strong>Email: </strong></td>
            <td>
              <?php echo $_SESSION['email'] ?>
            </td>
          </tr>
          <tr>
            <td><strong>Qyteti: </strong></td>
            <td>
              <?php echo $_SESSION['qyteti'] ?>
            </td>
          </tr>
          <tr>
            <td><strong>Adresa: </strong></td>
            <td>
              <?php echo $_SESSION['adresa'] ?>
            </td>
          </tr>
        </table>
        <h2>Paguani pas pranimit te porosis</h2>
        <h2>Porosia arrin me se largu
          <?php echo date("d-m-y", strtotime("+4 days", strtotime(date("Y-m-d")))) ?>
        </h2>
      </div>
    </div>

    <div class="butonat">
      <a href="../userPages/porosit.php"><button class="perfundoButoni">Perfundo</button></a>
      <a href="./fatura.php?nrPorosis=<?php echo $nrPorosis['porosiaID'] ?>" target="_blank">
        <button class="perfundoButoni">Shkarko Faturen</button>
      </a>
    </div>

  </div>
  <?php include '../design/footer.php' ?>
</body>

</html>

<?php unset($_SESSION['produktiID']);