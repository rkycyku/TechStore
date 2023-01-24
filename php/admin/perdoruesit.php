<?php
require_once('../adminFunksione/kontrolloAksesin.php');
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

  <?php include '../design/header.php' ?>

  <div class="containerDashboardP">
    <?php
    if (isset($_SESSION['aksesiUPerditesua'])) {
      echo '
                <div class="mesazhiSuksesStyle">
                  <h3>Llogaria u ndryshua!</h3>
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
              <td id="userID_' . $produkti['userID'] . '">' . $produkti['userID'] . '</td>
              <td><input id="emri_' . $produkti['userID'] . '" type="text" placeholder="Emri" value="' . $produkti['emri'] . '"></td>
              <td><input id="mbiemri_' . $produkti['userID'] . '" type="text" placeholder=""value="' . $produkti['mbiemri'] . '"></td>
              <td>' . $produkti['username'] . '</td>
              <td>' . $produkti['email'] . '</td>';
              if($produkti['aksesi'] == 2 && $_SESSION['aksesi'] != 2 || $produkti['userID'] == $_SESSION['userID']){
                echo '<td id="aksesi_' . $produkti['userID'] . '">' . $produkti['aksesi'] . '</td>';
              }else{
                echo '<td><input id="aksesi_' . $produkti['userID'] . '" type="number" min="0" max="2" placeholder="Aksesi" value="' . $produkti['aksesi'] . '"></td>';
              }
        echo '<td><button class="edito" onclick="ndryshoTeDhenat('.$produkti['userID'].')">Edito</button>
              <button class="edito"><a href="../userPages/porosit.php?userID=' . $produkti['userID'] . '">Porosite</a></button></td>
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
  var userID = document.getElementById("userID_"+idUser).innerHTML;
  var emri = document.getElementById("emri_"+idUser).value;
  var mbiemri = document.getElementById("mbiemri_"+idUser).value;
  var aksesi = document.getElementById("aksesi_"+idUser).value;
  
  var link = "./ndryshoTeDhenatLlogaris.php?userID=" + userID+"&emri="+emri+"&mbiemri=" + mbiemri+"&aksesi=" + aksesi;
  window.location.href = link;
}
</script>

<?php
unset($_SESSION['aksesiUPerditesua']);
?>