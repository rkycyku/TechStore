<?php
if (!isset($_SESSION)) {
  session_start();
}
require('../CRUD/userCRUD.php');

if (isset($_POST['submit'])) {
  $user = new userCRUD();

  $user->setUsername($_POST['uName']);

  $kontrollimiUserit = $user->kontrolloUser();

  if ($kontrollimiUserit == true) {
    $_SESSION['userEkziston'] = true;
    $_SESSION['fName'] = $_POST['name'];
    $_SESSION['lName'] = $_POST['lName'];
    $_SESSION['email'] = $_POST['email'];
  } else {
    $user->setEmri($_POST['name']);
    $user->setMbiemri($_POST['lName']);
    $user->setEmail($_POST['email']);
    $user->setPassword($_POST['password']);
    $user->shtoUser();
    session_destroy();
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
        echo '<div class="mesazhiSuksesStyle">
                      <h3>U regjistruat me sukses!</h3>
                      <button id="mbyllMesazhin">X</button>
                    </div>';
      }
      if (isset($_SESSION['userEkziston'])) {
        echo '<div class="mesazhiGabimStyle">
                      <h3>Ky username egziston!</h3>
                      <button id="mbyllMesazhin">X</button>
                    </div>';
      }
      ?>
      <h1 class="form-title">Sign Up</h1>
      <input class="form-input" name="name" type="text" placeholder="Name"
        value="<?php if (isset($_SESSION['fName']))
          echo $_SESSION['fName'] ?>">
        <input class="form-input" name="lName" type="text" placeholder="Lastname"
          value="<?php if (isset($_SESSION['fName']))
          echo $_SESSION['lName'] ?>">
        <input class="form-input" name="uName" type="text" placeholder="Username">
        <input class="form-input" name="email" type="text" placeholder="Email"
          value="<?php if (isset($_SESSION['fName']))
          echo $_SESSION['email'] ?>">
        <input class="form-input" name="password" type="password" placeholder="Password">
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