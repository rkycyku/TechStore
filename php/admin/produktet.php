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
      ?>
      <div class="mesazhiSuksesStyle">
        <h3>Produkti u editua me sukses!</h3>
        <button id="mbyllMesazhin">
          X
        </button>
      </div>
      <?php
    }
    if (isset($_SESSION['mesazhiFshirjesMeSukses'])) {
      ?>
      <div class="mesazhiSuksesStyle">
        <h3>Produkti u fshi me sukses!</h3>
        <button id="mbyllMesazhin">
          X
        </button>
      </div>
      <?php
    }
    if (isset($_SESSION['skeAksesAdmin'])) {
      ?>
      <div class="mesazhiGabimStyle">
        <h3>Nuk keni akses per kete sherbim!</h3>
        <button id="mbyllMesazhin">
          X
        </button>
      </div>
      <?php
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
        <th>Ka Pershkrim</th>
        <th>Funksione</th>
      </tr>
      <?php
      $produktet = $produktiCRUD->shfaqTeGjithaProduktet();

      foreach ($produktet as $produkti) {
        ?>
        <tr>
          <td>
            <?php echo $produkti['produktiID'] ?>
          </td>
          <td class="emriP"><?php echo $produkti['emriProduktit'] ?></td>
          <td>
            <?php echo $produkti['emriKompanis'] ?>
          </td>
          <td>
            <?php echo $produkti['kategoriaProduktit'] ?>
          </td>
          <td><img src="../../img/products/<?php echo $produkti['fotoProduktit'] ?>"></td>
          <td>
            <?php echo $produkti['qmimiProduktit'] ?> €
          </td>
          <td>
            <?php if($produkti['pershkrimiProd'] != null){
              echo '<i class="fa-solid">&#xf00c;</i>';
            } else{
              echo '<i class="fa-solid">&#xf00d;</i>';
            }?> 
          </td>
          <td><button class="edito"><a
                href="./editoProduktin.php?produktID=<?php echo $produkti['produktiID'] ?>">Edito</a></button>
            <button class="fshij"><a
                href="../adminFunksione/fshiProduktin.php?produktID=<?php echo $produkti['produktiID'] ?>">Fshij</a></button>
            <button class="porositP"><a
                href="../userPages/porosit.php?produktID=<?php echo $produkti['produktiID'] ?>">Porositë</a></button>
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

<?php
unset($_SESSION['mesazhiMeSukses']);
unset($_SESSION['mesazhiFshirjesMeSukses']);
unset($_SESSION['skeAksesAdmin']);
?>