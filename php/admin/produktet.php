<?php
require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/produktiCRUD.php');

$produktiCRUD = new produktiCRUD();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Produktet | Tech Store</title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/adminDashboard.css" />
  <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
</head>

<body>

  <?php include '../design/header.php' ?>

  <div class="containerDashboardP">
    <?php
    if (isset($_SESSION['mesazhiMeSukses'])) {
      echo '
                <div class="mesazhiSuksesStyle">
                  <h3>Produkti u editua me sukses!</h3>
                  <button id="mbyllMesazhin">
                    X
                  </button>
                </div>
          ';
    }
    if (isset($_SESSION['mesazhiFshirjesMeSukses'])) {
      echo '
                <div class="mesazhiSuksesStyle">
                  <h3>Produkti u fshi me sukses!</h3>
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
    <h1>Produktet</h1>
    <table>
      <tr>
        <th>ID </th>
        <th>Emri i Produktit</th>
        <th>Emri i Kompanis</th>
        <th>Kategoria e Produktit</th>
        <th>Foto e Produktit</th>
        <th>Qmimi i Produktit</th>
        <th>Funksione</th>
      </tr>
      <?php
      $produktet = $produktiCRUD->shfaqTeGjithaProduktet();

      foreach ($produktet as $produkti) {
        echo '
            <tr>
              <td>' . $produkti['produktiID'] . '</td>
              <td class="emriP">' . $produkti['emriProduktit'] . '</td>
              <td>' . $produkti['emriKompanis'] . '</td>
              <td>' . $produkti['kategoriaProduktit'] . '</td>
              <td><img src="../../img/products/' . $produkti['fotoProduktit'] . '"></td>
              <td>' . $produkti['qmimiProduktit'] . ' €</td>
              <td><button class="edito"><a href="./editoProduktin.php?produktID=' . $produkti['produktiID'] . '">Edito</a></button>
              <button class="fshij"><a href="../adminFunksione/fshiProduktin.php?produktID=' . $produkti['produktiID'] . '">Fshij</a></button>
              <button class="porositP"><a href="../userPages/porosit.php?produktID=' . $produkti['produktiID'] . '">Porositë</a></button></td>
            </tr>
          ';
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

<?php
unset($_SESSION['mesazhiMeSukses']);
unset($_SESSION['mesazhiFshirjesMeSukses']);
unset($_SESSION['skeAksesAdmin']);
?>