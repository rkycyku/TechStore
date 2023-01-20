

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up | Tech Store</title>
    <link rel="shortcut icon" href="../../img/web/favicon.ico"/>
    <link rel="stylesheet" href="../../css/header.css" />
    <link rel="stylesheet" href="../../css/forms.css" />
  </head>
  <body>
    <?php include './header.php'?>
    <div class="forms">
        <form name="shtoProduktin" onsubmit="" action='../funksione/shtoProduktin.php' method="POST">
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
        ?>
        <h1 class="form-title">Vendosja e Produkteve</h1>
        <input class="form-input" name="pdName" type="text" placeholder="Emri i Produktit" required>
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
        <input class="form-input" name="pdPhoto" type="file" placeholder="Foto Produktit" required>
        <input class="form-input" name="cmimiPd" type="text" placeholder="Qmimi i Produktit" required>
        <input class="button" type="submit" value="Shtoni Produktin" name='shtoProd' onclick="validimiShtimiProduktit();">
      </form>
    </div>
    <script src="../../js/validimiFormave.js"></script>
    <script src="../../js/mbyllMesazhin.js"></script>
  </body>
</html>
<?php
unset($_SESSION['mesazhiMeSukses']);
?>