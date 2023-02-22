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

    ?>
    <section class="brandsSlider">
      <h2 class="brandsSlider-Label">Brands</h2>
      <button class="shkoMajtas"><img src="../../img/slider/arrow.png" alt=""></button>
      <button class="shkoDjathtas"><img src="../../img/slider/arrow.png" alt=""></button>
      <div class="kornizaEBrendeve">
        <?php
        foreach ($kompanit as $kompania) {
          ?>
          <div class="kartelaEBrendit">
            <div class="logoBrendit">
              <a href="../pages/produktet.php?kompania=<?php echo $kompania['kompaniaID'] ?>">
                <img src="../../img/slider/sliderIcons/<?php echo $kompania['kompaniaLogo'] ?>" alt="">
              </a>
            </div>
          </div>
          <?php
        }
        ?>
      </div>
    </section>
    <?php
    ?>

    <div class="artikujt">
      <div class="titulliArtikuj">
        <h1 class="">Latest Products</h1>
      </div>
      <?php
      $produktet = $produktiCRUD->shfaq15ProduktetEFundit();
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
  </div>
  <?php include('../funksione/importimiScriptave.php') ?>
  <?php include '../design/footer.php' ?>
</body>

</html>