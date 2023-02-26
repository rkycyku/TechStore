<?php
if (!isset($_SESSION)) {
  session_start();
}
require('../CRUD/userCRUD.php');

if (isset($_POST['submit'])) {
  $user = new userCRUD();

  $user->setUsername($_POST['uName']);

  $kontrollimiUserit = $user->kontrolloLlogarin();

  if ($kontrollimiUserit == true) {
    $_SESSION['userEkziston'] = true;
    $_SESSION['fName'] = $_POST['name'];
    $_SESSION['lName'] = $_POST['lName'];
    $_SESSION['email'] = $_POST['email'];
  } else {
    $user->setEmri($_POST['name']);
    $user->setMbiemri($_POST['lName']);
    $user->setEmail($_POST['email']);
    $user->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT));
    $user->shtoUser();

    $idUser = $user->idKlientiNeRegjistrim();
    $user->setUserID($idUser['userID']);
    $user->shtoAdresen();

    $sessionENevojshme = array('shportaBlerjes', 'regMeSukses');
    foreach ($_SESSION as $key => $value) {
      if (!in_array($key, $sessionENevojshme)) {
        unset($_SESSION[$key]);
      }
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up | Tech Store</title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/forms.css" />
  <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
</head>

<body>
  <?php include '../design/header.php'; ?>
  <div class="forms">
    <form name="SignUpForm" onsubmit="return validimiSignUp();" action='' method="POST">
      <?php
      if (isset($_SESSION['regMeSukses'])) {
        ?>
        <div class="mesazhiStyle mesazhiSuksesStyle">
          <h3>U regjistruat me sukses!</h3>
          <button id="mbyllMesazhin">
            <i class="fa-solid">&#xf00d;</i>
          </button>
        </div>
        <?php
      }
      if (isset($_SESSION['userEkziston'])) {
        ?>
        <div class="mesazhiStyle mesazhiGabimStyle">
          <h3>Ky username egziston!</h3>
          <button id="mbyllMesazhin">
            <i class="fa-solid">&#xf00d;</i>
          </button>
        </div>
        <?php
      }
      ?>
      <h1 class="form-title">Sign Up</h1>
      <input class="form-input" name="name" type="text" placeholder="Name">
      <input class="form-input" name="lName" type="text" placeholder="Lastname">
      <input class="form-input" name="uName" type="text" placeholder="Username">
      <input class="form-input" name="email" type="text" placeholder="Email">
      <input class="form-input" name="password" type="password" placeholder="Password">
      <div class="reg">
        <p>Do u have an account? <a href="../pages/login.php">Sign in &nbsp;<i class="fa-solid">&#xf2f6;</i></a></p>
      </div>
      <input class="button" type="submit" value="Sign Up" name='submit'>
    </form>
  </div>
  <?php include_once('../funksione/importimiScriptave.php'); ?>
</body>

</html>

<?php
unset($_SESSION['regMeSukses']);
unset($_SESSION['userEkziston']);
?>