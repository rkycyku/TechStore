<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../CRUD/contactFormCRUD.php');

if (isset($_POST['dergoMSG'])) {
  $cfCRUD = new contactFormCRUD();

  $cfCRUD->setEmri($_POST['name']);
  $cfCRUD->setEmail($_POST['email']);
  $cfCRUD->setMsg($_POST['msgField']);

  $cfCRUD->insertoMesazhin();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us | TechStore</title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="./css/header.css" />
  <link rel="stylesheet" href="../../css/forms.css" />
  <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
</head>
<style>

</style>

<body>
  <?php include '../design/header.php'; ?>

  <div class="forms">
    <form name="ContactForm" onsubmit="return validimiContactForm()" action="" method="POST">
      <?php
      if (isset($_SESSION['mesazhiMeSukses'])) {
        echo '
                <div class="mesazhiSuksesStyle">
                  <h3>Mesazhi juaj u dergua me sukses!</h3>
                  <button id="mbyllMesazhin">
                    X
                  </button>
                </div>
          ';
      }
      ?>

      <h1 class="form-title">Contact Us</h1>
      <input class="form-input" name="name" type="text" placeholder="Name">
      <input class="form-input" name="email" type="text" placeholder="Email">
      <textarea placeholder="Enter your message!" name="msgField"></textarea>
      <input class="button" type="submit" value="Send" name="dergoMSG" />
    </form>
  </div>
  <?php include_once('../funksione/importimiScriptave.php'); ?>
</body>

</html>
<?php
unset($_SESSION['mesazhiMeSukses']);
?>