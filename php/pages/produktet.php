<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../CRUD/produktiCRUD.php');
$produktiCRUD = new produktiCRUD();

if (isset($_Post['Blej'])) {
  echo $_Post['produktiID'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Products | Tech Store</title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/index.css" />
  <link rel="stylesheet" href="../../css/mesazhetStyle.css">
</head>

<body>
  <?php include '../design/header.php'; ?>
  <div class="container">

    <form class="searchBarForm" name='kerko' action='../funksione/search.php' method="post">
      <input class="searchBar" name='kerkimi' type="search" placeholder="Search">
    </form>
    <?php
    if (isset($_GET['kompania'])) {
      $kompania = $_GET['kompania'];
      ?>
      <div class="artikujt">
        <?php
        if (isset($_SESSION['uShtuaNeShport']) == true) {
          ?>
          <div class="mesazhiSuksesStyle">
            <p>Prdoukti u Shtua ne Shport!</p>
            <button id="mbyllMesazhin">
              X
            </button>
          </div>
          <?php
        }
        if (isset($_SESSION['ekzistonNeShport']) == true) {
          ?>
          <div class="mesazhiGabimStyle">
            <p>Ky produkt egziston ne Shporten tuaj!</p>
            <button id="mbyllMesazhin">
              X
            </button>
          </div>
          <?php
        }
        ?>
        <div class="titulliArtikuj">
          <h1 class="">All Products from
            <?php echo $kompania ?>
          </h1>
        </div>
        <?php

        $produktiCRUD->setEmriKompanis($kompania);
        $produktet = $produktiCRUD->shfaqProduktinSipasKompanis();

        foreach ($produktet as $produkti) {
          ?>
          <form action="../funksione/shtoNeShport.php" method="POST" class="artikulli">
            <input type="hidden" name="produktiID" value=<?php echo $produkti['produktiID'] ?>>
            <input type="hidden" name="emriProduktit" value="<?php echo $produkti['emriProduktit'] ?>">
            <input type="hidden" name="qmimiProduktit" value=<?php echo $produkti['qmimiProduktit'] ?>>
            <img src="../../img/products/<?php echo $produkti['fotoProduktit'] ?>" />
            <p class=" artikulliLabel">
              <?php echo $produkti['emriProduktit'] ?>
            </p>
            <p class="cmimi">
              <?php echo $produkti['qmimiProduktit'] ?> €
            </p>
            <input type="submit" class="button fa fa-lg" value="&#xf07a;" name="submit">
            <input type="submit" class="button" value="Blej Tani" name="blej">
          </form>
          <?php
        }
    } else if (isset($_GET['kerko'])) {
      $_SESSION['kerko'] = $_GET['kerko'];

      $produktiCRUD->shfaqProduktetNgaKerkimi();
    } else {
      ?>
          <div class="artikujt">
            <?php
            if (isset($_SESSION['uShtuaNeShport']) == true) {
              ?>
              <div class="mesazhiSuksesStyle">
                <p>Prdoukti u Shtua ne Shport!</p>
                <button id="mbyllMesazhin">
                  X
                </button>
              </div>
            <?php
            }
            if (isset($_SESSION['ekzistonNeShport']) == true) {
              ?>
              <div class="mesazhiGabimStyle">
                <p>Ky produkt egziston ne Shporten tuaj!</p>
                <button id="mbyllMesazhin">
                  X
                </button>
              </div>
            <?php
            }
            ?>
            <div class="titulliArtikuj">
              <h1 class="">All Products</h1>
            </div>
            <?php
            $produktet = $produktiCRUD->shfaqTeGjithaProduktet();
            foreach ($produktet as $produkti) {
              ?>
              <form action="../funksione/shtoNeShport.php" method="POST" class="artikulli">
                <input type="hidden" name="produktiID" value=<?php echo $produkti['produktiID'] ?>>
                <input type="hidden" name="emriProduktit" value="<?php echo $produkti['emriProduktit'] ?>">
                <input type="hidden" name="qmimiProduktit" value=<?php echo $produkti['qmimiProduktit'] ?>>
                <img src="../../img/products/<?php echo $produkti['fotoProduktit'] ?>" />
                <p class=" artikulliLabel">
                <?php echo $produkti['emriProduktit'] ?>
                </p>
                <p class="cmimi">
                <?php echo $produkti['qmimiProduktit'] ?> €
                </p>
                <div>
                  <input type="submit" class="button" value="Blej Tani" name="blej">
                  <input type="submit" class="button button-shporta fa fa-lg" value="&#xf07a;" name="submit">
                </div>
              </form>
            <?php
            }

            echo '</div>';
    }
    ?>
      </div>

      <?php include '../design/footer.php' ?>
</body>

</html>

<?php unset($_SESSION['uShtuaNeShport']);
unset($_SESSION['ekzistonNeShport']);
?>