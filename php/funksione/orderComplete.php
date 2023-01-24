<?php
if (!isset($_SESSION)) {
  session_start();
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
$porosiaCRUD->setUserID($_SESSION['userID']);
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
?>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Order Complete | Tech Store</title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/index.css" />
</head>

<body>
  <?php include '../design/headerError.php'; ?>
  <div class="container">
    <h1>Porosia u krye me sukses</h1>
    <div class="detajetPoresis">
      <h2>Detajet e Porosis</h2>
      <h3>Emri produktit:
        <?php echo $_SESSION['emriProduktit'] ?>
      </h3>
      <img src="../../img/products/<?php echo $_SESSION['fotoProduktit'] ?>">
      <p><strong>Qmimi Produktit</strong>
        <?php echo $_SESSION['qmimiProduktit'] ?>
      </p>
      <p><strong>Sasia</strong>
        <?php echo $_SESSION['sasia'] ?>
      </p>
      <p><strong>Qmim pa Transport</strong>
        <?php echo $_SESSION['sasia'] * $_SESSION['qmimiProduktit'] ?>
      </p>
      <p><strong>Qmimi transportit</strong> 2</p>
      <p><strong>Qmimi Total</strong>
        <?php echo $_SESSION['qmimiProduktit'] * $_SESSION['sasia'] + 2 ?>
      </p>
    </div>

    <div class="detajetDorezimit">

      <h2>Detajet e dorezimit</h2>
      <p><strong>Emri</strong>
        <?php echo $_SESSION['emri'] ?>
      </p>
      <p><strong>Mbeimri</strong>
        <?php echo $_SESSION['mbiemri'] ?>
      </p>
      <p><strong>Tel</strong>
        <?php echo $_SESSION['tel'] ?>
      </p>
      <p><strong>Email</strong>
        <?php echo $_SESSION['email'] ?>
      </p>
      <p><strong>Qyteti</strong>
        <?php echo $_SESSION['qyteti'] ?>
      </p>
      <p><strong>Adresa</strong>
        <?php echo $_SESSION['adresa'] ?>
      </p>
      <h3>Paguani pas pranimit te porosis</h3>
      <h4>Porosia arrin me se largu
        <?php echo date("d-m-y", strtotime("+3 days", strtotime(date("d-m-y")))) ?>
      </h4>
    </div>
    <a href="../userPages/porosit.php"><button>Perfundo</button></a>
  </div>

  <?php include '../design/footer.php' ?>
</body>

</html>