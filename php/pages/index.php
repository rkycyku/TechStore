<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../CRUD/produktiCRUD.php');
require_once('../CRUD/kompaniaCRUD.php');

$kompaniaCRUD = new kompaniaCRUD();
$produktiCRUD = new produktiCRUD();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home | Tech Store</title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/index.css" />
</head>

<body>
  <?php include '../design/header.php'; ?>
  <div class="container">
    <div class="banner">
      <div class="titulliPershkrim">
        <p>A place where technology is everything.</p>
      </div>
    </div>
    <?php
    $kompanit = $kompaniaCRUD->shfaqKompanin();

    echo ' <section class="brandsSlider"> 
                <h2 class="brandsSlider-Label">Brands</h2>
                <button class="shkoMajtas"><img src="../../img/slider/arrow.png" alt=""></button>
                <button class="shkoDjathtas"><img src="../../img/slider/arrow.png" alt=""></button>
                <div class="kornizaEBrendeve">';
    foreach ($kompanit as $kompania) {
      echo '<div class="kartelaEBrendit">
                  <div class="logoBrendit">
                    <a href="../pages/produktet.php?kompania=' . $kompania['emriKompanis'] . '">
                      <img src="../../img/slider/sliderIcons/' . $kompania['kompaniaLogo'] . '" alt="">
                    </a>
                  </div>
                </div>';
    }
    echo ' </div>
              </section>';
    ?>

    <div class="artikujt">
      <div class="titulliArtikuj">
        <h1 class="">Latest Products</h1>
      </div>
      <?php
      $produktet = $produktiCRUD->shfaq20ProduktetEFundit();
      foreach ($produktet as $produkti) {
        echo '<div class="artikulli">
                    <img src="../../img/products/' . $produkti['fotoProduktit'] . '" alt="" />' .
          '<p class="artikulliLabel">' . $produkti['emriProduktit'] . '</p>' .
          '<p class="cmimi">' . $produkti['qmimiProduktit'] . ' €</p>
          <a href="./order.php?produktiID=' . $produkti['produktiID'] . '"><button class="button">Buy</button></a>
                  </div>';
      }

      ?>
    </div>
  </div>
  <?php include('../funksione/importimiScriptave.php') ?>
  <?php include '../design/footer.php' ?>
</body>

</html>