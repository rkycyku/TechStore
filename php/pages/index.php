<?php
if(!isset($_SESSION)){
    session_start();
}

require_once('../CRUD/produktiCRUD.php');

$produktiCRUD = new produktiCRUD();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home | Tech Store</title>
    <link rel="shortcut icon" href="../../img/web/favicon.ico"/>
    <link rel="stylesheet" href="../../css/index.css" />
    
  </head>

  <body>
    
  <?php  include '../design/headerMain.php'; ?>

    <div class="container">
      <div class="banner">
        <div class="titulliPershkrim">
          <p>A place where technology is everything.</p>
        </div>
      </div>

      <?php require_once('../funksione/slideriKompanive.php'); ?>
      
      <div class="artikujt">
        <div class="titulliArtikuj">
          <h1 class="">Products</h1>
        </div>
          <?php
          $produktet = $produktiCRUD->shfaqTeGjithaProduktet();
          foreach($produktet as $produkti){
            echo '<div class="artikulli">
                    <img src="../../img/products/' . $produkti['fotoProduktit'] . '" alt="" />'.
                    '<p class="artikulliLabel">' . $produkti['emriProduktit'] . '</p>'.
                    '<p class="cmimi">' . $produkti['qmimiProduktit'] . ' €</p>
                    <button class="button">Buy</button>
                  </div>';
          }

          ?>
      </div>
    </div>
    
    <?php include '../design/footerMain.php'?>
  </body>
</html>