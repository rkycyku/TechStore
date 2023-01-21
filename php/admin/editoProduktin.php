<?php require_once('./kontrolloAksesin.php'); 
require_once('../CRUD/produktiCRUD.php');

$produktiCRUD = new produktiCRUD();

$produktiCRUD->setProduktiID($_GET['userID']);
$produkti = $produktiCRUD->shfaqProduktinSipasID();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editimi i Produktiti | Tech Store</title>
    <link rel="shortcut icon" href="../../img/web/favicon.ico"/>
    <link rel="stylesheet" href="../../css/forms.css" />
  </head>
  <body>
    <?php
        include '../design/headerAdmin.php';
    echo '<div class="containerDashboard">';
        include '../design/adminNav.php';
    echo '</div>';
    ?>

    <div class="forms">
        <form name="shtoProduktin" onsubmit="return validimiShtimiProduktit();" action='../funksione/shtoProduktin.php' method="POST" enctype="multipart/form-data">
        <?php
          if(isset($_SESSION['mesazhiMeSukses'])){
            echo '
                  <div class="mesazhiSuksesStyle">
                    <h3>Produkti u shtua me sukses!</h3>
                    <button id="mbyllMesazhin">
                      X
                    </button>
                  </div>
            ';
          }
          if(isset($_SESSION['madhesiaGabim'])){
            echo '
                  <div class="mesazhiGabimStyle">
                    <h3>Madhesia e fotos eshte shume e madhe!</h3>
                    <button id="mbyllMesazhin">
                      X
                    </button>
                  </div>
            ';
          }
          if(isset($_SESSION['problemNeBartje'])){
            echo '
                  <div class="mesazhiGabimStyle">
                    <h3>Ndodhi nje problem ne bartjen e fotov!</h3>
                    <button id="mbyllMesazhin">
                      X
                    </button>
                  </div>
            ';
          }
          if(isset($_SESSION['fileNukSuportohet'])){
            echo '
                  <div class="mesazhiGabimStyle">
                    <h3>Ky file nuk supportohet!</h3>
                    <button id="mbyllMesazhin">
                      X
                    </button>
                  </div>
            ';
          }
        ?>
        <h1 class="form-title">Editimi i Produktiti</h1>
        <input class="form-input" name="pdName" type="text" placeholder="Emri i Produktit" value='<?php echo $produkti['emriProduktit'];?>'required>
        <?php
          require_once('../CRUD/kompaniaCRUD.php');
          $kompania = new kompaniaCRUD();
          $kompania->shfaqKompanitSelektim();
        ?>
        <?php
          require_once('../CRUD/kateogriaCRUD.php');
          $kategoria = new kategoriaCRUD();
          $kategoria->shfaqKategorinSelektim();
        ?>
        <input class="form-input" name="pdPhoto" accept="image/*" type="file" placeholder="Foto Produktit" required>
        <input class="form-input" name="cmimiPd" type="text" placeholder="Qmimi i Produktit" required>
        <input class="button" type="submit" value="Shtoni Produktin" name='shtoProd'>
      </form>
    </div>
    <script src="../../js/validimiFormave.js"></script>
    <script src="../../js/mbyllMesazhin.js"></script>
  </body>
</html>
<?php
unset($_SESSION['mesazhiMeSukses']);
unset($_SESSION['madhesiaGabim']);
unset($_SESSION['problemNeBartje']);
unset($_SESSION['fileNukSuportohet']);
?>