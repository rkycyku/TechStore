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
  $userCRUD->setAksesi($_GET['aksesi']);


  $userCRUD->perditesoTeDhenatAdmini();

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
      echo '
                <div class="mesazhiSuksesStyle">
                  <p>Llogaria u ndryshua!</p>
                  <button id="mbyllMesazhin">
                    X
                  </button>
                </div>
          ';
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
        echo '
            <tr>
              <td id="userID_' . $perdoruesi['userID'] . '">' . $perdoruesi['userID'] . '</td>
              <td><input id="emri_' . $perdoruesi['userID'] . '" type="text" placeholder="Emri" value="' . $perdoruesi['emri'] . '"></td>
              <td><input id="mbiemri_' . $perdoruesi['userID'] . '" type="text" placeholder=""value="' . $perdoruesi['mbiemri'] . '"></td>
              <td>' . $perdoruesi['username'] . '</td>
              <td>' . $perdoruesi['email'] . '</td>';
        if ($perdoruesi['aksesi'] == 2 && $_SESSION['aksesi'] != 2 || $perdoruesi['userID'] == $_SESSION['userID']) {
          echo '<td id="aksesi_' . $perdoruesi['userID'] . '">' . $perdoruesi['aksesi'] . '</td>';
        } else {
          echo '<td><input id="aksesi_' . $perdoruesi['userID'] . '" type="number" min="0" max="2" placeholder="Aksesi" value="' . $perdoruesi['aksesi'] . '"></td>';
        }
        echo '<td><button class="edito" onclick="ndryshoTeDhenat(' . $perdoruesi['userID'] . ')">Edito</button>
              <button class="edito"><a href="../userPages/porosit.php?userID=' . $perdoruesi['userID'] . '">Porosite</a></button></td>
            </tr>';

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
    var userID = document.getElementById("userID_" + idUser).innerHTML;
    var emri = document.getElementById("emri_" + idUser).value;
    var mbiemri = document.getElementById("mbiemri_" + idUser).value;
    var aksesi = document.getElementById("aksesi_" + idUser).value;

    var link = "?userID=" + userID + "&emri=" + emri + "&mbiemri=" + mbiemri + "&aksesi=" + aksesi;
    window.location.href = link;
  }
  function fshijKategorin(kategoriaID) {
    var kategoriaID = document.getElementById("kategoriaID_" + kategoriaID).innerHTML;

    var link = "?kategoriaID=" + kategoriaID + "&fshij";
    window.location.href = link;
  }
</script>

<?php
unset($_SESSION['aksesiUPerditesua']);
?>