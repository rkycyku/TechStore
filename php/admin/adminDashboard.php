<?php
require_once('./kontrolloAksesin.php');
require_once('../CRUD/userCRUD.php');

$userCRUD = new userCRUD();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard | Tech Store</title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/adminDashboard.css">
</head>

<body>

  <?php include '../design/headerAdmin.php'; ?>

  <div class="containerDashboard">

    <h1 class="titulliPershkrim">Miresevini
      <?php echo $_SESSION['name'] ?>!
    </h1>
    <h2>Te dhenat e tua</h2>
    <?php
    $userCRUD->setUserID($_SESSION['userID']);
    $useri = $userCRUD->shfaqSipasID();
    echo '
        <p>ID: ' . ($useri['userID']) . '</p>
        <p>Emri: ' . ($useri['emri']) . '</p>
        <p>Mbiemri: ' . ($useri['mbiemri']) . '</p>
        <p>Username: ' . ($useri['username']) . '</p>
        <p>Email: ' . ($useri['email']) . '</p>
      ';
    ?>
  </div>

  <?php include '../design/footerAdmin.php' ?>
</body>

</html>