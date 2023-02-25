<?php
require_once('../funksione/kontrolloEshteLogin.php');
require_once('../CRUD/userCRUD.php');

$userCRUD = new userCRUD();

$userCRUD->setUserID($_SESSION['userID']);
$useri = $userCRUD->shfaqSipasID();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Dashboard | Tech Store</title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/adminDashboard.css">
  <link rel="stylesheet" href="../../css/mesazhetStyle.css">
</head>

<body>

  <?php include '../design/header.php' ?>

  <div class="containerDashboardP">
    <?php
    if (isset($_SESSION['teDhenatUPerditesuan']) == true) {
      ?>
      <div class="mesazhiStyle mesazhiSuksesStyle">
        <h3>Te dhenat u perditesuan me sukses!</h3>
        <button id="mbyllMesazhin">
          <i class="fa-solid">&#xf00d;</i>
        </button>
      </div>
      <?php
    }
    if (isset($_SESSION['perditesimiUAnulua']) == true) {
      ?>
      <div class="mesazhiStyle mesazhiGabimStyle">
        <h3>Ju anuluat Perditesimin e te dhenave!</h3>
        <button id="mbyllMesazhin">
          <i class="fa-solid">&#xf00d;</i>
        </button>
      </div>
      <?php
    }
    ?>
    <h1 class="titulliPershkrim">Miresevini
      <?php echo $_SESSION['name'] ?>!
    </h1>
    <h2>Te dhenat e tua</h2>
    <table>
      <tr>
        <td><strong>Emri:</strong></td>
        <td>
          <?php echo $useri['emri'] ?>
        </td>
      </tr>
      <tr>
        <td><strong>Mbiemri:</strong></td>
        <td>
          <?php echo $useri['mbiemri'] ?>
        </td>
      </tr>
      <tr>
        <td><strong>Username:</strong></td>
        <td>
          <?php echo $useri['username'] ?>
        </td>
      </tr>
      <tr>
        <td><strong>Email:</strong></td>
        <td>
          <?php echo $useri['email'] ?>
        </td>
      </tr>
      <tr>
        <td><strong>Numri Kontaktit:</strong></td>
        <td>
          <?php echo $useri['nrKontaktit'] ?>
        </td>
      </tr>
      <tr>
        <td><strong>Adresa: </strong></td>
        <td>
          <?php echo $useri['adresa'] . ', ' . $useri['qyteti'] . ' ' . $useri['zipKodi'] ?>
        </td>
      </tr>
    </table>

    <div class="butonatDiv">
      <a href="../funksione/perditesoTeDhenat.php?userID=<?php echo $useri['userID'] ?>"><button
          class="button">Perditeso te
          Dhenat <i class="fa-solid">&#xf4ff;</i></button></a>
      <a href="../funksione/ndryshoPass.php?userID=<?php echo $useri['userID'] ?>"><button class="button">Ndrysho
          Fjalekalimin</button></a>
      <?php
      if ($_SESSION['aksesi'] == 0) {
        ?>
        <a href="../userPages/porosit.php"><button class="button">Porosite e tua</button></a>
        <?php
      }
      ?>
    </div>


  </div>

  <?php include '../design/footer.php';
  include_once '../funksione/importimiScriptave.php' ?>
</body>

</html>

<?php 
unset($_SESSION['teDhenatUPerditesuan']); 
unset($_SESSION['perditesimiUAnulua']);
?>