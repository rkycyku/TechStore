<?php
if (!isset($_SESSION)) {
  session_start();
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
  <?php include '../design/headerMain.php'; ?>
  <div class="forms">
    <form name="SignUpForm" onsubmit="return validimiSignUp();" action='../funksione/regUser.php' method="POST">
      <?php
      if (isset($_SESSION['regMeSukses'])) {
        echo '<div class="mesazhiSuksesStyle">
                      <h3>U regjistruat me sukses!</h3>
                      <button id="mbyllMesazhin">X</button>
                    </div>';
      }
      ?>
      <h1 class="form-title">Sign Up</h1>
      <input class="form-input" name="name" type="text" placeholder="Name">
      <input class="form-input" name="lName" type="text" placeholder="Lastname">
      <input class="form-input" name="uName" type="text" placeholder="Username">
      <input class="form-input" name="email" type="text" placeholder="Email">
      <input class="form-input" name="password" type="password" placeholder="Password">
      <input class="button" type="submit" value="Sign Up" name='submit'>
    </form>
  </div>
  <?php include_once('../funksione/importimiScriptave.php'); ?>
</body>

</html>

<?php
unset($_SESSION['regMeSukses']);
?>