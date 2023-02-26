<?php
require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/userCRUD.php');

$userCRUD = new userCRUD();

if (isset($_GET['userID'])) {
  $userCRUD->setUserID($_GET['userID']);
  $useri = $userCRUD->shfaqSipasID();

  $userCRUD->setUserID($_GET['userID']);
  $userCRUD->setEmri($_GET['emri']);
  $userCRUD->setMbiemri($_GET['mbiemri']);
  if (isset($_GET['aksesi'])) {
    $userCRUD->setAksesi($_GET['aksesi']);
    $userCRUD->perditesoTeDhenatAdmini(true);
  } else {
    $userCRUD->perditesoTeDhenatAdmini(false);
  }

  $_SESSION['aksesiUPerditesua'] = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Perdoruesit | Tech Store</title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/adminDashboard.css" />
  <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
</head>

<body>

  <?php include '../design/header.php' ?>

  <div class="containerDashboardP">
    <?php
    if (isset($_SESSION['aksesiUPerditesua'])) {
      ?>
      <div class="mesazhiStyle mesazhiSuksesStyle">
        <p>Te dhenat e llogaris u ndryshuan!</p>
        <button id="mbyllMesazhin">
          <i class="fa-solid">&#xf00d;</i>
        </button>
      </div>
      <?php
    }
    ?>
    <h1>Lista e Perdoruesve</h1>
    <table>
      <tr>
        <th>ID</th>
        <th>Emri</th>
        <th>Mbiemri</th>
        <th>Username</th>
        <th>Email</th>
        <th>Aksesi</th>
        <th>Funksione</th>
      </tr>
      <?php
      $perdoruesit = $userCRUD->shfaqTeGjithePerdoruesit();

      foreach ($perdoruesit as $perdoruesi) {
        ?>
        <tr>
          <td id="userID_<?php echo $perdoruesi['userID'] ?>"><?php echo $perdoruesi['userID'] ?></td>
          <td><input id="emri_<?php echo $perdoruesi['userID'] ?>" type="text" placeholder="Emri"
              value="<?php echo $perdoruesi['emri'] ?>"></td>
          <td><input id="mbiemri_<?php echo $perdoruesi['userID'] ?>" type="text" placeholder=""
              value="<?php echo $perdoruesi['mbiemri'] ?>"></td>
          <td>
            <?php echo $perdoruesi['username'] ?>
          </td>
          <td>
            <?php echo $perdoruesi['email'] ?>
          </td>
          <?php
          if ($perdoruesi['aksesi'] == 2 && $_SESSION['aksesi'] != 2 || $perdoruesi['userID'] == $_SESSION['userID']) {
            ?>
            <td id="aksesi_<?php echo $perdoruesi['userID'] ?>"><?php echo $perdoruesi['aksesi'] ?></td>
            <?php
          } else {
            ?>
            <td><input id="aksesi_<?php echo $perdoruesi['userID'] ?>" type="number" min="0" max="2" placeholder="Aksesi"
                value="<?php echo $perdoruesi['aksesi'] ?>"></td>
            <?php
          }
          ?>
          <td><button class="edito" onclick="return ndryshoTeDhenat(<?php echo $perdoruesi['userID'] ?>); "><i class="fa-solid">&#xf4ff;</i></button>
            <button class="edito"><a
                href="../userPages/porosit.php?userID=<?php echo $perdoruesi['userID'] ?>"><i class="fa-solid">&#xf05a;</i></a></button>
          </td>
        </tr>
        <?php

      }
      ?>
      </th>
    </table>
  </div>

  <?php
  include '../design/footer.php';
  include('../funksione/importimiScriptave.php') ?>
</body>

</html>

<script>
  function ndryshoTeDhenat(idUser) {
    const emREGEX = /^[A-Za-z]+$/
    var emri = document.getElementById("emri_" + idUser).value;
    var mbiemri = document.getElementById("mbiemri_" + idUser).value;
    var aksesi = document.getElementById("aksesi_" + idUser).value;

    if (emri == "") {
      alert("Emri nuk duhet te jet i zbrazet!");
      emri.focus();
      return false;
    }

    else if (mbiemri == "") {
      alert("Mbiemri nuk duhet te jet i zbrazet!");
      mbiemri.focus();
      return false;
    }

    else {
      if (aksesi == null) {
        var link = "?userID=" + idUser + "&emri=" + emri + "&mbiemri=" + mbiemri;
      }
      else {
        var link = "?userID=" + idUser + "&emri=" + emri + "&mbiemri=" + mbiemri + "&aksesi=" + aksesi;
      }
      window.location.href = link;

      return true;
    }
  }
</script>

<?php
unset($_SESSION['aksesiUPerditesua']);
?>