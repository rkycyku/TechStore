<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../CRUD/produktiCRUD.php');
$produktiCRUD = new produktiCRUD();

if (isset($_Post['Blej'])) {
  echo $_Post['produktiID'];
}


$nrMaxIProduktevPerFaqe = 20;

$nrTotalIProdukteveNeSistem = $produktiCRUD->numriTotalIProdukteve();

$nrFaqev = ceil($nrTotalIProdukteveNeSistem['tot'] / $nrMaxIProduktevPerFaqe);

$nrFaqes = isset($_GET['faqja']) ? (int) $_GET['faqja'] : 1;

if ($nrFaqes < 1) {
  $nrFaqes = 1;
} elseif ($nrFaqes > $nrFaqev) {
  $nrFaqes = $nrFaqev;
}

$fillimi = ($nrFaqes - 1) * $nrMaxIProduktevPerFaqe;

$produktet = $produktiCRUD->shfaqProduktetENdara($fillimi, $nrMaxIProduktevPerFaqe);



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
  <link rel="stylesheet" href="../../css/produkti.css">

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
            <input type="hidden" name="emriProduktit" value='<?php echo $produkti['emriProduktit'] ?>'>
            <input type="hidden" name="qmimiProduktit" value=<?php echo $produkti['qmimiProduktit'] ?>>
            <a href="../pages/produkti.php?produktiID=<?php echo $produkti['produktiID'] ?> ">
              <img src="../../img/products/<?php echo $produkti['fotoProduktit'] ?>" />
              <p class=" artikulliLabel">
                <?php echo $produkti['emriProduktit'] ?>
              </p>
            </a>
            <p class="cmimi">
              <?php echo $produkti['qmimiProduktit'] ?> €
            </p>
            <div class="butonatDiv">
              <input type="submit" class="button" value="Blej Tani" name="blej">
              <input type="submit" class="button button-shporta fa-solid" value="&#xf07a;" name="submit">
            </div>
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
                <p>Produkti u Shtua ne Shport!</p>
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
            foreach ($produktet as $produkti) {
              ?>
              <form action="../funksione/shtoNeShport.php" method="POST" class="artikulli">
                <input type="hidden" name="produktiID" value=<?php echo $produkti['produktiID'] ?>>
                <input type="hidden" name="emriProduktit" value='<?php echo $produkti['emriProduktit'] ?>'>
                <input type="hidden" name="qmimiProduktit" value=<?php echo $produkti['qmimiProduktit'] ?>>
                <a href="../pages/produkti.php?produktiID=<?php echo $produkti['produktiID'] ?> ">
                  <img src="../../img/products/<?php echo $produkti['fotoProduktit'] ?>" />
                  <p class=" artikulliLabel">
                  <?php echo $produkti['emriProduktit'] ?>
                  </p>
                </a>
                <p class="cmimi">
                <?php echo $produkti['qmimiProduktit'] ?> €
                </p>
                <div class="butonatDiv">
                  <input type="submit" class="button" value="Buy now" name="blej">
                  <input type="submit" class="button button-shporta fa-solid" value="&#xf07a;" name="submit">
                </div>
              </form>
            <?php
            }
            ?>

          </div>
          <div class="navigimiFaqev">
          <?php if ($nrFaqes > 1) {
            ?>
              <a class='faqjaTjeter' href="?faqja=<?php echo $nrFaqes - 1 ?>"><i class='fa-solid'>&#xf104;</i></a>
            <?php
          }

          for ($i = 1; $i <= $nrFaqev; $i++) {
            if ($i === $nrFaqes) {
              echo "    <a class='faqjaAktive' href=\"?faqja=$i\">$i</a>";
            } else {
              echo "<a class='faqjaTjeter' href=\"?faqja=$i\">$i</a>";
            }
          }
    }
    if ($nrFaqes < $nrFaqev) {
      ?>
          <a class='faqjaTjeter' href="?faqja=<?php echo $nrFaqes + 1 ?>"><i class='fa-solid'>&#xf105;</i></a>
          <?php
    }
    ?>
      </div>
    </div>

    <?php include '../design/footer.php' ?>
</body>

</html>

<?php
unset($_SESSION['uShtuaNeShport']);
unset($_SESSION['ekzistonNeShport']);
?>