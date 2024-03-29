<?php
require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/produktiCRUD.php');
require_once('../CRUD/porosiaCRUD.php');

$produktiCRUD = new produktiCRUD();
$porosiaCRUD = new porosiaCRUD();
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
      <div class="mesazhiStyle mesazhiSuksesStyle">
        <h3>Produkti u editua me sukses!</h3>
        <button id="mbyllMesazhin">
          <i class="fa-solid">&#xf00d;</i>
        </button>
      </div>
      <?php
    }
    if (isset($_SESSION['mesazhiFshirjesMeSukses'])) {
      ?>
      <div class="mesazhiStyle mesazhiSuksesStyle">
        <h3>Produkti u fshi me sukses!</h3>
        <button id="mbyllMesazhin">
          <i class="fa-solid">&#xf00d;</i>
        </button>
      </div>
      <?php
    }
    if (isset($_SESSION['skeAksesAdmin'])) {
      ?>
      <div class="mesazhiStyle mesazhiGabimStyle">
        <h3>Nuk keni akses per kete sherbim!</h3>
        <button id="mbyllMesazhin">
          <i class="fa-solid">&#xf00d;</i>
        </button>
      </div>
      <?php
    }
    ?>
    <h1>Produktet</h1>
    <table>
      <thead>
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
      </thead>
      <tbody>
        <?php
        $produktet = $produktiCRUD->shfaqTeGjithaProduktet();


        foreach ($produktet as $produkti) {
          $porosiaCRUD->setProduktiID($produkti['produktiID']);
          $kaPorosiProdukti = $porosiaCRUD->kaPorosiProdukti();
          ?>
          <tr>
            <td>
              <?php echo $produkti['produktiID'] ?>
            </td>
            <td class="emriP">
              <?php echo $produkti['emriProduktit'] ?>
            </td>
            <td>
              <?php echo $produkti['emriKompanis'] ?>
            </td>
            <td>
              <?php echo $produkti['emriKategoris'] ?>
            </td>
            <td><img src="../../img/products/<?php echo $produkti['fotoProduktit'] ?>"></td>
            <td>
              <?php echo $produkti['qmimiProduktit'] ?> €
            </td>
            <td>
              <?php if ($produkti['pershkrimiProd'] != null) {
                echo '<i class="fa-solid">&#xf00c;</i>';
              } else {
                echo '<i class="fa-solid">&#xf00d;</i>';
              } ?>
            </td>
            <td><button class="edito"><a href="./editoProduktin.php?produktID=<?php echo $produkti['produktiID'] ?>"><i
                    class="fa-regular">&#xf044;</i></a></button>
              <?php
              if ($_SESSION['aksesi'] == 2) {
                ?>
                <button class="fshij"><a
                    href="../adminFunksione/fshiProduktin.php?produktID=<?php echo $produkti['produktiID'] ?>"><i
                      class="fa-regular">&#xf2ed;</i></a></button>
                <?php
              }
              if ($kaPorosiProdukti == true) {
                ?>
                <button class="porositP"><a
                    href="../userPages/porosit.php?produktID=<?php echo $produkti['produktiID'] ?>"><i
                      class="fa-solid">&#xf05a;</i></a></button>
                <?php
              }
              ?>

            </td>
          </tr>
          <?php
        }
        ?>
        </th>
      </tbody>
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