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
  <title>Perdoruesit | Tech Store</title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/adminDashboard.css" />
  <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
</head>

<body>

  <?php include '../design/headerAdmin.php' ?>

  <div class="containerDashboardP">
    <?php
    if (isset($_SESSION['aksesiUPerditesua'])) {
      echo '
                <div class="mesazhiSuksesStyle">
                  <h3>Aksesi u ndryshua!</h3>
                  <button id="mbyllMesazhin">
                    X
                  </button>
                </div>
          ';
    }
    if (isset($_SESSION['ndryshimiUAnulua'])) {
      echo '
                <div class="mesazhiGabimStyle">
                  <h3>Ju keni anuluar ndryshimin!</h3>
                  <button id="mbyllMesazhin">
                    X
                  </button>
                </div>
          ';
    }
    if (isset($_SESSION['skeAksesAdmin'])) {
      echo '
                <div class="mesazhiGabimStyle">
                  <h3>Nuk keni akses per kete sherbim!</h3>
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
      $produktet = $userCRUD->shfaqTeGjithePerdoruesit();

      foreach ($produktet as $produkti) {
        echo '
            <tr>
              <td>' . $produkti['userID'] . '</td>
              <td>' . $produkti['emri'] . '</td>
              <td>' . $produkti['mbiemri'] . '</td>
              <td>' . $produkti['username'] . '</td>
              <td>' . $produkti['email'] . '</td>
              <td>' . $produkti['aksesi'] . '</td>
              <td><button class="edito"><a href="./ndryshoAksesin.php?userID=' . $produkti['userID'] . '">Edito</a></button>
              <button class="edito"><a href="../userPages/porosit.php?userID=' . $produkti['userID'] . '">Porosite</a></button></td>
            </tr>
          ';
      }
      ?>
      </th>
    </table>
  </div>

  <?php
  include '../design/footerAdmin.php';
  include('../funksione/importimiScriptave.php') ?>
</body>

</html>

<?php
unset($_SESSION['aksesiUPerditesua']);
unset($_SESSION['ndryshimiUAnulua']);
unset($_SESSION['skeAksesAdmin']);
?>