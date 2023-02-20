<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../CRUD/produktiCRUD.php');
require_once('../CRUD/kategoriaCRUD.php');
$produktiCRUD = new produktiCRUD();
$kategoriaCRUD = new kategoriaCRUD();

$kategorit = $kategoriaCRUD->shfaqKategorin();

if (isset($_Post['Blej'])) {
  echo $_Post['produktiID'];
}


$nrMaxIProduktevPerFaqe = 20;

$nrTotalIProdukteveNeSistem = 0;

if (isset($_GET['kerko'])) {
  $produktiCRUD->setEmriProduktit('%' . $_GET['kerko'] . '%');

  $nrProduktev = $produktiCRUD->shfaqNrProduktev('kerko');
  $nrTotalIProdukteveNeSistem = $nrProduktev['totProd'];


} else if (isset($_GET['kompania'])) {
  $kompania = $_GET['kompania'];

  $produktiCRUD->setEmriKompanis($kompania);

  $nrProduktev = $produktiCRUD->shfaqNrProduktev('kompania');
  $nrTotalIProdukteveNeSistem = $nrProduktev['totProd'];


} else if (isset($_GET['kategoria'])) {
  $produktiCRUD->setKategoriaProduktit($_GET['kategoria']);

  $nrProduktev = $produktiCRUD->shfaqNrProduktev('kategoria');
  $nrTotalIProdukteveNeSistem = $nrProduktev['totProd'];

} else {

  $produktet = $produktiCRUD->shfaqTeGjithaProduktet();
  $nrProduktev = $produktiCRUD->shfaqNrProduktev('TeGjitha');
  $nrTotalIProdukteveNeSistem = $nrProduktev['totProd'];

}

$nrFaqev = ceil($nrTotalIProdukteveNeSistem / $nrMaxIProduktevPerFaqe);


$nrFaqes = isset($_GET['faqja']) ? (int) $_GET['faqja'] : 1;

if ($nrFaqes < 1) {
  $nrFaqes = 1;
} elseif ($nrFaqes > $nrFaqev) {
  $nrFaqes = $nrFaqev;
}

$fillimi = ($nrFaqes - 1) * $nrMaxIProduktevPerFaqe;

if ($fillimi < 0) {
  $fillimi = 0;
}

if (isset($_GET['kerko'])) {
  $produktiCRUD->setEmriProduktit('%' . $_GET['kerko'] . '%');
  $produktet = $produktiCRUD->shfaqProduktetENdara($fillimi, $nrMaxIProduktevPerFaqe, 'kerko');

} else if (isset($_GET['kompania'])) {
  $produktet = $produktiCRUD->shfaqProduktetENdara($fillimi, $nrMaxIProduktevPerFaqe, 'kompania');

} else if (isset($_GET['kategoria'])) {
  $produktet = $produktiCRUD->shfaqProduktetENdara($fillimi, $nrMaxIProduktevPerFaqe, 'kategoria');

} else {
  $produktet = $produktiCRUD->shfaqProduktetENdara($fillimi, $nrMaxIProduktevPerFaqe, 'teGjitha');

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
  <link rel="stylesheet" href="../../css/produkti.css">

</head>

<body>
  <?php include '../design/header.php'; ?>
  <div class="container">
    <div class="navKerkimi">
      <div class="dropdown">
        <button class="dropbtn button button-kategoria">
          <span>Kategorit</span>
        </button>
        <div class="dropdown-content">
          <?php
          foreach ($kategorit as $kategoria) {
            ?>
            <a href="?kategoria=<?php echo $kategoria['emriKategoris'] ?>">
              <?php echo $kategoria['emriKategoris'] ?>
            </a>

            <?php
          }
          ?>
        </div>
      </div>
      <form class="searchBarForm" name='kerko' action='../funksione/search.php' method="post">
        <input class="searchBar" name='kerkimi' type="search" placeholder="Search">
      </form>
    </div>
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
      <?php
      if (isset($_GET['kompania'])) {
        ?>

        <div class="titulliArtikuj">
          <h1 class="">All Products from
            <?php echo $kompania ?>
          </h1>
        </div>

        <?php
      } else if (isset($_GET['kerko'])) {
        ?>
          <div class="titulliArtikuj">
            <h1 class="">All Products like

            <?php echo '"' . $_GET['kerko'] . '"' ?>
            </h1>
          </div>
        <?php
      } else if (isset($_GET['kategoria'])) {
        ?>
            <div class="titulliArtikuj">
              <h1 class="">All Products of category:

            <?php echo '"' . $_GET['kategoria'] . '"' ?>
              </h1>
            </div>
        <?php
      } else {
        ?>
            <div class="titulliArtikuj">
              <h1 class="">All Products</h1>
            </div>
        <?php
      }
      if ($produktet == true) {
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

      } else {
        ?>
        <h2>Nuk u gjet asnje produkt!</h2>
        <?php
      }
      ?>
    </div>
    <div class="navigimiFaqev">
      <?php
      if (isset($_GET['kerko'])) {
        if ($nrFaqes > 1) {
          ?>
          <a class='faqjaTjeter' href="?faqja=<?php echo $nrFaqes - 1 ?>&kerko=<?php echo $_GET['kerko'] ?>"><i
              class='fa-solid'>&#xf104;</i></a>
          <?php
        }

        for ($i = 1; $i <= $nrFaqev; $i++) {
          if ($i === $nrFaqes) {
            echo "    <a class='faqjaAktive' href=\"?faqja=$i&kerko=" . $_GET['kerko'] . "\">$i</a>";
          } else {
            echo "<a class='faqjaTjeter' href=\"?faqja=$i&kerko=" . $_GET['kerko'] . "\">$i</a>";
          }
        }

        if ($nrFaqes < $nrFaqev) {
          ?>
          <a class='faqjaTjeter' href="?faqja=<?php echo $nrFaqes + 1 ?>&kerko=<?php echo $_GET['kerko'] ?>"><i
              class='fa-solid'>&#xf105;</i></a>
          <?php
        }


      } else if (isset($_GET['kompania'])) {
        if ($nrFaqes > 1) {
          ?>
            <a class='faqjaTjeter' href="?faqja=<?php echo $nrFaqes - 1 ?>&kompania=<?php echo $_GET['kompania'] ?>"><i
                class='fa-solid'>&#xf104;</i></a>
          <?php
        }

        for ($i = 1; $i <= $nrFaqev; $i++) {
          if ($i === $nrFaqes) {
            echo "    <a class='faqjaAktive' href=\"?faqja=$i&kompania=" . $_GET['kompania'] . "\">$i</a>";
          } else {
            echo "<a class='faqjaTjeter' href=\"?faqja=$i&kompania=" . $_GET['kompania'] . "\">$i</a>";
          }
        }

        if ($nrFaqes < $nrFaqev) {
          ?>
            <a class='faqjaTjeter' href="?faqja=<?php echo $nrFaqes + 1 ?>&kompania=<?php echo $_GET['kompania'] ?>"><i
                class='fa-solid'>&#xf105;</i></a>
          <?php
        }

      } else if (isset($_GET['kategoria'])) {
        if ($nrFaqes > 1) {
          ?>
              <a class='faqjaTjeter' href="?faqja=<?php echo $nrFaqes - 1 ?>&kategoria=<?php echo $_GET['kategoria'] ?>"><i
                  class='fa-solid'>&#xf104;</i></a>
          <?php
        }

        for ($i = 1; $i <= $nrFaqev; $i++) {
          if ($i === $nrFaqes) {
            echo "    <a class='faqjaAktive' href=\"?faqja=$i&kategoria=" . $_GET['kategoria'] . "\">$i</a>";
          } else {
            echo "<a class='faqjaTjeter' href=\"?faqja=$i&kategoria=" . $_GET['kategoria'] . "\">$i</a>";
          }
        }

        if ($nrFaqes < $nrFaqev) {
          ?>
              <a class='faqjaTjeter' href="?faqja=<?php echo $nrFaqes + 1 ?>&kategoria=<?php echo $_GET['kategoria'] ?>"><i
                  class='fa-solid'>&#xf105;</i></a>
          <?php
        }

      } else {

        if ($nrFaqes > 1) {
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

        if ($nrFaqes < $nrFaqev) {
          ?>
              <a class='faqjaTjeter' href="?faqja=<?php echo $nrFaqes + 1 ?>"><i class='fa-solid'>&#xf105;</i></a>
          <?php
        }

      }
      ?>

    </div>
    <?php

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