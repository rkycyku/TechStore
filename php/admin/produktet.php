<?php 
require_once('./kontrolloAksesin.php');
require_once('../CRUD/produktiCRUD.php');

$produktiCRUD = new produktiCRUD();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard | Tech Store</title>
    <link rel="shortcut icon" href="../../img/web/favicon.ico"/>
    <link rel="stylesheet" href="../../css/adminDashboard.css" />
    
  </head>

  <body>
    
  <?php  include '../design/headerAdmin.php'; ?>

    <div class="containerDashboard">
      <?php include_once('../design/adminNav.php');?>

      <table>
        <tr>
            <th>ID e Produktit</th>
            <th>Emri i Produktit</th>
            <th>Emri i Kompanis</th>
            <th>Kategoria e Produktit</th>
            <th>Foto e Produktit</th>
            <th>Stafi Menaxhues</th>
            <th>Qmimi i Produktit</th>
        </tr>
        <?php
        $produktet = $produktiCRUD->shfaqTeGjithaProduktet();
        
        foreach($produktet as $produkti){
          echo '
            <tr>
              <td>'.$produkti['produktiID'].'</td>
              <td>'.$produkti['emriProduktit'].'</td>
              <td>'.$produkti['emriKompanis'].'</td>
              <td>'.$produkti['kategoriaProduktit'].'</td>
              <td><img src="../../img/products/'.$produkti['fotoProduktit'].'"></td>
              <td>'.$produkti['emriStafit'].'</td>
              <td>'.$produkti['qmimiProduktit'].' €</td>
              <td><button class=""><a href="./editoProduktin.php?userID='.$produkti['produktiID'].'">Edito</a></button></td>
              <td><button class="">Fshi</button></td>
            </tr>
          ';
        }
        ?>
        </th>
      </table>
    </div>
    
    <?php include '../design/footerMain.php'?>
  </body>
</html>