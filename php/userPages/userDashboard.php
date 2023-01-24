<?php
require_once('../CRUD/userCRUD.php');

$userCRUD = new userCRUD();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Dashboard | Tech Store</title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/adminDashboard.css">
  <link rel="stylesheet" href="../../css/mesazhetStyle.css">
</head>

<body>

  <?php include '../design/headerUser.php' ?>

  <div class="containerDashboard">
    <?php
  if (isset($_SESSION['teDhenatUPerditesuan'])) {
    if ($_SESSION['teDhenatUPerditesuan'] == false) {
      echo '<div class="mesazhiGabimStyle">
                      <h3>Perditesimi u anulua!</h3>
                      <button id="mbyllMesazhin">X</button>
                    </div>';
    } else {
      echo '<div class="mesazhiSuksesStyle">
                      <h3>Te dhenat u perditesuan me sukses!</h3>
                      <button id="mbyllMesazhin">X</button>
                    </div>';
    }
  }
  ?>
    <h1 class="titulliPershkrim">Miresevini
      <?php echo $_SESSION['name'] ?>!
    </h1>
    <h2>Te dhenat e tua</h2>
    <?php
    $userCRUD->setUserID($_SESSION['userID']);
    $useri = $userCRUD->shfaqSipasID();
    echo '
        <p><strong>ID:</strong> ' . ($useri['userID']) . '</p>
        <p><strong>Emri:</strong> ' . ($useri['emri']) . '</p>
        <p><strong>Mbiemri:</strong> ' . ($useri['mbiemri']) . '</p>
        <p><strong>Username:</strong> ' . ($useri['username']) . '</p>
        <p><strong>Email:</strong> ' . ($useri['email']) . '</p>
        <a href="../funksione/perditesoTeDhenat.php?userID=' . $useri['userID'] . '"><button class="button">Perditeso te Dhenat</button></a>
      ';
    ?>
  </div>

  <?php include '../design/footerAdmin.php'; include_once '../funksione/importimiScriptave.php'?>
</body>

</html>

<?php unset($_SESSION['teDhenatUPerditesuan']);?>